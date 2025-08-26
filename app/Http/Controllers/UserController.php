<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\UserSubscription;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $currentUser = $request->user();
        $products = Product::all();
        $products = $products->reject(function (Product $product) use ($currentUser) {
            return UserSubscription::where([
                'user_id' => $currentUser->id,
                'status' => UserSubscription::PENDING,
            ])->orWhere('status', UserSubscription::ACTIVE)->count() > 0;
        });
        
        return View('user.dashboard', compact('products'));
    }
}
