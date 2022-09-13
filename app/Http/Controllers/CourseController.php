<?php

namespace App\Http\Controllers;

use App\Http\Requests\addNewCourseRequest;
use App\Repositories\CourseRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $courseRepository;
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    public function addNewCourse(addNewCourseRequest $request)
    {
        try {
            $this->courseRepository->create($request->except('token'));
            return back()->with(['success' => 'Course created successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
