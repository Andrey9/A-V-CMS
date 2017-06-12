<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithTranslationsTrait;
use Dimsav\Translatable\Translatable;

class Teacher extends Model
{
    use WithTranslationsTrait;
    use Translatable;

    public $timestamps = false;

    public $translatedAttributes = [
        'name',
        'description'
    ];

    protected $fillable = [
        'slug',
        'status',
        'position',
        'image',
        'name',
        'description'
    ];

    public function scopePositionSorted($query, $order = 'ASC'){
        return $query->orderBy('position', $order);
    }

    public function scopeVisible($query){
        return $query->where('status',true);
    }
}
