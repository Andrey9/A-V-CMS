<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Photoalbum;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoalbumController extends FrontendController
{

    public function show($slug = '')
    {
        $model = Photoalbum::with('translations')->visible()->whereSlug($slug)->first();
        abort_if(!$model, 404);

        return view('views.photoalbum.show')->with('model',$model);

    }
}
