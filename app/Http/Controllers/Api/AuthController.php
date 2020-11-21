<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->ajax();

        validator($request->all(),[
            'email' => 'required|string',
            'password' => 'required|string',
        ])->validate();

        $credentials = $request->only('email','password');

        $token = \JWTAuth::attempt($credentials);

        // if (! $token = auth()->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        return $this->responseToken($token);
    }

    private function responseToken($token) {
        return $token ? ['token' => $token] : response()->json(['error' => \Lang::get('auth.failed')],400);
    }

    public function logout() {
        \Auth::guard('api')->logout();

        return response()->json([],204); // No content
    }

    public function refresh() {
        $token = \Auth::guard('api')->refresh();

        return response()->json(['token' => $token],200); // No content
    }
}
