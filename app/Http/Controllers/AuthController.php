<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(Request $request)
    {
          $validator = Validator::make($request->all(),[
            'fullname'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'email'=>'required|email|string',
            'password'=>'required|min:8'
          ]);
          if ($validator->fails()){
            return response()->json($validator->errors()->tojson(),400);
          }
          $user = User::create(array_merge(
            $validator->validated(),['password'=>bcrypt($request->password)]
          ));
          return response()->json([
            'message'=>'user successfully registered',
            'user'=>$user
          ],201);
    }

    public function login(Request $request)
    {
        if(is_numeric($request->get('email'))){
             $credentails = ['phone' => $request->get('email'),
            'password' => $request->get('password')];
        }elseif(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)){
         $credentails = ['email' => $request->get('email'), 'password'=>$request->get('password')];}
        if(!$token = auth('api')->attempt($credentails)){
            return response()->json(['error'=>'Unauthenticated'],401);
         }
         return $this->createNewToken($token);
    }
    public function createNewToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth('api')->factory()->getTTL()*60,
            'user' => auth()->user()
        ]);
    }


    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message'=>'successfully logged out'
        ]);
    }


    
}
