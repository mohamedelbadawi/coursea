<?php

namespace App\Repositories\Eloquent;

use App\Models\Section;
use App\Repositories\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{

    private $model;
    public function __construct(Section $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
    public function update($data, Section $section)
    {
        return $section->update($data);
    }
    public function getById($id)
    {
        return Section::findOrFail($id);
    }
}
