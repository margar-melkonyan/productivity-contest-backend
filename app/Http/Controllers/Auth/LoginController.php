<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;

class LoginController extends Controller
{
    public function __invoke(UserLoginRequest $request) {
        return response()->json(['message' => 'Login successful']);
    }
}
