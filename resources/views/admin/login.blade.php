@extends('layouts.admin')

@section('title', 'Login')

@section('sidebard')
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
            <form method="POST" action="/admin/authenticate">
                @csrf
                <div class="max-w-sm">
                    <label for="email-label" class="block text-sm font-medium mb-2 dark:text-white">Email</label>
                    <input type="email" id="email-label" name="email" class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="example@eexample.com">
                </div>
                 <div class="max-w-sm py-2.5">
                    <label for="password-label" class="block text-sm font-medium mb-2 dark:text-white">Password</label>
                    <input type="password" name="password" id="password-label"  class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                </div>
                <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection