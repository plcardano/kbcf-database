<?php

namespace App\Http\Controllers\Accounts;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\UserStoreRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->tab == 'archived') {
            $users = $users->onlyTrashed();
        }

        $users = $users->paginate(10)->appends(request()->query());

        return Inertia::render('Accounts/Users/Index', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Accounts/Users/Create');
    }

    public function store(UserStoreRequest $request)
    {
        $vars = $request->validated();

        $vars['password'] = Hash::make($vars['password']);

        User::create($vars);

        return redirect()->route('accounts.users.index')
            ->with('success', 'User successfully created!');
    }

    public function edit(Request $request, User $user)
    {
        return Inertia::render('Accounts/Users/Edit', [
            'item' => $user
        ]);
    }

    public function update(UserStoreRequest $request, User $user)
    {
        $vars = $request->validated();

        $vars['password'] = Hash::make($vars['password']);

        $user->update($vars);

        return redirect()->route('accounts.users.index')
            ->with('success', 'User successfully updated!');
    }

    public function delete(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('accounts.users.index')
            ->with('success', 'User successfully archived!');
    }

    public function restore(Request $request, User $user)
    {
        $user->restore();

        return redirect()->route('accounts.users.index', ['tab' => 'all'])
            ->with('success', 'User successfully restore!');
    }
}
