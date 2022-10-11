<?php

namespace App\Http\Controllers;

use App\Http\Requests\viewCourseRequest;
use App\Models\Course;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    private $studentRepository;
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }
    public function index()
    {
        return view('student.dashboard');
    }
    public function myLearning()
    {
        $courses = $this->studentRepository->courses();
        return view('student.learning', compact('courses'));
    }

    public function viewCourse(viewCourseRequest $request, Course $course)
    {
        $sections = $course->sections()->with(['lessons','lessons.media'])->get()->sortBy('order');

        return view('student.singleCourse', compact('sections','course'));
    }
}
