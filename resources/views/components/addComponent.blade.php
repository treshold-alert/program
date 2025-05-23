<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="addProductForm" class="modal-content" action="{{ route('products.add') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel3">Add Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="name" class="form-control" placeholder="Baju"
                                name="name" />
                            <label for="name">Product Name</label>
                        </div>
                    </div>
                    {{-- <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="stock" class="form-control" placeholder="20" name="stock"
                                oninput="validateNumberInput(this)" />
                            <label for="stock">Stock</label>
                        </div>
                    </div> --}}
                    <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="code" class="form-control" placeholder="DM0001"
                                name="code" />
                            <label for="code">Code</label>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                            <input class="form-control" type="file" id="image" name="image" />
                        </div>
                    </div>
                </div>
                {{-- <div class="row g-2">
                    <div class="col mb-3">
                        <div class="form-floating form-floating-outline">
                            <textarea class="form-control h-px-100" id="description" placeholder="Ukuran S M L XL.." name="description"></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
