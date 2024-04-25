<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{


    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function register(){
        return view('auth.register');
    }

    
    public function login(){
        return view('auth.login');
    }

    
    public function singin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return redirect()->back()->withErrors(['error' => 'Les identifiants sont incorrects'])->withInput();
            }
            return redirect()->route('home')->with('success', 'Connexion réussie');
    
        } catch (\Exception $exception) {
            Log::error('Erreur lors du login : ' . $exception->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la connexion'])->withInput();
        }
    }
    


    public function signup(Request $request)
    {
        try {
          
            $requestData = $request->all();
            $requestData['role_id'] = 1;

            if (\App\Models\User::where('email', $requestData['email'])->exists()) {
                return redirect()->route('login')->with('info', 'Cet email est déjà utilisé. Veuillez vous connecter.');
            }
            $validator = Validator::make($requestData, [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'ville' => 'required|string',
                'region' => 'required|string',
                'tele' => 'required|string',
                'password' => 'required|min:8',
                'role_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user = $this->userService->Register($requestData);
    
            return redirect()->route('login')->with('success', 'Utilisateur créé avec succès');
        } catch (\Exception $exception) {
            \Log::error('Erreur lors de la création de l\'utilisateur : ' . $exception->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur s\'est produite lors de la création de l\'utilisateur. Veuillez réessayer.']);
        }
    }
    

public function logout()
{
    auth()->user()->tokens()->delete();

    return redirect()->route('logout.success');
}
}

