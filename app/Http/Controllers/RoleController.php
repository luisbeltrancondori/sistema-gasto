<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        $role = Role::create(['name' => $request->name]);

        return response()->json(['status' => true, 'message' => 'Role created successfully', 'role' => $role]);
    }

    /**
     * Display the specified role.
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        return response()->json(['status' => true, 'message' => 'Role updated successfully', 'role' => $role]);
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['status' => true, 'message' => 'Role deleted successfully']);
    }

    /**
     * Assign permissions to a role.
     */
    public function assignPermissions(Request $request, $id)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions);

        return response()->json(['status' => true, 'message' => 'Permissions assigned successfully']);
    }
}
