{{-- Prediksi Restok --}}
<div class="col-lg-5">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2 mb-3">📦 Prediksi Stok Barang Populer</h5>
            </div>
            @if ($topPrediction)
                <p>
                    Produk <strong>{{ $topPrediction['name'] }}</strong> keluar sebanyak
                    <strong>{{ $topPrediction['total_keluar'] }}</strong> unit.
                </p>
            @else
                <p class="text-muted">
                    Tidak ada data transaksi keluar untuk bulan ini.
                </p>
            @endif
        </div>
        <div class="card-body">
            @if ($topPrediction)
                <div class="row g-3">
                    <div class="col-md-6 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-info rounded shadow">
                                    <i class="mdi mdi mdi-chart-line mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Prediksi</div>
                                <h5 class="mb-0">{{ $topPrediction['predicted_stock'] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-secondary mb-0">Belum ada prediksi stok tersedia.</div>
            @endif
        </div>
    </div>
</div>

<form action="{{ route('average.view') }}" method="GET" class="row g-2 mb-3">
    {{-- Filter Bulan --}}
    <div class="col-12 col-sm-4">
        <label for="bulan" class="form-label mb-1">Filter Bulan:</label>
        <input type="month" id="bulan" name="bulan" class="form-control" value="{{ request('bulan') }}"
            required>
    </div>

    {{-- Tombol Tampilkan --}}
    <div class="col-12 col-sm-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
    </div>

    {{-- Tombol Cetak PDF --}}
    @if (request('bulan'))
        <div class="col-12 col-sm-auto d-flex align-items-end">
            <a href="{{ route('products.average.pdf', ['bulan' => request('bulan')]) }}" class="btn btn-danger w-100">
                Cetak PDF
            </a>
        </div>
    @endif
</form>



{{-- Tabel Laporan Stok --}}
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">📊 Laporan Stok Barang</div>
        @if ($report->isNotEmpty())
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
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
            </div>
        @endif
    </div>
</div>
