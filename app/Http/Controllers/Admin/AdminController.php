<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('info','User Logout Successfully !');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view("admin.adminProfile",compact('adminData'));
    }
    public function editProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view("admin.adminProfileEdit",compact('editData'));
    }

    public function storeProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        return redirect()->route('admin.profile')->with('message','Profile Updated Successfully!');
    }

    public function changePassword()
    {
        return view('admin.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $hashPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashPassword))
        {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            return redirect()->back()->with('info','Password Updated Successfully!');
        } else {
            return redirect()->back()->with('info','Old Password Is Not Match!');
        }
    }
}
