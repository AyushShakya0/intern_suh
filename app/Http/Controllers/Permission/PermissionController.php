<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function create(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'permission' => 'required'
        ]);
        Permission::create(['name' => $request->permission]);
        return redirect()->back();
    }

    public function index()
    {
        $permissions = Permission::all();
        return view('RolesPermission.Permissions', compact('permissions'));
    }
}
