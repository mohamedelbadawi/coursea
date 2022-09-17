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

    public function count()
    {
        return $this->model->count();
    }

    public function paginate($number)
    {
        return $this->model->paginate($number);
    }
    public function with(array $relations)
    {
        return $this->model->with($relations);
    }
    public function getById($id)
    {

        return $this->model->where('id', $id);
    }

    public function getCoursesByCategory($category_id, $num)
    {
        return $this->model->where('category_id', $category_id)->take($num);
    }
}
