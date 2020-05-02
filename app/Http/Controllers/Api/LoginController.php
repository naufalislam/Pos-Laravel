<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function action(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(auth()->attempt($request->only('email', 'password'))){
            $currentUser = auth()->user();

            return (new UserResource($currentUser))->additional([
                'meta' => [
                    'token' => $currentUser->api_token,
                ],
                'error' => 'false',
                'message' => 'Success Login'
            ]);
        }

        return response()->json([
            'error' => 'true',
            'message' => 'Email atau Password Salah'
        ], '401');
    }
}
