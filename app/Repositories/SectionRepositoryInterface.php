<?php

namespace App\Repositories;

use App\Models\Section;

interface SectionRepositoryInterface
{
    public function create($data);
    public function update($data, Section $section);
    public function getById($id);
}
