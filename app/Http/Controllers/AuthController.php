<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;

class AuthController extends Controller
{


    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function  signup(Request $request)
{
    try {
        $registerUserData = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'ville' => 'required|string',
            'region' => 'required|string',
            'password' => 'required|min:8'
        ]);

        if ($registerUserData->fails()) {
            // dd( $registerUserData);
            return redirect()->back()->withErrors($registerUserData)->withInput();
        }

        $user = $this->userService->Register($request->all());

        return redirect()->route('categorie.index')->with('success', 'Utilisateur créé avec succès');
    } catch (\Exception $exception) {
        // dd('$registerUserData ');
        return redirect()->back()->withInput()->withErrors(['error' => $exception->getMessage()]);
       
        
    }
}

    
public function singin(Request $request)
{
    try {
        $loginUserData = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);

        if ($loginUserData->fails()) {
            return redirect()->back()->withErrors($loginUserData)->withInput();
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors(['error' => 'Email & Password do not match our records.'])->withInput();
        }

        return redirect()->route('categorie.index')->with('success', 'User logged in successfully');

    } catch (\Throwable $exception) {
        return redirect()->back()->withInput()->withErrors(['error' => $exception->getMessage()]);
    }
}

public function logout()
{
    auth()->user()->tokens()->delete();

    return redirect()->route('logout.success');
}


    public function register(){
        return view('auth.register');
    }

    
    public function login(){
        return view('auth.login');
    }
}

