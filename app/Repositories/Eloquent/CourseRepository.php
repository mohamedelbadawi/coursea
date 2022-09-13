<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use Exception;

class CourseRepository implements CourseRepositoryInterface
{
    public function create(array $data)
    {
        try {
            return  $course = Course::create($data);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
