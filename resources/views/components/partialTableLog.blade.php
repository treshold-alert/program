 @php
     use Carbon\Carbon;
     \Carbon\Carbon::setLocale('id');
 @endphp
 @forelse ($logs as $log)
     <tr>
         <td>{{ $loop->iteration }}</td>
         <td>{{ $log->user->username ?? 'Tidak diketahui' }}</td>
         <td>{{ $log->user->email ?? 'Tidak diketahui' }}</td>
         <td>{{ ucfirst($log->action) }}</td>
         <td>{{ $log->details }}</td>
         <td>{{ Carbon::parse($log->created_at)->translatedFormat('d F Y H:i') }}</td>
     </tr>
 @empty
     <tr>
         <td colspan="5" class="text-center">Tidak ada log tersedia</td>
     </tr>
 @endforelse
