<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProductPricing;
use App\Models\UserSubscription;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $currentUser = $request->user();
        $products = Product::all();
        $products = $products->reject(function (Product $product) use ($currentUser) {
            return $product->productPricing->intersect(
                $currentUser->subscriptions
            )->count() > 0;
        });

        return View('user.dashboard', compact('products'));
    }


    public function create(): View
    {
        return View('user.create');
    }
    

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required'],
        ]);

        $user = new User($data);
        $user->save();

        return redirect('/login')
            ->with('success', 'Account successfully created!');;
    }
}
