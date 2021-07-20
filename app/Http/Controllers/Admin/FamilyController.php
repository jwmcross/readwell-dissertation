<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FamilyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.family.index');
    }

    public function create()
    {
        abort_if(Gate::denies('family_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.family.create');
    }

    public function edit(Family $family)
    {
        abort_if(Gate::denies('family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.family.edit', compact('family'));
    }

    public function show(Family $family)
    {
        abort_if(Gate::denies('family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $family->load('children', 'carers');

        return view('admin.family.show', compact('family'));
    }

    public function createChildForFamily(Family $family)
    {
        abort_if(Gate::denies('carer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.child.create', compact('family'));
    }

    public function createCarerForFamily(Family $family)
    {
        abort_if(Gate::denies('carer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carer.create', compact('family'));
    }

}
