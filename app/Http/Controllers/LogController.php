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
}
