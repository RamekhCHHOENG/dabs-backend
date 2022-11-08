<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function genterateAccessToken($user)
    {
        $token = $user->createToken($user->email.'-'.now());

        return $token->accessToken;
    }

    protected function register(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required|min:8',
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        return response()->json($user);
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email',
    //         'password' => 'required'
    //     ]);

    //     if( auth()->attempt(['email'=>$request->email, 'password'=>$request->password]) ) {
    //         $user = Auth::user();

    //         $token = $user->createToken($user->email.'-'.now());

    //         return response()->json([
    //             'token' => $token->accessToken
    //         ]);
    //     }
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp');

            return response()->json([
                'token' => $token->accessToken
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
