<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\UserStoreRequest;
use App\Models\Accounts\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $users = User::query();

        if ($request->tab == 'archived') {
            $users = $users->onlyTrashed();
        }

        $users = $users->paginate(10)->appends(request()->query());

        return Inertia::render('Accounts/Users/Index', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Accounts/Users/Create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $vars = $request->validated();

        $vars['password'] = Hash::make($vars['password']);

        User::create($vars);

        return redirect()->route('accounts.users.index')
            ->with('success', 'Admin successfully created!');
    }

    public function edit(Request $request, User $user): Response
    {
        return Inertia::render('Accounts/Users/Edit', [
            'item' => $user,
        ]);
    }

    public function update(UserStoreRequest $request, User $user): RedirectResponse
    {
        $vars = $request->validated();

        $vars['password'] = Hash::make($vars['password']);

        $user->update($vars);

        return redirect()->route('accounts.users.index')
            ->with('success', 'Admin successfully updated!');
    }

    public function delete(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('accounts.users.index')
            ->with('success', 'Admin successfully archived!');
    }

    public function restore(Request $request, User $user): RedirectResponse
    {
        $user->restore();

        return redirect()->route('accounts.users.index', ['tab' => 'all'])
            ->with('success', 'Admin successfully restore!');
    }
}
