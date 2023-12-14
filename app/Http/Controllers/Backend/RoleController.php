<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function AllPermission(){
        $permissions = Permission::all();

        return view('backend.permission.all_permission', compact('permissions')); 
    }

}
