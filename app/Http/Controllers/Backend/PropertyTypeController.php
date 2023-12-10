<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    //
    function AllType(){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }
}
