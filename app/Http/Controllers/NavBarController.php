<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class NavBarController extends Controller
{
    
    public function homePage()
    {
        
        return Inertia::render('HomePage');
    }

    public function jobsPage()
    {
        
        return Inertia::render('Jobs');
    }
    public function signUpPage()
    {
        
        return Inertia::render('Register/Signup');
    }
    public function logoutPage()
    {
        
        return Inertia::render('HomePage');
    }
    public function loginPage()
    {
        
        return Inertia::render('Login/Login',[
        ]);
    }
}
