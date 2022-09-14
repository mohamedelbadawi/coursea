<?php

namespace App\Http\Controllers;

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
        $categories = $this->categoryRepository->all();
        $noteTypes = $this->noteRepository->noteTypes();
        $notes = $this->instructorRepository->notes(auth()->id());
        return view('instructor.dashboard', compact('categories', 'noteTypes', 'notes'));
    }
    public function noteFilter($tag)
    {
        
    }
}
