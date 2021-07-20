<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carer.index');
    }

    public function create()
    {
        abort_if(Gate::denies('carer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carer.create');
    }

    public function edit(Carer $carer)
    {
        abort_if(Gate::denies('carer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carer.edit', compact('carer'));
    }

    public function show(Carer $carer)
    {
        abort_if(Gate::denies('carer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carer->load('family');

        return view('admin.carer.show', compact('carer'));
    }
}
