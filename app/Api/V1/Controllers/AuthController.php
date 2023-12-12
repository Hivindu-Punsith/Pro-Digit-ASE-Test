<?php

namespace App\Api\V1\Controllers;

use Throwable;
use domain\Facades\AuthFacade;
use App\Http\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Api\V1\Requests\UserLoginRequest;

class AuthController extends Controller
{

    public function login(UserLoginRequest $request)
    {
        try {          

            if (!Auth::attempt($request->only('email', 'password'))) {
                return ApiResponse::unAuthorized();
            }

            $response = AuthFacade::login($request->all());

            return ApiResponse::success($response, 'Login success');
        } catch (Throwable $th) {
            throw $th;
            return ApiResponse::exception();
        }
    }
}
