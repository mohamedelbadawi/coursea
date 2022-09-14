<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function create(array $data);
    public function getInstructorCoursesById($id);
}
