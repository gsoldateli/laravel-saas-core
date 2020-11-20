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
        // dd($request->headers->get('X-Requested-With'));
        // dd($request->all());
        validator($request->all(),[
            'title' => 'required|max:255',
            'body' => 'required|min:100',
        ])->validate();

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|max:255',
        //     'body' => 'required|min:100',
        // ]);
        //     if($validator->fails()) {
        //         return $validator->validate();
        //     }

        // if (! $token = auth()->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // return $this->respondWithToken($token);
    }
}
