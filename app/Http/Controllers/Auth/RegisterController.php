<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest; // Validasi untuk register request

use Illuminate\Support\Facades\Hash;

// repository
use App\Repositories\Repository\Register\RegisterInterface;

class RegisterController extends Controller
{
    private $registerRepository;

    public function __construct(RegisterInterface $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }


    public function register(RegisterRequest $request)
    {
        $password = Hash::make($request->password, ['round' => 12]);

        // construct data
        $data = [
            'username' => $request->username,
            'password' => $password,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'role' => $request->role
        ];

        try {
            $this->registerRepository->store($data);
            return response()->json(['message' => "Success"]);
        } catch (\Throwable $th) {
            return response()->json(['fail' => $th->getMessage()]);
        }
    }

}
