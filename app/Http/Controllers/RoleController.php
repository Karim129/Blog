<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = Role::query()->when($request->input('search'), function ($query, $search) {
            return $query->where('name', 'Like', "%{$search}%");
        })->paginate(10)->appends($request->all());

        return inertia('roles/index', [
            'roles' => $roles,
            'filters' => $request->only(['search']),
        ]);
        // return inertia('roles/index', ['roles' => Role::select('id', 'name')->paginate(10, ['*'], 'page', request()->query('page', 1))]);
    }
    public function create()
    {
        return inertia('roles/create', ['permissions' => Permission::get(['id', 'name'])]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'exists:permissions,name',
        ]);

        Role::create(['name' => $request->name, 'guard_name' => 'web'])->givePermissionTo($request->permissions);

        return to_route('roles.index')->with('message', 'Role Created successfully.');
    }

    public function edit(Role $role)
    {
        $role->load('permissions');
        $permissions   = Permission::get(['id', 'name']);
        return inertia('roles/edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|min:3|unique:roles,name,'.$role->id,
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->update(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return to_route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->forceDelete();

        return back()->with('message', 'Role deleted.');
    }

    public function givePermission(Request $request, Role $role)
    {
        $permissions = $request->get('permissions', []);

        if (!empty($permissions)) {
            $role->permissions()->syncWithoutDetaching($permissions);
        }

        return to_route('roles.index');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        $role->permissions()->detach($permission->id);
        return to_route('roles.index');
    }
}
