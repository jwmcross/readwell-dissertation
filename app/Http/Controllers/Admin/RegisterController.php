<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Services\StoreRegisterService;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{

    private $registerService;

    public function __construct(StoreRegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function index()
    {
        abort_if(Gate::denies('register_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.register.index');
    }

    public function create()
    {
        abort_if(Gate::denies('register_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.register.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('register_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //Extract all the children data & Bookings
        $childrenBookings = array_filter($request->all(), function($key) {
           return strpos($key, 'child_') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $startDate = $request->register_date;
        $ageGroup = $request->age_group;

        $this->registerService->storeWeeklyRegister($startDate, $ageGroup, $childrenBookings);

        return redirect()->route('admin.registers.index');

    }

    public function edit(Register $register)
    {
        abort_if(Gate::denies('register_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.register.edit', compact('register'));
    }

    public function show(Register $register)
    {
        abort_if(Gate::denies('register_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $register->load('child');

        return view('admin.register.show', compact('register'));
    }

    public function todaysRegister()
    {
        abort_if(Gate::denies('register_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $register = Register::todaysRegister()->first();

        return view('admin.register.attendance-register', compact('register'));
    }

    public function report(Register $register)
    {
        abort_if(Gate::denies('register_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $register = $register;

        $children = $register->children->groupBy('attendance.child_id');



        return view('admin.register.attendance-report', compact('register','children'));
    }
}
