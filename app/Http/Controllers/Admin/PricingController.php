<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PricingOption;
use Illuminate\Http\RedirectResponse;

class PricingController extends Controller
{
    public function index(): View
    {
        $pricings = PricingOption::all();

        return View('admin.pricing.index', compact('pricings'));
    }


    public function create(): View
    {
        return View('admin.pricing.create');
    }
    

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'duration' => ['required', 'numeric', 'between:7,365'],
        ]);

        $pricing = new PricingOption($data);
        $pricing->save();

        return redirect('admin/pricing')
            ->with('success', 'Pricing successfully created!');;
    }
}
