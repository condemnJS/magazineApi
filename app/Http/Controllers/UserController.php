<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Http\Requests\LoginUserRequest;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'code' => 201,
            'message' => 'Пользователь создан',
            'body' => [
                'user' => $user->id
            ]
        ], 201);
    }

    public function login(LoginUserRequest $request)
    {
        if ($user = User::where('email', $request->email)->first() and Hash::check($request->password, $user->password)) {
            return response()->json([
                'code' => 200,
                'message' => 'Успешная авторизация',
                'body' => [
                    'token' => $user->generateToken()
                ]
            ], 200);
        }
        throw new HttpResponseException(response()->json([
            'code' => 403,
            'message' => 'Неверный email или пароль'
        ], 403));
    }

    public function getUser(Request $request, $token) {
        $user = User::where('api_token', $token)->first();
        return response()->json(['user' => $user], 200);
    }

    public function getUserRole(Request $request, $token) {
        $user = User::where('api_token', $token)->first();
        return response()->json(['role' => $user->role], 200);
    }
}
