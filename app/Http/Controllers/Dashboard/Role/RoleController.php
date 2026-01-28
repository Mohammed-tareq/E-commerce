<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Role\RoleRequest;
use App\Services\Dashboard\RoleService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller implements HasMiddleware
{

    public function __construct(protected RoleService $roleService)
    {

    }

    public static function middleware()
    {
        return [
            new Middleware('can:roles'),
        ];
    }


    public function index()
    {
        $roles = $this->roleService->getRoles();
        return view('dashboard.roles.index', compact('roles'));

    }


    public function create()
    {
        return view('dashboard.roles.create');
    }


    public function store(RoleRequest $request)
    {
        $role = $this->roleService->createRole($request);
        if (!$role) {
            Session::flash('error', __('dashboard.operation_error'));
            return redirect()->back();
        }
        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->route('dashboard.roles.index');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $role = $this->roleService->getRole($id);
        if (!$role) {
            Session::flash('error', __('dashboard.operation_error'));
            return redirect()->route('dashboard.roles.index');
        }
        return view('dashboard.roles.edit', compact('role'));
    }


    public function update(RoleRequest $request, string $id)
    {
        $role = $this->roleService->updateRole($request,$id);
        if (!$role) {
            Session::flash('error', __('dashboard.operation_error'));
            return redirect()->back();
        }
        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->route('dashboard.roles.index');

    }


    public function destroy(string $id)
    {
        $role = $this->roleService->deleteRole($id);
        if (!$role) {
            Session::flash('error', __('dashboard.operation_error'));
            return redirect()->back();
        }
        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->route('dashboard.roles.index');
    }
}
