<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function create(array $data);
    public function getInstructorCoursesById($id);
    public function count();
    public function with(array $relations);
    public function paginate($number);
}
