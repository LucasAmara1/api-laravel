<?php

namespace App\Services;

use App\Interfaces\SocialMediaServiceInterfaces;
use App\Models\User;

class OrkutService implements SocialMediaServiceInterfaces
{
    public function __construct(
        protected string $apiKey,
    ) { }

    public function share(String $email, ?String $message): array
    {
        return [
            'message' => $message ?? 'Olá, estou compartilhando meu email no orkut: ',
            'email' => $email,
            'success' => true
        ];
    }
}
