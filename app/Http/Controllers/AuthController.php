<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Http\Requests\Admin\AuthorizationRequest;
use App\Http\Resources\AdminResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthorizationRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
           throw new UnauthorizedException();
        }

        return $this->respondWithToken($token);
    }


    public function me()
    {
        $admin = auth()->user();
        return json_success(new AdminResource($admin));
    }

    public function logout()
    {
        auth()->logout();

        return json_success();
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return json_success([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
