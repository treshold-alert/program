<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container">
        <div class="row mt-3 mb-3">
            @foreach ($products as $product)
                <div class="col-md-2 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                        </div>
                        <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            style="width: 100%; height: 100%; object-fit: cover;" />
                        <div class="card-body">
                            <p class="card-text">Code :{{ $product->code }}</p>
                            <p class="card-text">Stock :{{ $product->stock }}</p>
                            @auth
                                {{-- <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow text-primary"
                                        data-bs-toggle="dropdown">
                                        action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="javascript:void(0);" class="dropdown-item edit-product"
                                            data-id="{{ $product->product_id }}" data-name="{{ $product->name }}"
                                            data-code="{{ $product->code }}" data-image="{{ $product->image }}">
                                            <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item delete-product"
                                            data-id="{{ $product->product_id }}" data-name="{{ $product->name }}">
                                            <i class="mdi mdi-delete-outline me-1"></i> Delete
                                        </a>

                                        <a href="javascript:void(0);" class="dropdown-item stock-product"
                                            data-id="{{ $product->product_id }}" data-name="{{ $product->name }}"
                                            data-code="{{ $product->code }}" data-image="{{ $product->image }}">
                                            <i class="mdi mdi-tray-arrow-down me-1"></i> Stock IN
                                        </a>

                                        <a href="javascript:void(0);" class="dropdown-item stock-out-product"
                                            data-id="{{ $product->product_id }}" data-name="{{ $product->name }}"
                                            data-code="{{ $product->code }}" data-image="{{ $product->image }}">
                                            <i class="mdi mdi-tray-arrow-up me-1"></i> Stock OUT
                                        </a>

                                    </div>
                                </div> --}}
                                <a href="javascript:void(0);" class="btn dropdown-item stock-out-product text-danger"
                                    data-id="{{ $product->product_id }}" data-name="{{ $product->name }}"
                                    data-code="{{ $product->code }}" data-image="{{ $product->image }}">
                                    <i class="mdi mdi-tray-arrow-up me-1"></i> STOCK OUT
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn p-0 hide-arrow text-danger">
                                    STOCK OUT
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section><!-- /Hero Section -->


@include('components.stockOutComponent')
