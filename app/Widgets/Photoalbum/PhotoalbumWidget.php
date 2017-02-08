<?php
namespace App\Widgets\Photoalbum;

use App\Models\Photoalbum;
use Pingpong\Widget\Widget;

class PhotoalbumWidget extends Widget
{
    public function index()
    {
        $photoalbums = Photoalbum::with('translations')->visible()->positionSorted()->get();

        return view('widgets.photoalbum.index')->with('photoalbums',$photoalbums)->render();
    }
}