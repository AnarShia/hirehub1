<?php

namespace App\Http\Controllers;




use App\Models\User;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => [
                'required',
            ],
            'country' => 'required|string',
            'city' => 'required|string',
        ]);

        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'city' => $data['city'],
        ]);


        return redirect('/');
    }

    public function registerCompany(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => [
                'required',
            ],
            'country' => 'required|string',
            'employees' => 'required|string',
        ]);

        /** @var \App\Models\company $company */
        $company = company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'employees' => $data['employees'],
        ]);


        return redirect('/');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }
        /** @var \App\Models\User $user */

        $user = Auth::user();
      
        return redirect('/');
    }
   
    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();


        Auth::guard('company')->logout();

        Auth::logout();

        return redirect()->route('homePage');
    }
}
