<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('admin.transaction', compact('transactions'));
    }

    public function stockSummary(Request $request)
    {
        $bulan = $request->bulan;
        $report = collect();
        $predictions = collect();
        $topPrediction = null;

        if ($bulan) {
            $start = Carbon::parse($bulan)->startOfMonth();
            $end = Carbon::parse($bulan)->endOfMonth();

            // Moving average prediksi mingguan tapi dibatasi bulan
            $weeklyOutData = Transaction::select(
                DB::raw('YEARWEEK(created_at) as week'),
                'product_id',
                DB::raw('SUM(quantity) as total_out')
            )
                ->where('type', 'keluar')
                ->whereBetween('created_at', [$start, $end])
                ->groupBy('week', 'product_id')
                ->get()
                ->groupBy('product_id');

            foreach ($weeklyOutData as $productId => $weeks) {
                $quantities = $weeks->pluck('total_out')->toArray();

                if (count($quantities) >= 1) {
                    $movingAvg = round(array_sum($quantities) / count($quantities));
                    $product = Product::find($productId);
                    $predictions->push([
                        'product_id' => $productId,
                        'name' => $product->name,
                        'predicted_stock' => $movingAvg,
                        'total_keluar' => array_sum($quantities)
                    ]);
                }
            }

            $topPrediction = $predictions->sortByDesc('total_keluar')->first();

            $products = Product::all();

            $report = $products->map(function ($product) use ($start, $end) {
                $masuk = Transaction::where('product_id', $product->product_id)
                    ->where('type', 'masuk')
                    ->whereBetween('created_at', [$start, $end])
                    ->sum('quantity');

                $keluar = Transaction::where('product_id', $product->product_id)
                    ->where('type', 'keluar')
                    ->whereBetween('created_at', [$start, $end])
                    ->sum('quantity');

                return [
                    'code' => $product->code,
                    'name' => $product->name,
                    'masuk' => $masuk,
                    'keluar' => $keluar,
                    'stock' => $product->stock
                ];
            });
        }

        return view('admin.average', compact('report', 'topPrediction', 'bulan'));
    }

    public function downloadAveragePDF(Request $request)
    {
        $bulan = $request->bulan;

        if (!$bulan) {
            return back()->with('error', 'Bulan harus dipilih untuk mencetak PDF.');
        }

        $start = Carbon::parse($bulan)->startOfMonth();
        $end = Carbon::parse($bulan)->endOfMonth();

        // Data transaksi keluar mingguan
        $weeklyOutData = Transaction::select(
            DB::raw('YEARWEEK(created_at) as week'),
            'product_id',
            DB::raw('SUM(quantity) as total_out')
        )
            ->where('type', 'keluar')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('week', 'product_id')
            ->get()
            ->groupBy('product_id');

        $predictions = collect();

        foreach ($weeklyOutData as $productId => $weeks) {
            $quantities = $weeks->pluck('total_out')->toArray();

            if (count($quantities) >= 1) {
                $movingAvg = round(array_sum($quantities) / count($quantities));
                $product = Product::find($productId);
                $predictions->push([
                    'product_id' => $productId,
                    'name' => $product->name,
                    'predicted_stock' => $movingAvg,
                    'total_keluar' => array_sum($quantities)
                ]);
            }
        }

        $topPrediction = $predictions->sortByDesc('total_keluar')->first();

        // Laporan stok
        $products = Product::all();

        $report = $products->map(function ($product) use ($start, $end) {
            $masuk = Transaction::where('product_id', $product->product_id)
                ->where('type', 'masuk')
                ->whereBetween('created_at', [$start, $end])
                ->sum('quantity');

            $keluar = Transaction::where('product_id', $product->product_id)
                ->where('type', 'keluar')
                ->whereBetween('created_at', [$start, $end])
                ->sum('quantity');

            return [
                'code' => $product->code,
                'name' => $product->name,
                'masuk' => $masuk,
                'keluar' => $keluar,
                'stock' => $product->stock
            ];
        });

        $pdf = PDF::loadView('admin.laporanPDF', compact('report', 'topPrediction', 'bulan'))->setPaper('A4', 'portrait');

        return $pdf->download('laporan-barang-' . $bulan . '.pdf');
    }


    public function laporan(Request $request)
    {
        $bulan = $request->bulan;

        $report = collect();
        if ($bulan) {
            $start = Carbon::parse($bulan)->startOfMonth();
            $end = Carbon::parse($bulan)->endOfMonth();

            $products = Product::all();

            $report = $products->map(function ($product) use ($start, $end) {
                $masuk = Transaction::where('product_id', $product->product_id)
                    ->where('type', 'masuk')
                    ->whereBetween('created_at', [$start, $end])
                    ->sum('quantity');

                $keluar = Transaction::where('product_id', $product->product_id)
                    ->where('type', 'keluar')
                    ->whereBetween('created_at', [$start, $end])
                    ->sum('quantity');

                return [
                    'code' => $product->code,
                    'name' => $product->name,
                    'masuk' => $masuk,
                    'keluar' => $keluar,
                    'stock' => $product->stock
                ];
            });
        }

        return view('admin.average  ', compact('report', 'bulan'));
    }
}
