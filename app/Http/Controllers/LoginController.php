<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    private $key;
    private $token_lifespan_in_hours;
    
    public function __construct()
    {
        $this->key = env('SECRET_TOKEN');
        $this->token_lifespan_in_hours = env('TOKEN_LIFESPAN_IN_HOURS');
    }
    
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emailusername' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $isEmailValid = filter_var($request->input('emailusername'), FILTER_VALIDATE_EMAIL);
        $isUsernameValid = preg_match('/^[a-zA-Z0-9_]+$/', $request->input('emailusername'));
        
        if (!$isEmailValid && !$isUsernameValid) {
            $errors = new MessageBag([
                'emailusername' => ['Email or username is invalid.'],
            ]);
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $user = User::where($isEmailValid ? 'email' : 'username', '=', $request->input('emailusername'))->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                $payload = [
                    'authorized' => $user->type,
                    'user_id' => $user->id,
                    'exp' => time() + ($this->token_lifespan_in_hours * 60 * 60),
                ];
        
                $token = JWTController::generateJWT($payload);
                
                return redirect('/')->withCookie(cookie('jwtToken', $token, $this->token_lifespan_in_hours * 60));
            } else {
                $errors = new MessageBag([
                    'password' => ['Email, username, or password is invalid.1'],
                ]);
                return redirect()->back()->withErrors($errors)->withInput();
            }
        } else {
            $errors = new MessageBag([
                'emailusername' => ['Email, username, or password is invalid.2'],
            ]);
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }
}