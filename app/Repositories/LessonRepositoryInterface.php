<?php

namespace App\Repositories;

use App\Models\Lesson;

interface LessonRepositoryInterface
{

    public function create($data);
    public function getById($id);
    public function update($data, Lesson $lesson);
}
