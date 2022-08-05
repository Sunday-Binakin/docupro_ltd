<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //creating a logout session for the admin backend
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('info', 'You\'ve Successfully Logged out');
    }
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        // $adminData = Auth::User();
        return view('admin.admin_profile', compact('adminData'));
    }
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);



        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request) // stores profile picture into the db
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData->name = $request->name;
        $profileData->username = $request->username;
        $profileData->email = $request->email;

        if ($request->file('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_profile_pictures'), $filename);
            $profileData['profile_picture'] = $filename;
        }
        $profileData->save();
        // notification after uploading profile picture

        // $notification = array(
        //     'message' => 'Admin Profile Updated Successfully',
        //     'alert-type' => 'Success'
        // );

        return redirect()->route('admin.profile')->with('info', 'Admin Profile Updated Successfully');
    }
    //change password method
    public function ChangePassword()
    {
        return view('admin.admin_change_password');
    }
    //update password
    public function UpdatePassword(Request $request)
    {
        //validating the input fields
        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|',
            'confirm_new_password' => 'required|min:8|same:new_password'
        ]);

        $hashedPassword =Auth::user()->password;
        //checking to see the if the password in our form matches with the password in the db

        if(Hash::check($request->old_password,$hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_password);
            $users->save();

            // session()->flash('message','Password Update was Successful');
            return redirect()->back()->with('info','Password Update was Successful');
        }else{
            // session()->flash('error','Password do not match');
            return redirect()->back()->with('error','Password do not match');
        }
    }
}


