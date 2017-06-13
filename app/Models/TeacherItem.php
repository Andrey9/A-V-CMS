<?php

namespace App\Models;

use App\Traits\Models\WithTranslationsTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class TeacherItem extends Model
{
    use WithTranslationsTrait;
    use Translatable;

    public $timestamps = false;

    public $translatedAttributes = [
        'name',
        'content'
    ];

    protected $fillable = [
        'teacher_id',
        'status',
        'position',
        'name',
        'content'
    ];

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }

    public function scopeVisible($query){
        return $query->where('status', true);
    }

    public function scopePositionSorted($query, $order = 'ASC'){
        return $query->orderBy('position', $order);
    }
}
