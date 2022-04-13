<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user register
    public function registerUser(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users, email',
            'password' => 'required',
            'age' => 'required',
            'location' => 'required',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'age' => $fields['age'],
            'location' => $fields['location'],
        ]);

        $token = $user->createToken('token', ['user'])->plainTextToken;

        $response = [
            'message' => 'User Berhasil Dibuat',
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function loginUser(Request $request)
    {
        //validation request on body
        $fields = $request->validate([
            'email' => 'required|string', //uniqe terhadap tabel users dan field email
            'password' => 'required|string',
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first(); //query

        //check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Email atau Password Salah'
            ], 401);
        }
        $token = $user->createToken('token', ['user'])->plainTextToken;

        $response = [
            'message' => 'Login User Berhasil',
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 200);
    }

    public function loginAdmin(Request $request)
    {
        //validation request on body
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        //check email
        $admin = Admin::where('email', $fields['email'])->first(); //query

        //check password
        if (!$admin || !Hash::check($fields['password'], $admin->password)) {
            return response([
                'message' => 'Email atau Password Salah'
            ], 401);
        }
        $token = $admin->createToken('token', ['admin'])->plainTextToken;

        $response = [
            'message' => 'Login Admin Berhasil',
            'admin' => $admin,
            'token' => $token,
        ];
        return response($response, 200);
    }
}
