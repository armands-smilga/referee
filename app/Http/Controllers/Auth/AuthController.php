<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * 
     * function that handles post registration requests, validates input data for name,email,password and creates new user using users
     * provided information, after successful registration, it redirects to login page with success message.
     * 
     */
    public function postRegistration(Request $request)
    {
        $request -> validate ([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:3',
        ]);


    /**
     *
     * retrieves all the data from incoming requests and stores it in $data
     * then calls create function with passing variables in $data as an argument
     * 
     */

        $data = $request -> all(); 
        $this -> create($data);
        return redirect('login')->with('success', 'Registration completed');
    }

    /**
     * 
     * creates new user by calling create method on the User's models
     * passes $data array which has name,email, password and hashes the password
     * 
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data ['password']), // Hash::make method; use Illuminate\Support\Facades\Hash;
        ]);
    }

    /**
     * function handles post login requests
     * Validates the request, attempts to log the user in, and redirects accordingly /w error or success to login.blade or home.blade.
     */
    public function postLogin(Request $request)
    {
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($request -> only('email', 'password')))
        {
            return redirect('home')->with('success', 'Login successful');
        }
        return redirect('login')->with('error', 'Some of the credentials seem to be incorrect'); 
    }

    // logs out the CURRENTLY logged in user out using flush session method and redirects back to login.blade.php
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    // for logged in user, display home.blade.php but for not authenticated user redirect to login page w/ a message
    public function home()
    {
        if(Auth::check()) {
            return view('home');
        }
        return redirect('login')->with('error', 'Please login to access the Home page.');
    }
}