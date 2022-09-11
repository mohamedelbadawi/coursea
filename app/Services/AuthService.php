<?php

namespace App\Services;

use App\Repositories\InstructorRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;

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
}
