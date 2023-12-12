<?php

namespace domain\Services;

use Throwable;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $user;
    protected $userProfile;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login($data)
    {
        $user = $this->user->where("email", $data['email'])->first();

        if ($user) {        

            $token = $user->createToken('token');

            $response = [
                'user' => $user,
                'token' => $token->accessToken,
            ];

            return $response;
        }
    }
  
    public function createUser($data)
    {
        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>  Hash::make($data['password']),
        ]);

        return $user;
    }

}
