@extends('layouts.master')

@section('sidebard')
  
    <aside class="w-64 bg-gray-800 text-white p-4">  
        <div class="w-full shadow-sm shadow-slate-950/5 max-w-[280px]">
            <div class="rounded m-2 mx-4 mb-0 mt-3 h-max">
                <p class="font-sans antialiased text-base text-current font-semibold">Menu</p>
            </div>
            <div class="w-full h-max rounded p-3">
                <ul class="flex flex-col gap-0.5 min-w-60">
                    <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none {{request()->is('admin/dashboard')? 'bg-white text-black': 'bg-transparent text-white'}} hover:text-black dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-black dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                        <a href="/admin" class="flex items-center">
                            Dasbboard
                        </a>
                    </li>
                    <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none {{request()->is('/admin/user/create')? 'bg-white text-black': 'bg-transparent text-white'}} hover:text-black dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-black dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                        <a href="/admin/user/create" class="flex items-center">
                            Add new admin user
                        </a>
                    </li>
                    
                    <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none {{request()->is('/admin/product/create')? 'bg-white text-black': 'bg-transparent text-white'}} hover:text-black dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-black dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                        <a href="/admin/product/create" class="flex items-center">
                            Add new product
                        </a>
                    </li>
                    <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none {{request()->is('/admin/product/pricing/create')? 'bg-white text-black': 'bg-transparent text-white'}} hover:text-black dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-black dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                        <a href="/admin/product/pricing/create" class="flex items-center">
                            Add new pricing option
                        </a>
                    </li>
                    {{-- <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-white hover:text-black dark:hover:text-white hover:bg-slate-200 focus:bg-slate-200 focus:text-black dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
                        <a href="/admin/product/create" class="flex items-center">
                            Add pricing to product
                        </a>
                    </li> --}}
                    <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent dark:hover:text-white dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70 text-red-500 hover:bg-red-500/10 hover:text-error focus:bg-error/10 focus:text-error">
                        <a href="/admin/logout" class="flex items-center">
                            <span class="grid place-items-center shrink-0 me-2.5">
                                <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]">
                                    <path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

@endsection