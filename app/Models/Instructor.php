<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];

    public function media()
    {
        return $this->morphOne(Media::class, 'medial');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
