<div class="buy-now">
    @auth
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal">
            Tambah Produk
        </button>
    @else
        <a href="{{ route('login') }}" class="btn btn-danger">
            Tambah Produk
        </a>
    @endauth
</div>

<div class="card">
    <h5 class="card-header">Daftar Produk</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Dibuat</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="product-table-body">
                 @include('components.partialsTable', ['products' => $products])
            </tbody>
        </table>
    </div>
</div>




@include('components.addComponent')
@include('components.editComponent')
@include('components.stockINComponent')
@include('components.stockOutComponent')
