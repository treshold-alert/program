<div class="buy-now">
    @auth
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Add Product
        </button>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">
            Add Product
        </a>
    @endauth
</div>

{{-- <div class="row mt-3 mb-3">
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
                        <div class="dropdown">
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
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn p-0 dropdown-toggle hide-arrow text-primary">
                            action
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div> --}}

<div class="card">
    <h5 class="card-header">Product List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Photo</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                    \Carbon\Carbon::setLocale('id'); // Set locale ke bahasa Indonesia
                @endphp
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->image)
                                {{-- <a href="javascript:void(0);" class="open-modal"
                                    data-photo="{{ asset('storage/' . $product->image) }}">
                                    <i class="menu-icon tf-icons mdi mdi-image"></i>
                                </a> --}}
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    style="width: 60px; height: 60px; object-fit: cover;" />
                            @else
                                <span class="text-muted">No Photo</span>
                            @endif
                        </td>
                        <td>{{ Carbon::parse($product->created_at)->translatedFormat('d F Y H:i') }}</td>

                        <td>{{ Carbon::parse($product->updated_at)->translatedFormat('d F Y H:i') }}</td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="mdi mdi-dots-vertical"></i>
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
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>




@include('components.addComponent')
@include('components.editComponent')
@include('components.stockINComponent')
@include('components.stockOutComponent')
