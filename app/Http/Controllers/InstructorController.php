<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorLoginRequest;
use App\Http\Requests\InstructorRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function registerPage()
    {
        return view('auth.instructor_register');
    }

    public function register(InstructorRegisterRequest $request)
    {
        $data = $request->only(['name', 'email', 'password', 'phone']);
        return   $this->authService->instructorRegister($data);
    }

    public function loginPage()
    {
        return view('auth.instructor_login');
    }

    public function login(InstructorLoginRequest $request)
    {
        $data = $request->only(['email', 'password']);
        return   $this->authService->instructorLogin($data);
    }
}
