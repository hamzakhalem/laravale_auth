<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropretyType;
use App\Models\Amenities;

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

    
    function AllAmenitis(){
        $amenities = Amenities::latest()->get();
        return view('backend.aminitis.all_aminitis', compact('amenities'));
    }
    function AddAmenitis(){
        return view('backend.aminitis.add_aminitis');
    }
    function StoreAmenitis(Request $request){
        
        Amenities::insert([
            'amenitis_name'=>$request->amenitis_name,
        ]);
        $notif = array(
            'message' => "Amenities  created successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.amenitis')->with($notif);
    }
    function Editamenitis($id){
        $amenitis = Amenities::findOrFail($id);
        return view('backend.aminitis.edit_aminitis', compact('amenitis'));
    }

    function UpdateAmenitis(Request $request){
        $id = $request->id;
        $type = Amenities::findOrFail($id)->update([
            'amenitis_name'=>$request->amenitis_name,      
        ]);
        $notif = array(
            'message' => "Amintis updated successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.amenitis')->with($notif);
    }
    function Deleteamenitis($id){
        Amenities::findOrFail($id)->delete();
        $notif = array(
            'message' => "Aminities deleted successfully ",
            'alert-type' => 'success' ,
        );
        
        return redirect()->route('all.amenitis')->with($notif);
    }
}
