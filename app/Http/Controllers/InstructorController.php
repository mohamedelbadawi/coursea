<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructorForgetPasswordRequest;
use App\Http\Requests\InstructorLoginRequest;
use App\Http\Requests\InstructorRegisterRequest;
use App\Http\Requests\InstructorResetPasswordRequest;
use App\Http\Requests\updateInstructorProfileSettingsRequest;
use App\Models\Instructor;
use App\Models\Media;
use App\Repositories\InstructorRepositoryInterface;
use App\Services\AuthService;
use App\traits\MediaTrait;
use Exception;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    use MediaTrait;
    private $authService, $instructorRepository;

    public function __construct(AuthService $authService, InstructorRepositoryInterface $instructorRepository)
    {
        $this->authService = $authService;
        $this->instructorRepository = $instructorRepository;
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

    public function instructorProfile(Instructor $instructor)
    {
        $skills = explode(',', $instructor->skills);

        return view('instructor.profile', compact('instructor', 'skills'));
    }

    public function instructorProfileSettings(Instructor $instructor)
    {
        $skills = explode(',', $instructor->skills);
        return view('instructor.profile_settings', compact('instructor', 'skills'));
    }

    public function updateInstructorProfileSettings(updateInstructorProfileSettingsRequest $request, Instructor $instructor)
    {


        if ($request->has('image')) {
            if ($instructor->media) {

                $this->deleteImage('images/instructors/' . $instructor->media->name);
                $instructor->media->delete();
            }
            $image = $this->uploadImage($request->image, 'images/instructors/', 2000, $request->name);

            Media::create(['name' => $image, 'type' => 'image', 'medial_type' => Instructor::class, 'medial_id' => $instructor->id]);
            $data = $request->except('token', 'image');
        }
        $data = $request->except('token');
        $this->instructorRepository->update($instructor, $data);
        return redirect()->route('instructor.profile', $instructor->id);
    }
}
