<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use Exception;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function create(array $attributes)
    {
    }
    public function all()
    {
        try {
            return Category::all();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function findByEmail($email)
    {
    }


    public function updateByEmail($email, $data)
    {
    }
}
