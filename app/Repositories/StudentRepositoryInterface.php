<?php

namespace App\Repositories;

use App\Models\User;

interface StudentRepositoryInterface
{

    public function count();
    public function courses();
    public function assignCourse($course_id, User $user);
}
