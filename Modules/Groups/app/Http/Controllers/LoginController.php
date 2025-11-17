<?php

namespace Modules\Groups\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $validCredentials = [
            [
                'email' => 'josi@gmail.com',
                'password' => '1234656A#',
            ],
            [
                'email' => 'sistema@gmail.com',
                'password' => '1234656A#',
            ],
        ];

        foreach ($validCredentials as $credential) {
            if ($credential['email'] === $email && $credential['password'] === $password) {
                return response()->json(true);
            }
        }

        return response()->json(false);
    }
}
