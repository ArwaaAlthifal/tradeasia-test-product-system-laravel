<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->query('lang', 'en');
        $allowedLang = ['en', 'id'];

        if (!in_array($lang, $allowedLang)) {
            return response()->json(['error' => 'Invalid language'], 400);
        }

        $products = Product::latest()->take(10)->get();

        $data = $products->map(function ($product) use ($lang) {
            return [
                'name' => $product->name[$lang] ?? null,
                'hs_code' => $product->hs_code,
                'cas_number' => $product->cas_number,
                'image_url' => $product->image
    ? url('storage/' . $product->image)
    : null,
                'description' => $product->description[$lang] ?? null,
                'application' => $product->application[$lang] ?? null,
                'meta' => [
                    'meta_title' => $product->meta_title[$lang] ?? null,
                    'meta_keyword' => $product->meta_keyword[$lang] ?? null,
                    'meta_description' => $product->meta_description[$lang] ?? null,
                ]
            ];
        });

        return response()->json($data);
    }
}