<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{

    public function showLog()
    {
        $logs = Log::with('user')->latest()->get();
        return view('admin.log', compact('logs'));
    }

    public function search(Request $request)
    {
        $query = Log::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('detail', 'like', '%' . $request->search . '%')
                ->orWhere('user_id', 'like', '%' . $request->search . '%');
        }

        $logs = $query->paginate(10);

        return view('components.partialTableLog', compact('logs'));
    }
}
