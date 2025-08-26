<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return View('admin.product.index', compact('products'));
    }


    public function create(): View
    {
        return View('admin.product.create');
    }
    

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);

        $product = new Product($data);
        $product->save();

        return redirect('admin/product')
            ->with('success', 'Product successfully created!');;
    }
}
