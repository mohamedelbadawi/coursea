<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StudentRepository implements StudentRepositoryInterface
{
    private $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function count()
    {
        return $this->model->count();
    }
}
