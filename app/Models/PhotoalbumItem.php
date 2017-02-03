<?php

namespace App\Models;

use App\Traits\Models\WithTranslationsTrait;
use Dimsav\Translatable\Translatable;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class PhotoalbumItem extends Eloquent
{
    use Translatable;
    use WithTranslationsTrait;

    /**
     * @var array
     */
    public $translatedAttributes = ['name', 'title', 'description'];

    /**
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'name',
        'title',
        'image',
        'description',
        'position',
        'status',
    ];

    public function photoalbum()
    {
        return $this->belongsTo(Photoalbum::class)->with('translations');
    }

    public function scopeVisible($query)
    {
        return $query->whereStatus(true);
    }

    public function scopePositionSorted($query, $order = 'ASC')
    {
        return $query->orderBy('position', $order);
    }

    public function getTitle()
    {
        return $this->title ?: $this->name;
    }

    public function getDesc()
    {
        return $this->title ?: $this->description;
    }
}
