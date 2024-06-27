<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class registeredController extends Controller
{
    public function login_index()
    {
        return view('auth.login');
    }

    public function register_index()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        //validate
        $attributes = $request->validate([
            'username' => ['required', 'unique:employees,user_name'],
            'company_code' => ['required', 'exists:companies,company_code'],
            'email' => ['required', 'email', 'max:254', 'unique:users'],
            'password' => ['required', Password::min(5), 'confirmed'],
        ]);

        //store
        $user = User::create([
            'name' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => $attributes['password'],
        ]);

        employee::create([
            'user_name' => $attributes['username'],
            'user_id' => $user->id,
            'email' => $attributes['email'],
            'company_id' => Company::where('company_code',$request->company_code)->pluck('id')->first(),
        ]);

        Auth::login($user);

        return redirect('/home');
    }

    public function login_store(Request $request)
    {
        //validate
        $attributes = $request->validate([
            'username' => ['required'],
            'password' => ['required', Password::min(5)],
        ]);

        // //log in
        $attempt = Auth::attempt([
            'name' => $attributes['username'],
            'password' => $attributes['password'],
        ]);

        if (!$attempt) {
            throw ValidationException::withMessages([
                'username' => 'Credentials are not match'
            ]);
        }

        $request->session()->regenerate();

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        //logout
        Auth::logout();

        return redirect('/login');
    }
}
