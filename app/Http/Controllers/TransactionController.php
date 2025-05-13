<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('admin.transaction', compact('transactions'));
    }

    public function stockSummary()
    {
        // Ambil data transaksi keluar per minggu per produk
        $weeklyOutData = Transaction::select(
            DB::raw('YEARWEEK(created_at) as week'),
            'product_id',
            DB::raw('SUM(quantity) as total_out')
        )
            ->where('type', 'keluar')
            ->groupBy('week', 'product_id')
            ->get()
            ->groupBy('product_id');

        // dd($weeklyOutData);
        $predictions = [];

        foreach ($weeklyOutData as $productId => $weeks) {
            $quantities = $weeks->pluck('total_out')->toArray();

            // Hitung moving average (pakai semua minggu yang tersedia)
            if (count($quantities) >= 1) {
                $movingAvg = round(array_sum($quantities) / count($quantities));

                $product = Product::find($productId);
                $predictions[] = [
                    'product_id' => $productId,
                    'name' => $product->name,
                    'predicted_stock' => $movingAvg,
                    'total_keluar' => array_sum($quantities)
                ];
            }
        }

        // Ambil produk dengan jumlah keluar paling banyak
        $topPrediction = collect($predictions)
            ->sortByDesc('total_keluar')
            ->first();

        // Ambil data produk + perhitungan masuk dan keluar
        $products = Product::all();

        $report = $products->map(function ($product) {
            $masuk = Transaction::where('product_id', $product->product_id)
                ->where('type', 'masuk')
                ->sum('quantity');

            $keluar = Transaction::where('product_id', $product->product_id)
                ->where('type', 'keluar')
                ->sum('quantity');

            return [
                'code' => $product->code,
                'name' => $product->name,
                'masuk' => $masuk,
                'keluar' => $keluar,
                'stock' => $product->stock
            ];
        });

        // dd($predictions);
        // dd($weeklyOutData);


        return view('admin.average', compact('topPrediction', 'report'));
    }
}
