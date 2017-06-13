<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherItemTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'content'
    ];
}
