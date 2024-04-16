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

    
    public function login(Request $request)
    {
        try {
            $registerUserData = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|min:8'
            ]);
            if ($registerUserData->fails()) {
                return response()->json([
                    'erreur' => $registerUserData->errors(),
                    'message' => 'validation failed',
                    'status' => false
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'wallets' => $user->wallets
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "logged out"
        ]);
    }

    public function register(){
        return view('auth.register');
    }
}
