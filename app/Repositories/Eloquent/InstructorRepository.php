<?php

namespace App\Repositories\Eloquent;

use App\Models\Instructor;
use App\Repositories\InstructorRepositoryInterface;
use Exception;

class InstructorRepository  implements InstructorRepositoryInterface
{
    private $model;
    public function __construct(Instructor $model)
    {
        $this->model = $model;
    }
    public function create(array $attributes)
    {
        try {
            return $this->model->create($attributes);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function findByEmail($email)
    {
        try {
            return $this->model->where('email', $email)->get();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function updateByEmail($email, $data)
    {
        try {
            return $this->model->where('email', $email)->update($data);
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

    public function notes($id)
    {
        $instructor = Instructor::findOrFail($id);
        return $instructor->notes;
    }

    public function courses($id)
    {
        $instructor = Instructor::findOrFail($id);
        return $this->model->courses;
    }
}
