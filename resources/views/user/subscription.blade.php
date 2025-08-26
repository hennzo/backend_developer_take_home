@extends('layouts.user')

@section('title', 'Subscibe to product')


@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="flex bg-white p-4 md:p-10 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
            
            @if ($errors->any())
                <div class="py-2.5 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach ($productPricings as $productPricing)
                <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 m-2">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $product->name }} | {{ $productPricing->pricingOption->name }}
                    </h3>
                    <p class="mt-2 text-gray-500 dark:text-neutral-400 text-2xl">
                        {{ $product->description }}
                    </p>
                    <p class="mt-2 text-gray-500 dark:text-neutral-400 text-2xl">
                        {{ $productPricing->pricingOption->description }}
                    </p>
                    <p class="mt-2 text-gray-500 dark:text-neutral-400 text-2xl">
                        Duration: {{ $productPricing->pricingOption->duration }} days
                    </p>
                    <p class="mt-2 text-gray-500 dark:text-neutral-400 text-2xl font-bold">
                        Price: ${{ $productPricing->amount }}
                    </p>
                    <form method="POST" action="/product/{{ $product->id }}">
                        @csrf
                        <input type="hidden" name="product_pricing_id" value="{{$productPricing->id }}"/>
                        <button type="submit" class="py-3 px-4 mt-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Subscribe
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection