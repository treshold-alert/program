<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Helpers\TwilioHelper;
use App\Models\Log;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.test', compact('product'));
    }

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Simpan stok lama sebelum diperbarui
        $oldStock = $product->stock;

        // Validasi input
        $request->validate([
            'stock' => 'required|integer|min:0'
        ]);

        // Update stok
        $product->update(['stock' => $request->stock]);

        // Kirim WA jika stok sebelumnya > 9 dan sekarang <= 9
        if ($product->stock <= 9) {
            $message = "⚠️ *Stok Barang Hampir Habis!* ⚠️\n\nNama: *{$product->name}*\nSisa Stok: *{$product->stock} unit*\n\nSegera restock!";

            TwilioHelper::sendWhatsAppMessage(env('ADMIN_PHONE'), $message);
        }

        return redirect()->back()->with('success', 'Stok berhasil diperbarui.');
    }

    public function viewProduct()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
        // return view('admin.product');
    }

    public function addProduct(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'code' => 'required|string|max:100|unique:products,code',
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'stock' => 'required|integer|min:0',
        ]);

        // Simpan file ke folder 'public/product_photos'
        $photoPath = $request->file('image')->store('product_photos', 'public');

        $productData = [
            'code' => $request->code,
            'name' => $request->name,
            'image' => $photoPath, // Simpan path foto, bukan file base64
            // 'stock' => $request->stock,
        ];

        $productData['product_id'] = Str::uuid();
        $product = Product::create($productData);

        if ($product) {
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Produk gagal ditambahkan.');
        }
    }

    public function editProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product_photos', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->back()->with('success', 'Produk berhasil diupdate.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    public function stockIn(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'stock' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->stock += $request->stock;
        $product->save();

        // Buat transaksi
        Transaction::create([
            'transaction_id' => Str::uuid(),
            'product_id' => $product->product_id,
            'type' => 'masuk',
            'quantity' => $request->stock,
        ]);

        // Log user
        Log::create([
            'log_id' => Str::uuid(),
            'user_id' => Auth::user()->user_id,
            'action' => 'Stock In',
            'details' => "Menambahkan stok produk {$product->name} sebanyak {$request->stock}",
        ]);

        return redirect()->back()->with('success', 'Stok berhasil ditambahkan.');
    }

    public function stockOut(Request $request)
    {
        $request->validate([
            'product_id' => 'required|uuid',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk pengurangan.');
        }

        $product->stock -= $request->quantity;
        $product->save();

        // Buat transaksi
        Transaction::create([
            'transaction_id' => Str::uuid(),
            'product_id' => $product->product_id,
            'type' => 'keluar',
            'quantity' => $request->quantity,
        ]);

        // Log user
        Log::create([
            'log_id' => Str::uuid(),
            'user_id' => Auth::user()->user_id,
            'action' => 'Stock Out',
            'details' => "Mengurangi stok produk {$product->name} sebanyak {$request->quantity}",
        ]);

        return redirect()->back()->with('success', 'Stok berhasil dikurangi.');
    }
}
