<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function roleIndex()
    {
        $roles = Role::with('permissions')->paginate(10);
        return view('backend.admin.role', compact('roles'));
    }

    public function createRole(Request $request)
    {
        $role = new Role();

        $role->name = Str::lower(trim($request->name));
        $role->save();

        $notification = array(
            'message' => 'Role Add Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();

        $notification = array(
            'message' => 'Role Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    // Permission Section Operation ----

    public function permissionIndex()
    {
        $permissions = Permission::paginate(10);
        return view('backend.admin.permission', compact('permissions'));
    }

    public function createPermission(Request $request)
    {
        $permission = new Permission();

        $permission->name = Str::lower(trim($request->name));
        $permission->save();

        $notification = array(
            'message' => 'Permission Add Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function roleToPermission($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        return view('backend.admin.roletopermission', compact('role', 'permissions'));
    }

    public function givePermissionTo(Request $request)
    {
        $role = Role::where('name', $request->role_name)->first();
        $role->givePermissionTo($request->permission_name);

        $notification = array(
            'message' => 'Permission Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('role.index')->with($notification);
    }

    public function removeRole($roleId, $adminId)
    {
        $role = Role::findById($roleId);
        $admin = Admin::find($adminId);

        $admin->removeRole($role);

        return redirect()->back();
    }

    public function revokePermissionTo($roleId, $permissionId)
    {

        $role = Role::findById($roleId);
        $permission = Permission::findById($permissionId);

        $permission->removeRole($role);

        return redirect()->back();
    }
}
