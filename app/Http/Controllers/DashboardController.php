<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $totalProducts = $products->count();

        $users = User::all();
        $totalUsers = $users->count();

        $transactions = Transaction::all();
        $totalTransactions = $transactions->count();

        return view('admin.dashboard');
    }

    public function chartPengeluaranSemua()
    {
        // Ambil semua produk
        $produkList = DB::table('products')->select('product_id', 'name')->get();

        // Ambil transaksi keluar, group per product_id & bulan
        $pengeluaran = DB::table('transactions')
            ->select(
                'product_id',
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('SUM(quantity) as total')
            )
            ->where('type', 'keluar')
            ->groupBy('product_id', DB::raw('MONTH(created_at)'))
            ->orderBy('bulan')
            ->get();

        // Buat label bulan (Jan - Des)
        $labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('F');
        }

        // Susun data series
        $series = [];
        foreach ($produkList as $produk) {
            $dataPerBulan = [];

            foreach (range(1, 12) as $bulan) {
                $record = $pengeluaran->first(function ($item) use ($produk, $bulan) {
                    return $item->product_id == $produk->product_id && $item->bulan == $bulan;
                });

                $dataPerBulan[] = $record ? (int) $record->total : 0;
            }

            $series[] = [
                'name' => $produk->name,
                'data' => $dataPerBulan
            ];
        }

        return view('admin.dashboard', compact('labels', 'series'));
    }
}
