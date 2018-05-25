<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Hash;
use Validator;
use DB;
use Input;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function currentUser()
    {
        $currentUser = JWTAuth::parseToken()->toUser();
        if ($currentUser) {
            return response()->json($currentUser);
        }
        return response()->json(['error'=>"You're not login","isAuthen"=> false]);
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);
        $credentials = $request->only('password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => 'password invalid !'
                ], 422);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not create token!'
            ], 500);
        }
        return response()->json([
            'token' => $token
        ], 200);
    }

    public function register(Request $request){
        $user = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user
        ]);
    }

}
