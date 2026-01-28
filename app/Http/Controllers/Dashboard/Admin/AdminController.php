<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\AdminRequest;
use App\Services\Dashboard\Dashboard\AdminService;
use App\Services\Dashboard\RoleService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdminController extends Controller implements HasMiddleware
{
    public function __construct(protected AdminService $adminService, protected RoleService $roleService)
    {
    }

    public static function middleware()
    {
        return [
            new Middleware('can:admins'),
        ];
    }


    public function index()
    {
        $admins = $this->adminService->getAdmins();
        return view('dashboard.admins.index', compact('admins'));
    }


    public function create()
    {
        $roles = $this->roleService->getRoles();
        return view('dashboard.admins.create', compact('roles'));
    }


    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        if (!$this->adminService->storeAdmin($data)) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.operation_success'));
    }

//    public function show(string $id)
//    {
//        $admin = $this->adminService->getAdmin($id);
//        return view('dashboard.admins.show', compact('admin'));
//    }


    public function edit(string $id)
    {
        $admin = $this->adminService->getAdmin($id);
        $roles = $this->roleService->getRoles();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }


    public function update(AdminRequest $request, string $id)
    {
        $data = $request->validated();

        if (!$this->adminService->UpdateAdmin($data, $id)) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.operation_success'));

    }


    public function destroy(string $id)
    {
        if (!$this->adminService->deleteAdmin($id)) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.operation_success'));
    }

    public function changeStatus($id)
    {
        if (!$this->adminService->changeStatus($id)) {
            return redirect()->back()->with('error', __('dashboard.operation_error'));
        }
        return redirect()->back()->with('success', __('dashboard.operation_success'));

    }
}
