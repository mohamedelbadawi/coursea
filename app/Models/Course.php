<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function previewedLessons()
    {
        return $this->hasMany(Lesson::class)->preview()->with('media');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
