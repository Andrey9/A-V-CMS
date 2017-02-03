<?php

namespace App\Models;

use Eloquent;

class PhotoalbumItemTranslation extends Eloquent
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'title', 'description'];
}
