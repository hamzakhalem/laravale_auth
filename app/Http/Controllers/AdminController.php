<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function AdminChangePassword(Request $request){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.change_password', compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request){
        $request->validate([
           'old_password' => 'required', 
           'new_password' => 'required', 
        ]);
        if(!Hash::check($request->old_password, Auth::user()->password)){

            $notif = array(
                'message' => "Old message is wrong",
                'alert-type' => 'error' ,
            );

            return back()->with($notif);
            
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notif = array(
            'message' => " Password Updated correctelly",
            'alert-type' => 'success' ,
        );
        return redirect()->back()->with($notif);
    }
}
