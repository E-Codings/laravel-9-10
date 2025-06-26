<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request){
        //  $credentials = $request->only('email', 'password');

        try {
            // if (! $token = JWTAuth::attempt($credentials)) {
            //     return response()->json(['error' => 'Invalid credentials'], 401);
            // }
            if (! $token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            // Get the authenticated user.
            $user = auth()->user();

            // $token = JWTAuth::fromUser($user);

            $roles = $user->getRoleNames();
            // (optional) Attach the role to the token.
            $token = JWTAuth::claims(['role' => $roles])->fromUser($user);

            return response()->json(compact('token'));
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
    }

    function logout(){
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
