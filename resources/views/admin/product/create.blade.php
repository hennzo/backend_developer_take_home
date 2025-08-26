@extends('layouts.admin')

@section('title', 'Add new product')


@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl p-4 md:p-10 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
            
            @if ($errors->any())
                <div class="py-2.5 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/admin/product">
                @csrf
                <div class="max-w-sm">
                    <label for="name-label" class="block text-sm font-medium mb-2 dark:text-white">Product name</label>
                    <input type="text" name="name" id="name-label"  class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                </div>
                <div class="max-w-sm py-2.5">
                    <label for="description-label" class="block text-sm font-medium mb-2 dark:text-white">Description</label>
                    <textarea type="text" name="description" id="description-label"  class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"></textarea>
                </div>
                <button type="submit" class="py-3 px-4 mt-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Create
                </button>
            </form>
        </div>
    </div>
@endsection