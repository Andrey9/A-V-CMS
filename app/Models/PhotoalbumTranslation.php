<?php

namespace App\Models;

use Eloquent;

class PhotoalbumTranslation extends Eloquent
{

    public $timestamps = false;

    public $translatedAttributes = [
        'name',
        'short_content',
        'content',
        'meta_keywords',
        'meta_title',
        'meta_description',
    ];

}
