<div class="card">
    <h5 class="card-header">Transaction List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Photo</th>
                    <th>Date IN</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    use Carbon\Carbon;
                    \Carbon\Carbon::setLocale('id'); // Set locale ke bahasa Indonesia
                @endphp
                @foreach ($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaction->product->code ?? '-' }}</td>
                        <td>{{ $transaction->product->name ?? '-' }}</td>
                        <td>
                            {{ $transaction->type == 'masuk' ? '+' : '-' }}
                            {{ $transaction->quantity }}
                        </td>
                        <td>
                            @if ($transaction->product && $transaction->product->image)
                                <img src="{{ asset('storage/' . $transaction->product->image) }}" alt="photo"
                                    style="width: 60px; height: 60px; object-fit: cover;" />
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ Carbon::parse($transaction->created_at)->translatedFormat('d F Y H:i') }}</td>
                        <td>
                            {{-- Optional action button --}}
                            <span class="badge bg-label-{{ $transaction->type == 'masuk' ? 'success' : 'danger' }}">
                                {{ ucfirst($transaction->type) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
