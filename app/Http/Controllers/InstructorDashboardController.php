<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class InstructorDashboardController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function dashboard()
    {
        $categories = $this->categoryRepository->all();
        return view('instructor.dashboard',compact('categories'));
    }
}
