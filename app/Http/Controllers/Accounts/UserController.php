<?php

namespace App\Http\Controllers\Accounts;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
        return Inertia::render('Accounts/Users/Index', [
            'users' => $users
        ]);
    }
}
