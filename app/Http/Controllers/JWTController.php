<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JWTController extends Controller
{
    public function generateJWT(array $payload, $key)
    {
        $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
        $payload = base64_encode(json_encode($payload));

        $signature = hash_hmac('sha256', "$header.$payload", $this->key, true);
        $signature = base64_encode($signature);

        $token = "$header.$payload.$signature";

        return $token;
    }

    public function parseJWT($token, $key) {
        $token = explode('.', $token);
        if (count($token) !== 3) {
            return null;
        }

        $header = base64_decode($token[0]);
        $payload = base64_decode($token[1]);
        $signature = $token[2];

        $payloadData = json_decode($payload, true);

        $expectedSignature = hash_hmac('sha256', "$token[0].$token[1]", $key, true);
        $expectedSignature = base64_encode($expectedSignature);

        if ($expectedSignature !== $signature) {
            return null;
        }

        return $payloadData;
    }

    public function getUserId(Request $request, $key) {
        $token = explode(' ', $request->header('Authorization'))[1];
        $payloadData = $this->parseJWT($token, $key);
        return $payloadData['user_id'];
    }
}