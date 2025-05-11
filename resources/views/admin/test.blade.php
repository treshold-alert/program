@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Update Stok Barang</h2>
        <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="stock" class="form-label">Stok Barang</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Stok</button>
        </form>
    </div>
@endsection
