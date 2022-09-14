<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use Exception;

class CourseRepository implements CourseRepositoryInterface
{
    protected $model;
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {

        return  $this->model->create($data);
    }

    public function getInstructorCoursesById($id)
    {
        return $this->model->where('instructor_id', $id)->with(['category'])->get();
    }
}
