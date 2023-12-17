<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function Deletepermission($id){
        Permission::findOrFail($id)->delete();
        $notif = array(
            'message' => "Permission deleted successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.permission')->with($notif);
    }

    public function Editpermission($id){
        $permission = Permission::findOrFail($id);

        
        return view('backend.permission.edit_permission', compact('permission')); 
    }

    public function Updatepermission(Request $request){
        $id = $request->id;
        $type = Permission::findOrFail($id)->update([
            'name'=>$request->permission_name,
            'groupe_name'=>$request->permission_groupe_name,  
        ]);
        $notif = array(
            'message' => "Permission updated successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.permission')->with($notif);

    }


    public function ImportPermission(){
        return view('backend.permission.import_permission'); 
    }

    public function ExportPermission(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    public function Import(Request $request){
        
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notif = array(
            'message' => "Permission uploaded successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.permission')->with($notif);
    }
}
