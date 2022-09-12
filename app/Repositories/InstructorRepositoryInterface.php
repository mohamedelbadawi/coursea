<?php

namespace App\Repositories;

use App\Models\Instructor;

interface InstructorRepositoryInterface
{
    public function create(array $attributes);
    public function findByEmail($email);
    public function updateByEmail($email, $data);
}
