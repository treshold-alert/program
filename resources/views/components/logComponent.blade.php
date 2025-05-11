<div class="card mt-4">
    <h5 class="card-header">Log Aktifitas</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>No</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Details</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($logs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->user->username ?? 'Tidak diketahui' }}</td>
                        <td>{{ $log->user->email ?? 'Tidak diketahui' }}</td>
                        <td>{{ ucfirst($log->action) }}</td>
                        <td>{{ $log->details }}</td>
                        <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada log tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
