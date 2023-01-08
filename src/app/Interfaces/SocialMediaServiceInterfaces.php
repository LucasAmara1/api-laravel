<?php

namespace App\Interfaces;

interface SocialMediaServiceInterfaces
{
    public function share(String $email, ?String $message): array;
}
