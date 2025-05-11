<div class="modal fade" id="stockProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="stockProductForm" method="POST" action="{{ route('products.stock-in') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Stock IN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="product_id" id="stockProductId">
                <p>Menambahkan stok untuk: <strong id="stockProductName"></strong> (<span id="stockProductCode"></span>)
                </p>
                <div class="form-floating form-floating-outline">
                    <input type="text" id="stock" class="form-control" placeholder="20" name="stock"
                        oninput="validateNumberInput(this)" required />
                    <label for="stock">Jumlah yang ditambahkan</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Tambah Stok</button>
            </div>
        </form>
    </div>
</div>
