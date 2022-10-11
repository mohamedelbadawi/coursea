<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function create(array $attributes);
    public function findByEmail($email);
    public function updateByEmail($email, $data);
    public function all();
    public function count();
}
