<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ProfileSettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.profile_setting', compact('user'));
    }
    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $users = Auth::User();
        if (!Hash::check($request->get('password'), $users->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
            
        }
        $users->password = Hash::make($request->new_password);
        DB::table('users')->where("id" ,"=", $users->id )->update([
                    'password' => Hash::make($request->new_password)
       ]);
        return redirect()->back()->with('success', 'Password changed successfully.');
       }
       
}
    
