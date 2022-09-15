<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson;
use App\Repositories\LessonRepositoryInterface;

class LessonRepository implements LessonRepositoryInterface
{
    private $model;
    public function __construct(Lesson $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        return  $this->model->create($data);
    }

    public function update($data, Lesson $lesson)
    {
        return $lesson->update($data);
    }
    public function getById($id)
    {
        return Lesson::findOrFail($id);
    }
}
