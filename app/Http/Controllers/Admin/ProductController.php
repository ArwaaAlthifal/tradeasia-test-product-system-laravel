<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name.en' => 'required',
        'name.id' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->except('image');

    // Handle image
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $data['image'] = $imagePath;
    }

    // Simpan dalam bentuk json
    Product::create([
        'name' => $data['name'],
        'hs_code' => $data['hs_code'] ?? null,
        'cas_number' => $data['cas_number'] ?? null,
        'image' => $data['image'] ?? null,
        'description' => $data['description'] ?? null,
        'application' => $data['application'] ?? null,
        'meta_title' => $data['meta_title'] ?? null,
        'meta_keyword' => $data['meta_keyword'] ?? null,
        'meta_description' => $data['meta_description'] ?? null,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
        'name.en' => 'required',
        'name.id' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->except('image');

    // Handle image jika diupload ulang
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $data['image'] = $imagePath;
    }

    $product->update([
        'name' => $data['name'],
        'hs_code' => $data['hs_code'] ?? null,
        'cas_number' => $data['cas_number'] ?? null,
        'image' => $data['image'] ?? $product->image,
        'description' => $data['description'] ?? null,
        'application' => $data['application'] ?? null,
        'meta_title' => $data['meta_title'] ?? null,
        'meta_keyword' => $data['meta_keyword'] ?? null,
        'meta_description' => $data['meta_description'] ?? null,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}