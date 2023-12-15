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
    public function AddPermission(){
        return view('backend.permission.add_permission'); 
    }
    public function StorePermission(Request $request){
        Permission::create([
            'name'=>$request->permission_name,
            'groupe_name'=>$request->permission_groupe_name,
        ]);
        $notif = array(
            'message' => "Permission  created successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.permission')->with($notif);
    }
}
