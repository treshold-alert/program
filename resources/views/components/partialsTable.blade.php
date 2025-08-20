@php
    use Carbon\Carbon;
    \Carbon\Carbon::setLocale('id');
@endphp

@forelse ($products as $index => $product)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $product->code }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            @if ($product->image)
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
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="position-relative">
                    <div class="dropdown-menu" style="z-index: 1000 !important;">
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
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="text-center">Tidak ada data produk.</td>
    </tr>
@endforelse
