<?php

namespace App\Services;

use App\Interfaces\SocialMediaServiceInterfaces;

class TwitterService implements SocialMediaServiceInterfaces
{
    public function __construct(
        protected string $apiKey,
    ) { }

    public function share(String $email, ?String $message): array
    {
        return [
            'message' => $message ?? 'Olá, estou compartilhando meu email no twitter: ',
            'email' => $email,
            'success' => true
        ];
    }
}
