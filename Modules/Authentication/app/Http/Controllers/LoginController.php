<?php

namespace Modules\Authentication\app\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

        if (($email === 'josi@gmail.com' && $password === '1234656A#') ||
            ($email === 'sistema@gmail.com' && $password === '1234656A#')) {
            return response()->json(true);
        }

        return response()->json(false);
    }
}