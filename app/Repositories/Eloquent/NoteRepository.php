<?php

namespace App\Repositories\Eloquent;

use App\Models\Note;
use App\Repositories\NoteRepositoryInterface;

class NoteRepository implements NoteRepositoryInterface
{

    protected $model;
    public function __construct(Note $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {

        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function noteTypes()
    {

        return $this->model::NOTE_TYPES;
    }
    public function getNotesById($id)
    {
        return $this->model->where('notable_id', $id)->get();
    }

    public function deleteById($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
