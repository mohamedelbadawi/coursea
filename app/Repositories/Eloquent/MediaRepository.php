<?php

namespace App\Repositories\Eloquent;

use App\Models\Media;
use App\Repositories\MediaRepositoryInterface;
use PhpParser\Node\Expr\FuncCall;

class MediaRepository implements MediaRepositoryInterface
{
    private $model;
    public function __construct(Media $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        return $this->model->create($data);
    }
}
