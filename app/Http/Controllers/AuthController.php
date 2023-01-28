<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;


class AuthController extends Controller
{

    //register
    public function register(request $request)
    {
        $fields = $request->validate([
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed',
                'roles' => 'required|string'

        ]);


         $users = user::create ([

            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'roles' => $fields['roles'],
        


        ]);

        $token = $users->createToken('myappToken')->plainTextToken;

        $response = [

            'user' => $users,
            'token' => $token,
            'message' => 'ACCOUNT CREATED'

   

        ];

        return response($response, 201);


    }

//login

     public function login(request $request)

    {

        $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
                'message' => 'SUCCESSFULLY LOGGED-IN'
        ]);

        // check user 
         $users = user::where('email', $fields['email'])->first(); 

        //  check password

        if (!$users || !Hash::check($fields['password'], $users->password)){
            return response ([


                    'message' => 'BAD EMAIL/PASSWORD!'
            ],401);

 
        }  


        $token = $users->createToken('myappToken')->plainTextToken;

        $response = [

            'user' => $users,
            'token' => $token,
            'message' => 'SUCCESSFULLY LOGGED-IN'

        ];

        return response($response, 201);


    }


    //logout

        public function logout(request $request)
        {
                auth()->user()->tokens()->delete();

            return [
                'message' => 'SUCCESSFULLY LOGGED-OUT'

            ];


        }

}
