<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'string|regex:/^[a-zA-Z0-9_]+$/|unique:users',
            'email' => 'string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = new User([
            'id' => Str::uuid()->toString(),
            'nama' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();
        
        return redirect()->route('getLogin');
    }
}