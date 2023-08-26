<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use PharIo\Manifest\Email;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function login(){ 
        if(View::exists('user.login')){
        return view('user.login');
    }else{
        //return response()->view('errors.404'); gawa ka rin 404 blade sa views
        return abort(404);
    }
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/admin')->with('message', 'Welcome Back');
        }

        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
    }

    public function register(){
        return view('user.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:2'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        //$validated['password'] = Hash::make($validated['password']); option 2
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        //return $user;

        auth()->login($user);
        return redirect('/admin')->with('message', 'Register Successful');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('message', 'Logout successful');
    }
}
