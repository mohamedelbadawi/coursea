<?php

namespace App\Services;

use App\Models\Instructor;
use App\Notifications\InstructorResetPasswordNotification;
use App\Repositories\InstructorRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AuthService
{



    private $instructorRepository;
    public function __construct(InstructorRepositoryInterface $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    public function instructorLogin($data)
    {
        try {
            if (Auth::guard('instructor')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect()->intended(route('instructor.home'));
            }
            return redirect()->back()->withErrors(['password' => 'this data do not match our data']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function instructorRegister(array $attributes)
    {
        try {
            $attributes['password'] = bcrypt($attributes['password']);
            $this->instructorRepository->create($attributes);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route('instructor.home');
    }

    public function instructorResetPasswordLink(array $data)
    {

        try {
            $token = \Str::random(64);
            $password = DB::table('password_resets')->insert(
                array(
                    'email' => $data['email'],
                    'token' => $token,
                    'created_at' => Carbon::now()
                )

            );
            $instructor = $this->instructorRepository->findByEmail($data['email']);

            Notification::send($instructor, new InstructorResetPasswordNotification($token, $data['email']));

            return redirect()->back()->with('success', 'We have sent you an email to reset your password');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function instructorResetPassword(array $data)
    {

        try {
            $checkToken = DB::table('password_resets')->where(['email' => $data['email'], 'token' => $data['token']])->first();
            if (!$checkToken) {
                return back()->withErrors(['token' => 'Invalid token']);
            }

            $updatedPassword = ['password' => bcrypt($data['password'])];
            $this->instructorRepository->updateByEmail($data['email'], $updatedPassword);
            return redirect()->route('instructor.login_page')->with(['success', 'Password updated successfully']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
