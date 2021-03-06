<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Http\Controllers\AwsImageUpload;

class AuthController extends Controller {

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_check_id_pwd'
            ]); 
        }

    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'user_level' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                        'status' => 'error',
                        'messages' => $validator->errors(),
                    ], 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function update(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'password' => 'required|string|confirmed|min:6',
            'user_level' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                        'status' => 'error',
                        'messages' => $validator->errors(),
                    ], 400);
        }

        $user = User::where('email', $request->email)->first();

        $user->fill($request->all());
        $user->password = bcrypt($request->password);

        
        if ($request->hasFile('user_avatar'))
        {
            //user_avatar
            $awsImageUpload = new AwsImageUpload();
            
            $file = $request->file('user_avatar');
            $user_avatar = $awsImageUpload->setImageUpload($file, 'avatar',  $request->email);    
            $user->user_avatar = $user_avatar;
        }

        $user->save();

        
        return response()->json([
            'message' => 'success_update',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

}