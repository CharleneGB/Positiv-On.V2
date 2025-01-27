<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function register(RegisterUser $request){

    try {
        
    $user = new User();

    $user->name = $request->name;
    $user->email = $request->email;

    
    $user->password = $request->password;

    $user-> save();


    return response()->json([
        'status_code' => 200,
        'status_message' => 'Utilisateur enregistré',
        'user' => $user
    ]);

    } catch (Exception $e) {
       return response()->json($e);
    }

   }
}
