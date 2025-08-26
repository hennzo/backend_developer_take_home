<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProductPricing;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    public function index(Request $request, Product $product): View
    {
        $productPricings = ProductPricing::where([
            'product_id' => $product->id
        ])->get();
        
        return View('user.subscription', compact('product','productPricings'));
    }
    

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_pricing_id' => ['required', 'numeric'],
        ]);

        $productPricing = ProductPricing::findOrFail($data['product_pricing_id']);

        $subscription = new UserSubscription();
        $subscription->user_id = $request->user()->id;
        $subscription->product_pricing_id = $data['product_pricing_id'];
        $subscription->status = UserSubscription::PENDING;
        $subscription->subscription_date = Carbon::now();
        $subscription->expiration_date = Carbon::now()->addDays($productPricing->pricingOption->duration);
        $subscription->save();

        return redirect('/')
            ->with('success', 'Subscription successfully created!');
    }

    public function listing(Request $request): View
    {
        $user = $request->user();
        $subscriptions = $user->subscriptions()
            ->where('user_id', $user->id)
            ->where('expiration_date', '>', Carbon::now())
            ->get();
        
        return View('user.subscriptions', compact('subscriptions'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        $user->subscriptions()
            ->where([
                'user_id' => $user->id,
                'product_pricing_id' => $request->input('product_pricing_id'),
            ])->update([
                'status' => UserSubscription::CANCEL,
            ]);
        
        return redirect('/subscriptions')
            ->with('success', 'Subscription successfully canceled!');;
    }
}
