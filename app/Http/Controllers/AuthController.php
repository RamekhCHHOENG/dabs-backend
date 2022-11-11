<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Clinic;
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
        $response;
        $name = $request->userType === 1 ? $request->firstName.' '.$request->lastName : $request->name;

        // dd($request->name);
        $user = User::create([
            "name" => $name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        if($request->userType === 1) {
            $doctor = Doctor::create([
                "first_name" => $request->firstName,
                "last_name" => $request->lastName,
                "email" => $request->email,
                "phone_number" => $request->email,
                "user_id" => $user->id,
            ]);
            $response = $doctor;
        } else {
            $clinic = Clinic::create([
                "name" => $name,
                "email" => $request->email,
                "phone_number" => $request->email,
                "user_id" => $user->id,
            ]);
            $response = $clinic;
        }
        // dd($user);
        return response()->json($response);
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

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
