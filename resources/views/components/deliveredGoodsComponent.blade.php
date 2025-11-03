<div class="card">
    <h5 class="card-header">Barang Terkirim</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Terkirim</th>
                    <th>Tanggal Terkirim</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveredGoodses as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->product->code ?? '-' }}</td>
                        <td>
                            @if ($item->product && $item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="foto produk"
                                    style="width: 60px; height: 60px; object-fit: cover;" />
                            @else
                                <span class="text-muted">No Photo</span>
                            @endif
                        </td>
                        <td>{{ $item->product->name ?? '-' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
