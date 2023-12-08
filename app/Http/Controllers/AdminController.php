<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function AdminLogin(){
        return view('admin.login');
    }
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile', compact('profileData'));
    }
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $Data = User::find($id);
        $Data->username = $request->username;
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->adress = $request->adress;
        

        if($request->file('photo')!==null){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin/'.$Data->photo));
            $filename = date('Ymdi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin'), $filename);
            $Data->photo = $filename;
        }
        $notif = array(
            'message' => "Updated correctelly",
            'alert-type' => 'success' ,
        );
        $Data->save();
        return redirect()->back()->with($notif);
    }
}
