<?php

namespace App\Http\Controllers;

use App\Http\Requests\addNoteRequest;
use App\Models\Instructor;
use App\Models\Note;
use App\Repositories\NoteRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    private $noteRepository;
    public function __construct(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }
    public function addNewNote(addNoteRequest $request)
    {
        try {
            $data = $request->except('token');
            $data['notable_id'] = auth()->id();
            if (auth('instructor')->check()) {
                $data['notable_type'] = Instructor::class;
            }
            $this->noteRepository->create($data);
            return back()->with(['success' => 'note added successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    public function deleteNote($id)
    {
        try {

            $this->noteRepository->deleteById($id);
            return back()->with(['success' => 'note deleted successfully']);
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
