<?php

namespace App\Http\Controllers\API;

use App\Attendee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function __construct (Attendee $user) {
        $this->user = $user;
    }

    // login
    public function login (Request $request) {
        // define credentials
        $credentials = [
            'lastname' => $request->lastname,
            'registration_code' => $request->registration_code,
        ];

        // get user
        $user = $this->user->where($credentials)->first();

        // check user
        if (!$user) {
            return response()->json([
                'message' => 'Invalid login',
            ], 401);
        }

        // generate token
        $token = md5($user->username);

        // update token
        $user->update([
            'login_token' => $token,
        ]);
        $user->token = $token;

        // response success
        return response()->json($user, 200);

    }


    // logout
    public function logout (Request $request) {
        // define user
        $user = $this->user->where('login_token', $request->token)->first();

        // user not found
        if (!$user)
            return response()->json([
                'message' => 'Invalid token',
            ], 401);

        // set token NULL
        $user->update([
            'login_token' => null,
        ]);

        // response success
        return response()->json([
            'message' => 'Logout success'
        ], 200);
    }
}
