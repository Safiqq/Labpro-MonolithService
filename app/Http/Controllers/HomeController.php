<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function checkToken(Request $request)
    {
        $token = $request->bearerToken();
        dump($request);

        // if (strcmp($token, '') !== 1) {
        //     return redirect()->route('getRegister');
        // } else {
        //     return view('home');
        // }
    }
}