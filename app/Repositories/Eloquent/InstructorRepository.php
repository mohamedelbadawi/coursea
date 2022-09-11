<?php

namespace App\Repositories\Eloquent;

use App\Models\Instructor;
use App\Repositories\InstructorRepositoryInterface;
use Exception;

class InstructorRepository  implements InstructorRepositoryInterface
{
    public function create(array $attributes)
    {
        try {
            $instructor = Instructor::create($attributes);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $instructor;
    }
}
