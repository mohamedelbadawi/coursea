<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function media()
    {
        return $this->morphOne(Media::class, 'medial');
    }
}
