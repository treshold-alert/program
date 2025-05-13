{{-- @extends('layouts.adminLayout')
@section('content')
  @include('components.pdfComponent')
@endsection --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Barang</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h2 class="title">Laporan Barang</h2>
    @if ($bulan)
        <p><strong>Bulan:</strong> {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</p>
    @endif

    @if ($topPrediction)
        <div class="section">
            <strong>Prediksi Barang Populer:</strong><br>
            Produk <strong>{{ $topPrediction['name'] }}</strong> diprediksi perlu stok sekitar
            <strong>{{ $topPrediction['predicted_stock'] }}</strong> unit
            (total keluar {{ $topPrediction['total_keluar'] }}).
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $item)
                <tr>
                    <td>{{ $item['code'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['masuk'] }}</td>
                    <td>{{ $item['keluar'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
