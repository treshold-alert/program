<!-- Stock OUT Modal -->
<div class="modal fade" id="stockOutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('products.stock.out') }}">
            @csrf
            <input type="hidden" name="product_id" id="stockOutProductId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Stock OUT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="stockOutProductName" class="fw-bold mb-2"></p>
                    <div class="form-group">
                        <label for="quantity_out">Jumlah yang keluar</label>
                        <input type="number" name="quantity" class="form-control" required min="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Kurangi Stok</button>
                </div>
            </div>
        </form>
    </div>
</div>
