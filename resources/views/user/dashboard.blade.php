@extends('layouts.user')

@section('title', 'All Available Products')


@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="flex text-4xl">
            @foreach ($products as $product)

            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 m-2">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    {{ $product->name }}
                </h3>
                <p class="mt-2 text-gray-500 dark:text-neutral-400 text-2xl">
                    {{ $product->description }}
                </p>
                <a href="/product/{{ $product->id }}" class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 decoration-2 hover:text-blue-700 hover:underline focus:underline focus:outline-hidden focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600">
                    Select
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection