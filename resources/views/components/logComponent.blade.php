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
            <tbody class="table-border-bottom-0 log-table-body">
                @include('components.partialTableLog', ['logs' => $logs])
            </tbody>
        </table>
    </div>
</div>
