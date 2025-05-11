<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" id="editProductForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-3 text-center">
                        <img id="editProductImage" src="" alt="Product Image" class="img-fluid"
                            style="max-height: 200px;">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <div class="form-floating">
                            <input type="text" id="editName" class="form-control" placeholder="Product Name"
                                name="name" />
                            <label for="editName">Product Name</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating">
                            <input type="text" id="editCode" class="form-control" placeholder="Code"
                                name="code" disabled/>
                            <label for="editCode">Code</label>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <div class="form-floating">
                            <input class="form-control" type="file" id="editPhoto" name="image" />
                            <label for="editPhoto">Product Image</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>
