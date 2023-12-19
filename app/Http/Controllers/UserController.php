<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User class from the appropriate namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function login(Request $request){
        $user = User::where('username', $request->username)->first();
        if ($user){
            if(password_verify($request->password, $user->password)){
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'message' => 'Login Success',
                    'data' => [
                        'user' => $user,
                        'token' => $token
                    ]
                ]); 
            }
            return $this->error("Password Salah");
        }
        return $this->error("Email Tidak Terdaftar");
    }

    public function error($pesan){
        return response()->json([
            'status' => 404,
            'message' => $pesan
        ]);
    }

        // get all user
        public function getAllUser(){
            $user = User::all();
            if($user){
                return response()->json([
                    'status' => 200,
                    'message' => 'Berhasil Menampilkan Data User',
                    'data' => $user
                ]);
            }
            return response()->json([
                'status' => 404,
                'message' => 'Data User Tidak Ditemukan'
            ]);
        }
}
