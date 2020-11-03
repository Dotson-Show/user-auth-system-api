<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Services\UtilityService;
use App\Http\Requests\RegisterRequest;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class UserController extends Controller
{
    protected $user;
    protected $utilityService;

    public function __construct()
    {
        $this->middleware("auth:user",['except'=>['login','register']]);
        $this->user = new User;
        $this->utilityService = new UtilityService;
    }

    public function register(RegisterRequest $request)
    {
        $password_hash = $this->utilityService->hash_password($request->password);
        $this->user->createUser($request,$password_hash);
        $success_message = "registration completed successfully";
        return  $this->utilityService->is200Response($success_message);
    }
}
