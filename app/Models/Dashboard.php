<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithTranslationsTrait;
use Dimsav\Translatable\Translatable;
use Eloquent;

class Dashboard extends Eloquent
{
    use Translatable;
    use WithTranslationsTrait;

    public $timestamps = false;

    public $translatedAttributes = [
        'footer'
    ];

    protected $fillable = [
        'template',
        'logo',
        'footer'
    ];
}
