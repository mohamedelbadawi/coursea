<?php

namespace App\Http\Controllers;

use App\Http\Requests\addSectionRequest;
use App\Http\Requests\updateSectionRequest;
use App\Models\Course;
use App\Models\Section;
use App\Repositories\SectionRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    private $sectionRepository;
    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }
    public function addSection(addSectionRequest $request, Course $course)
    {
        try {
            $data = $request->except('_token');
            $data['course_id'] = $course->id;
            $this->sectionRepository->create($data);
            return back()->with(['success' => 'section created successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    public function updateSection(updateSectionRequest $request, Section $section)
    {

        try {
            $data = $request->except('_token');
            $this->sectionRepository->update($data, $section);
            return back()->with(['success' => 'section update successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    public function reorderSections(Request $request)

    {


        foreach ($request->ordering as $key => $value) {

            $section = $this->sectionRepository->getById($value);

            $this->sectionRepository->update(['order' => $key + 1], $section);
        }
        return true;
    }
}
