{{-- Prediksi Restok --}}
@if ($topPrediction)
    <div class="card w-50">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2 mb-3">📦 Prediksi Stok Barang Populer</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical mdi-24px"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                    </div>
                </div>
            </div>
            <p>
                Produk <strong>{{ $topPrediction['name'] }}</strong> keluar sebanyak
                <strong>{{ $topPrediction['total_keluar'] }}</strong> unit.
                {{-- <br>Disarankan restok sekitar <strong>{{ $topPrediction['predicted_stock'] }}</strong> unit. --}}
            </p>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-warning rounded shadow">
                                <i class="mdi mdi-cellphone-link mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Stock</div>
                            <h5 class="mb-0">{{ $topPrediction['total_keluar'] }}</h5>
                        </div>
                    </div>
                </div>
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
        </div>
    </div>
@endif

{{-- Tabel Laporan Stok --}}
<div class="card">
    <div class="card-header">📊 Laporan Stok Barang</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
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
    </div>
</div>
