<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Lembrar de validar request
        $credentials = $request->only('email', 'password');

        if(!auth()->attempt($credentials))
            abort(401, 'Credenciais inválidas');

        $token = auth()->user()->createToken('auth_token');

        return response()
            ->json([
                'data' => [
                    'token' => $token->plainTextToken
                ]
            ]);
    }

    public function logout()
    {
        // auth()->user()->tokens()->delete(); // Remove todos os tokens do usuário

        auth()->user()->currentAccessToken()->delete(); // Remove apenas o token da requisição

        return response()
            ->json([], 204);
    }
}
