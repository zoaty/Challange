<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        $validated = $request->validate([
            'userName' => 'required|unique:users',
            'userEmail' => 'required|unique:users',
            'user-pw' => 'required|min:8|max:24',
            'user-pw-repeat' => 'required|min:8|max:24|same:user-pw',
            'box-checked' => 'accepted'
        ],

            [
                'userName.required' => 'Email field cannot be empty.',
                'userName.unique' => 'This username already exists.',


                'userEmail.required' => 'Email field cannot be empty.',
                'userEmail.unique' => 'This email already exists.',


                'user-pw.required' => 'Password field cannot be empty.',
                'user-pw.min' => 'Password cannot be less than 8 characters.',
                'user-pw.max' => 'Password cannot be more than 24 characters.',

                'user-pw-repeat.required' => 'Password Repeat field cannot be empty.',
                'user-pw-repeat.min' => 'Password Repeat cannot be less than 8 characters.',
                'user-pw-repeat.max' => 'Password Repeat cannot be more than 24 characters.',
                'user-pw-repeat.same' => 'Password fields are not matching.',


                'box-checked.accepted' => 'You must read and accept Terms of Service.',
            ]

        );

        User::create([
            'userName' => request('userName'),
            'userEmail' => request('userEmail'),
            'password' => Hash::make(request('user-pw')),
            'customerType' => "Regular Customer",
            'Balance_Is_Set' => 0,
        ]);

        return redirect()->route('show.login');
    }


    public function customLogin(Request $request)
    {
        $validated = $request->validate([
            'userEmail' => 'required',
            'user-pw' => 'required|min:8|max:24',
        ],

        [
            'userEmail.required' => 'Email field cannot be empty.',
            'user-pw.required' => 'Password field cannot be empty.',
            'user-pw.min' => 'Password cannot be less than 8 characters.',
        ]

        );

        $email = request('userEmail');

        $plainPW = request('user-pw');


        if (Auth::attempt(['userEmail' => $email, 'password' => $plainPW])) {
            $request->session()->regenerate();
            Session::save();

            return redirect()->route('show.account');
        }
        else {
            return redirect()->route('show.login')->withErrors(['authFailed' => 'Email or Password is wrong.']);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
