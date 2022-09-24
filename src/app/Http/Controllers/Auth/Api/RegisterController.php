<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function Register(Request $request, User $user)
    {
        // Lembrar de validar request
        $userData = $request->only('name', 'email', 'password');
        $userData['password'] = bcrypt($userData['password']); // ver como usar mutator pra isso aqui
        if (!$user = $user->create($userData))
            abort(500, 'Erro ao criar novo ususário');

        //$token = auth()->user()->createAccessToken(); enviar token após registrar?

        return response()
            ->json([
                'data' => [
                    'user' => $user
                ]
            ]);
    }
}
