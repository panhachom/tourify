<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user) 
    {
        if ($user->role === 'customer') {
            return redirect()->route('home.index');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admins');
        } elseif ($user->role === 'vendor') {

            $vendor = Vendor::where('user_id', $user->id)->first();

            return redirect()->route('vendor.show', $vendor->id);

        }            
        else {
            return redirect()->intended();
        }
    }
}
