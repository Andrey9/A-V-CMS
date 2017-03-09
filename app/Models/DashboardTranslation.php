<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardTranslation extends Model
{
    public $timestamps = false;

    public $translatedAttributes = [
        'footer'
    ];
}
