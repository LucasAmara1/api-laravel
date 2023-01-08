<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareUserRequest;
use App\Interfaces\SocialMediaServiceInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLoggedInUser(Request $request)
    {
        return $request->user();
    }

    public function shareLoggedInUser(ShareUserRequest $request): JsonResponse
    {
        $email = $request->user()->email;
        $message = $request->get('message');
        $socialMediaResponse = app(SocialMediaServiceInterfaces::class)->share($email, $message);

        return response()
            ->json([
                'data' => [
                    'message' => $socialMediaResponse['message'],
                    'email' => $socialMediaResponse['email'],
                    'success' => $socialMediaResponse['success']
                ]
            ]);
    }
}
