<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentRepository implements StudentRepositoryInterface
{
    private $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function count()
    {
        return $this->model->count();
    }

    public function courses()
    {
        return Auth::user()->courses;
    }

    public function assignCourse($course_id, User $user)
    {
        return  $user->courses()->attach($course_id);
    }
}
