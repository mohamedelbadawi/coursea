<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    const NOTE_TYPES = ['personal', 'work', 'social', 'important'];
    protected $guarded = [];
}
