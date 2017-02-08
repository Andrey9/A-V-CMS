<?php

namespace App\Models;

use App\Traits\Models\WithTranslationsTrait;
use Dimsav\Translatable\Translatable;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Photoalbum extends Eloquent
{
    use Translatable;
    use WithTranslationsTrait;

    /**
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'short_content',
        'content',
        'meta_keywords',
        'meta_title',
        'meta_description',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'slug',
        'status',
        'position',
        'name',
        'image',
        'short_content',
        'content',
        'meta_keywords',
        'meta_title',
        'meta_description',
    ];

    public function items()
    {
        return $this->hasMany(PhotoalbumItem::class)->with('translations');
    }

    public function scopeVisible($query)
    {
        return $query->where('status', true);
    }

    public function scopePositionSorted($query, $order = 'ASC')
    {
        return $query->orderBy('position', $order);
    }

    public function getUrl()
    {
        $url[] = $this->slug;

        return localize_url(route('photoalbum.show', array_reverse($url)));
    }

    public function getTitle()
    {
        return $this->name;
    }

    public function getShortContent($limit = false)
    {
        $limit = $limit === true ? config('photoalbum.default_short_content_length') : $limit;

        $content = empty($this->short_content) ? $this->content : $this->short_content;

        return $limit ? str_limit(strip_tags($content), $limit) : $content;
    }

    public function getContent()
    {
        return empty($this->content) ? $this->short_content : $this->content;
    }

    public function getImage()
    {
        return $this->items()->first()->image;
    }
}
