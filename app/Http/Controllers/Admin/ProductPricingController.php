<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PricingOption;
use App\Models\ProductPricing;
use Illuminate\Http\RedirectResponse;

class ProductPricingController extends Controller
{
    public function index(Product $product): View
    {
        return View();
    }


    public function create(Product $product): View
    {
        $pricingOptions = PricingOption::all();
        $pricingOptions = $pricingOptions->reject(function (PricingOption $pricingOption) use ($product) {
            return ProductPricing::where([
                'product_id' => $product->id,
                'pricing_option_id' => $pricingOption->id,
            ])->count() > 0;
        });
        return View('admin.product.pricing.create', compact('product','pricingOptions'));
    }
    

    public function store(Request $request, Product $product): RedirectResponse
    {
        $data = $request->validate([
            'pricing_option_id' => ['required', 'numeric', 'gt:0'],
            'amount' => ['required', 'decimal:2'],
        ]);

        $productPricing = new ProductPricing();
        $productPricing->product_id = $product->id;
        $productPricing->pricing_option_id = $data['pricing_option_id'];
        $productPricing->amount = $data['amount'];
        $productPricing->save();

        return redirect('admin/product')
            ->with('success', 'Product Pricing successfully added!');;
    }
}
