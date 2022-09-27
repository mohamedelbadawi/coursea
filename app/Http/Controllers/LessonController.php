<?php

namespace App\Http\Controllers;

use App\Http\Requests\addLessonRequest;
use App\Http\Requests\updateLessonRequest;
use App\Models\Lesson;
use App\Models\Media;
use App\Models\Section;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\MediaRepositoryInterface;
use App\traits\MediaTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class LessonController extends Controller
{
    use MediaTrait;
    private $lessonRepository, $mediaRepository;
    public function __construct(LessonRepositoryInterface $lessonRepository, MediaRepositoryInterface $mediaRepository)
    {
        $this->lessonRepository = $lessonRepository;
        $this->mediaRepository = $mediaRepository;
    }

    public function addLesson(addLessonRequest $request)
    {
        try {
            $filename = $this->uploadToS3($request->title, $request->video);

            $lessonData = [
                'title' => $request->title, 'is_preview' => $request->is_preview == 'on' ? true : false,
                'course_id' => $request->course_id, 'section_id' => $request->section_id
            ];

            $lesson = $this->lessonRepository->create($lessonData);
            $mediaData = ['name' => $filename, 'type' => 'video', 'medial_type' => Lesson::class, 'medial_id' => $lesson->id];
            $this->mediaRepository->create($mediaData);
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        $request->session()->flash('success', 'lesson uploaded successfully');
    }

    public function reorderLessons(Request $request)
    {
        foreach ($request->ordering as $key => $value) {

            $lesson = $this->lessonRepository->getById($value);

            $this->lessonRepository->update(['order' => $key + 1], $lesson);
        }
    }

    public function updateLesson(updateLessonRequest $request, Lesson $lesson)
    {
        try {
            $data = $request->except('_token');
            $data['is_preview'] = $request->is_preview == 'on' ? true : false;
            $this->lessonRepository->update($data, $lesson);
            return back()->with(['success' => 'lesson update successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    public function viewLesson(Lesson $lesson)
    {
        return view('instructor.viewLesson', compact('lesson'));
    }
}
