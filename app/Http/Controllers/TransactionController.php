<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('admin.transaction', compact('transactions'));
    }

    public function create()
    {
        // Logic to show the form for creating a new transaction
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new transaction
        // Validate and save the transaction data
        return redirect()->route('transactions.index');
    }

    public function show($id)
    {
        // Logic to display a specific transaction
        return view('transactions.show', compact('id'));
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific transaction
        return view('transactions.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific transaction
        return redirect()->route('transactions.index');
    }

    public function destroy($id)
    {
        // Logic to delete a specific transaction
        return redirect()->route('transactions.index');
    }
}
