<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'weight' => 'required|int',
            'height' => 'required|int',
            'medical_department' => 'required',
            'password' => 'required',
        ]);

        return User::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'medical_department' => $request->input('medical_department'),
            'password' => Hash::make($request->input('password')),
            'permission' => 2,
            'status' => 1,
            'avatar' => "https://www.kindpng.com/picc/m/239-2399206_transparent-doctor-talking-to-patient-clipart-doctor-with.png"
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Sai tai khoan va mat khau'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        // $cookie = cookie('jwt', $token, 60 * 24, "/", "127.0.0.1", true, true, false, 'None');
        return response([
            'message' => 'success',
            'user' => $user,
        ])->withCookie($cookie);
    }

    public function user(Request $request)
    {
        return Auth::user();
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Đăng xuất khỏi thế giới thành công'
        ])->withCookie($cookie);
    }
}
