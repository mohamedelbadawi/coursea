<?php

namespace App\Http\Controllers;

use App\Http\Requests\addNewCourseRequest;
use App\Models\Instructor;
use App\Repositories\CourseRepositoryInterface;
use App\traits\MediaTrait;
use Exception;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Laravel\Inspector;

class CourseController extends Controller
{
    use MediaTrait;
    private $courseRepository;
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    public function addNewCourse(addNewCourseRequest $request, Instructor $instructor)
    {

        try {
            $data = $request->except('token');
            $data['instructor_id'] = $instructor->id;
            if ($request->has('header_image')) {
                $header_image = $this->uploadImage($request->header_image, 'images/courses/', 2000, $request->title);
                $data['header_image'] = $header_image;
            }
            $this->courseRepository->create($data);
            return back()->with(['success' => 'Course created successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
