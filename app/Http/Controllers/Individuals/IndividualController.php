<?php

namespace App\Http\Controllers\Individuals;

use App\Enums\AttenderType;
use App\Enums\CivilStatus;
use App\Enums\FamilyRelation;
use App\Enums\Gender;
use App\Enums\IndividualStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Accounts\UserStoreRequest;
use App\Http\Requests\Individuals\IndividualFormRequest;
use App\Models\Accounts\User;
use App\Models\Individuals\Individual;
use App\Models\Ministry\MinistryCategory;
use App\Services\Individual\IndividualService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class IndividualController extends Controller
{
    public function index(Request $request): Response
    {
        $individuals = Individual::query();

        if ($request->tab == 'archived') {
            $individuals = $individuals->onlyTrashed();
        }

        $individuals = $individuals->paginate(10)->appends(request()->query());

        return Inertia::render('Individuals/Index', [
            'items' => $individuals,
        ]);
    }

    public function create(Request $request): Response
    {
        $individuals = Individual::get()->map(function ($q) {
            return ['id' => $q->id, 'label' => "{$q->first_name} {$q->last_name}"];
        });
        return Inertia::render('Individuals/Create', [
            'gender' => Gender::renderOption(),
            'civilStatuses' => CivilStatus::renderOption(),
            'statuses' => IndividualStatus::renderOption(),
            'types' => AttenderType::renderOption(),
            'relations' => FamilyRelation::renderOption(),
            'individuals' => $individuals,
            'ministries' => MinistryCategory::with('ministries')->get()
        ]);
    }

    public function store(IndividualFormRequest $request): RedirectResponse
    {
        app(IndividualService::class)->create($request);

        return redirect()->route('individuals.index')
            ->with('success', 'Individual successfully created!');
    }

    public function edit(Request $request, Individual $individual): Response
    {
        return Inertia::render('Individuals/Edit', [
            'item' => $individual,
        ]);
    }

    public function update(UserStoreRequest $request, User $individual): RedirectResponse
    {
        $vars = $request->validated();

        $vars['password'] = Hash::make($vars['password']);

        $individual->update($vars);

        return redirect()->route('individuals.index')
            ->with('success', 'Individual successfully updated!');
    }

    public function delete(Request $request, User $individual): RedirectResponse
    {
        $individual->delete();

        return redirect()->route('individuals.index')
            ->with('success', 'Individual successfully archived!');
    }

    public function restore(Request $request, User $individual): RedirectResponse
    {
        $individual->restore();

        return redirect()->route('individuals.index', ['tab' => 'all'])
            ->with('success', 'Individual successfully restore!');
    }
}
