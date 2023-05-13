<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        $credential = $request->only(['email', 'password']);



        $validator = Validator::make($request->all(), [
            'email' => 'required | email:rfc,dns',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'statusText' => 'fail',
                    'message' => $validator->errors(),
                ], 400);
        }

        $user = User::where('email', $credential['email'])->first();


        $access_token = '';

        if (!empty($user)) {
            // dd($user->role == $request->role,$request->role);
            if (Hash::check($credential['password'], $user->password) && ($user->role == $request->role)) {
                // dd('hello');
                $access_token = JWTAuth::attempt($credential,['exp' => Carbon::now()->addDays(1)->timestamp]);
            }
        }
        if (!$access_token) {
            return response()->json(
                [
                    'status' => 401,
                    'statusText' => 'Unauthorized',
                    'message' => 'email or password is wrong',
                ], 401);
        }

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'success',
                'user' => auth()->user(),
                'authorization' => [
                    'access_token' => $access_token,
                    'type' => 'Bearer',
                ],
            ], 200);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(
            [
                "status" => "success",
                "message" => "successfully logged out",
            ], 200);
    }
}
