<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $rep_name = Auth::user()->rep_name;
            $successMessage = $rep_name . ' Logged in successfully.';
            return redirect()->route('dashboard.index')->with('success', $successMessage);
        }
        return back()->with('error', 'Incorrect email and password');
    }

    public function register()
    {
        $institutes = ["Northgate University", "Riverside Institute of Technology", "Lakeview College of Engineering", "Meridian University of Sciences", "Harbor Business School", "Crestwood Medical College"];
        $data = compact('institutes');
        return view('auth.register')->with($data);
    }
    public function registerPost(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return back()->with('error', 'Email already exists');
        }

        $request->validate(
            [
                'hei_name' => 'required',
                'rep_name' => 'required',
                'rep_designation' => 'required',
                'email' => 'required|confirmed',
                'email_confirmation' => 'required',
                'rep_phone' => 'required',
                'rep_sec_phone' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'terms' => 'required'
            ],
            [
                'hei_name.required' => 'Higher Education Institution Name is required.',
                'rep_name.required' => 'Representative Name is required.',
                'rep_designation.required' => 'Representative Designation is required.',
            ]
        );

        $user = new User;
        $user->hei_name = $request['hei_name'];
        $user->rep_name = $request['rep_name'];
        $user->rep_designation = $request['rep_designation'];
        $user->email = $request['email'];
        $user->rep_phone = $request['rep_phone'];
        $user->rep_sec_phone = $request['rep_sec_phone'];
        $user->password = Hash::make($request['password']);
        $user->save();

        // $credentials = [
        //     'email' => $user->email,
        //     'password' => $request->password,
        // ];

        // Auth::attempt($credentials);

        return redirect()->route('login')->with('success', 'Account created, please login to continue!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
