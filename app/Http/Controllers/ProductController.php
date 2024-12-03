<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Category $category=null)
    {
        $products = Product::with(['category'])//relationshipni ko'rsatayapmiz
        ->when($category, fn (Builder $query) => $query->whereBelongsTo($category))//so'rting amalga oshirilmoqda (by category)
        ->latest('id')
        ->paginate();

        return view('products.index', [
            'products' => ProductResource::collection($products),
            'categories' => CategoryResource::collection(Category::all()),
            // 'category'=>$category
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product'=>$product]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        request()->validate([
            // 'image'=>['required','image'],
            'name'=>['required','min:5'],
            'description'=>['required'],
            'price'=>['required']
        ]);

        Product::create([
            // 'image'=>request('image'),
            'name'=>request('name'),
            'description'=>request('description'),
            'price'=>request('price'),
            'category_id'=>1
        ]);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

}
