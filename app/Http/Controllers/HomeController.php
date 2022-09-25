<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\InstructorRepositoryInterface;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Nafezly\Payments\ThawaniPayment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $categoryRepository, $courseRepository, $instructorRepository, $studentRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository, CourseRepositoryInterface $courseRepository, InstructorRepositoryInterface $instructorRepository, StudentRepositoryInterface $studentRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->courseRepository = $courseRepository;
        $this->instructorRepository = $instructorRepository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoriesCount = $this->categoryRepository->count();
        $coursesCount = $this->courseRepository->count();
        $instructorsCount = $this->instructorRepository->count();
        $studentsCount = $this->studentRepository->count();
        return view('welcome', compact('categoriesCount', 'coursesCount', 'instructorsCount', 'studentsCount'));
    }

    public function courses()
    {
        $courses = $this->courseRepository->with(['instructor'])->paginate(10);
        return view('courses', compact('courses'));
    }

    public function viewCourse(Course $course)
    {
        $course = $this->courseRepository->getById($course->id)->withCount(['lessons', 'sections'])->with(['instructor'])->first();

        $categories = Cache::remember('categories', 10000, function () {
            return   $this->categoryRepository->withCount(['courses'])->get();
        });

        $relatedCourses = $this->courseRepository->getCoursesByCategory($course->category_id, 5);

        $previewedLessons = $course->previewedLessons()->get();
        return view('singleCourse', compact('course', 'previewedLessons', 'categories', 'relatedCourses'));
    }

    public function payment_verify()
    {

        $payment = new PaymobPayment();
        //pay
        $payment->pay($order);
        //verify
        $payment->verify($request);
    }
}
