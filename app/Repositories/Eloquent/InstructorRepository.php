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

    public function findByEmail($email)
    {
        try {
            return $instructor = Instructor::where('email', $email)->get();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function updateByEmail($email, $data)
    {
        try {
            return Instructor::where('email', $email)->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Instructor $instructor, array $data)
    {
        try {
            return  $instructor->update($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
