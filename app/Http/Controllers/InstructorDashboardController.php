<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\InstructorRepositoryInterface;
use App\Repositories\NoteRepositoryInterface;
use Illuminate\Http\Request;

class InstructorDashboardController extends Controller
{
    private $categoryRepository, $noteRepository, $instructorRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository, NoteRepositoryInterface $noteRepository, InstructorRepositoryInterface $instructorRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->noteRepository = $noteRepository;
        $this->instructorRepository = $instructorRepository;
    }

    public function dashboard()
    {

        $noteTypes = $this->noteRepository->noteTypes();
        $notes = auth()->user()->notes;
        return view('instructor.dashboard', compact('noteTypes', 'notes'));
    }
    public function coursesPage()
    {
        $courses = auth()->user()->courses;
        $categories = $this->categoryRepository->all();
        return view('instructor.courses', compact('categories', 'courses'));
    }


    public function viewCourse(Course $course)
    {

        $sections = $course->sections()->with(['lessons'])->get()->sortBy('order');
        return view('instructor.singleCourse', compact('course', 'sections'));
    }
}
