<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        // Todo
        return View();
    }


    public function create(): View
    {
        return View('admin.user.create');
    }
    

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required'],
            'is_admin' => ['required', 'integer'],
        ]);

        $user = new User($data);
        $user->save();

        return redirect('admin/user/create')
            ->with('success', 'User successfully created!');;
    }
}
