<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(RegisterUser $request)
    {

        try {

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;


            $user->password = $request->password;

            $user->save();


            return response()->json([
                'status_code' => 200,
                'status_message' => 'Utilisateur enregistré',
                'user' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function login(LoginRequest $request)
    {
        
        if (auth()->attempt($request->only(['email', 'password']))) {

            $user = auth()->user();
         
            $token = $user->createToken('MY_SECRET_KEY_ONLY_VISIBLE_AT_BACKEND')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Utilisateur connecté',
                'user'=> $user,
                'token'=> $token
            ]);


        } else {
            return response()->json([
                'status_code' => 403,
                'status_message' => 'Informations non valides',
            ]);
        }
    }
}
