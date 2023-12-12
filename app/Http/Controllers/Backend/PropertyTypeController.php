<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropretyType;

class PropertyTypeController extends Controller
{
    //
    function AllType(){
        $types = PropretyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }
    function AddType(){
        return view('backend.type.add_type');
    }
    function StoreType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:proprety_types', 
            'type_icon' => 'required', 
        ]);
        PropretyType::insert([
            'type_name'=>$request->type_name,
            'type_icon'=>$request->type_icon,
            
        ]);
        $notif = array(
            'message' => "Proprrty type created successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.type')->with($notif);
    }
    function EditType($id){
        $type = PropretyType::findOrFail($id);
        return view('backend.type.edit_type', compact('type'));
    }
    function DeleteType($id){
        PropretyType::findOrFail($id)->delete();
        $notif = array(
            'message' => "Proprrty type deleted successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.type')->with($notif);
    }
    function UpdateType(Request $request){
        $id = $request->id;
        $type = PropretyType::findOrFail($id)->update([
            'type_name'=>$request->type_name,
            'type_icon'=>$request->type_icon,
            
        ]);
        $notif = array(
            'message' => "Proprrty type updated successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.type')->with($notif);
    }
}
