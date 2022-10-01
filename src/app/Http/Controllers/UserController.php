<?php

namespace App\Http\Controllers;

use App\Interfaces\SocialMediaServiceInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLoggedInUser(Request $request)
    {
        return $request->user();
    }

    public function shareLoggedInUser(Request $request): JsonResponse
    {
        $email = $request->user()->email;

        $socialMediaResponse = app(SocialMediaServiceInterfaces::class)->share($email);

        return response()
            ->json([
                'data' => [
                    'message' => $socialMediaResponse['message'],
                    'success' => $socialMediaResponse['success']
                ]
            ]);
    }
}
