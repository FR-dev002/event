<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest; // validasi untuk login request

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// repository
use App\Repositories\Repository\Login\LoginInterface;


class LoginController extends Controller
{

    private $loginRepository;

    public function __construct(LoginInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }


    public function login(LoginRequest $request)
    {
        $credentials = $this->credentials($request);
        $username = $credentials['username'];
        $user = $this->loginRepository->findByUsername($username);

        if($user) {
            $this->check_password($request->password, $user->password);
            if (! $token = Auth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);

        } else {
            return response()->json(['Message' => 'User not found']);
        }

    }


    // TODO List protected Function
    protected function credentials(Request $request)
    {
        $credentials = $request->only('username', 'password');
        return $credentials;
    }

    protected function check_password($postPassword, $password)
    {
        $checkPassword = Hash::check($postPassword, $password);
        if (!$checkPassword) {
            return response()->json(['Message' => 'invalid password']);
        }
    }

}
