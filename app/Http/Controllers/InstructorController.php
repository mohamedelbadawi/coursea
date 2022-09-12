<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorForgetPasswordRequest;
use App\Http\Requests\InstructorLoginRequest;
use App\Http\Requests\InstructorRegisterRequest;
use App\Http\Requests\InstructorResetPasswordRequest;
use App\Services\AuthService;
use Exception;
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

    public function forgetPasswordPage()
    {
        return view('auth.instructor_forgetPassword');
    }

    public function  resetPasswordLink(InstructorForgetPasswordRequest $request)

    {
        try {
            $data = $request->only(['email']);
            return  $this->authService->instructorResetPasswordLink($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function resetPasswordPage(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('auth.instructor_resetPassword', compact('token', 'email'));
    }


    public function resetPassword(InstructorResetPasswordRequest $request)
    {
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['token'] = $request->token;
        return $this->authService->instructorResetPassword($data);
    }
}
