<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use Exception;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $model;
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
    }
    public function all()
    {
        try {
            return $this->model->all();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function count()
    {
        return $this->model->count();
    }

    public function findByEmail($email)
    {
    }


    public function updateByEmail($email, $data)
    {
    }

    public function random($number)
    {
        return $this->model->take($number);
    }
    public function withCount(array $relations)
    {
        return $this->model->withCount($relations);
    }
}
