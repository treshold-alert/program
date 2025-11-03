@php
    use Carbon\Carbon;
    \Carbon\Carbon::setLocale('id');
@endphp

@forelse ($deliveredGoodses as $index => $product)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $product->code }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="foto produk"
                    style="width: 60px; height: 60px; object-fit: cover;" />
            @else
                -
            @endif
        </td>
        <td>
            @if ($product->transactions->where('type', 'keluar')->first())
                {{ Carbon::parse($product->transactions->where('type', 'keluar')->first()->created_at)->translatedFormat('d F Y H:i') }}
            @else
                -
            @endif
        </td>
        <td>
            <span class="badge bg-label-danger">Terkirim</span>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center">Tidak ada barang terkirim</td>
    </tr>
@endforelse
