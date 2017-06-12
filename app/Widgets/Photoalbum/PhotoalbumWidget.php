<?php
namespace App\Widgets\Photoalbum;

use App\Models\Photoalbum;
use Pingpong\Widget\Widget;

class PhotoalbumWidget extends Widget
{
    public function index($type, $view, $count = null)
    {
        if($count == null){
            $photoalbums = Photoalbum::with('translations')->visible()->positionSorted()->get();
        }else{
            $photoalbums = Photoalbum::with('translations')->visible()->positionSorted()->take($count)->get();
        }


        return view('widgets.photoalbum.'.$view)->with(['photoalbums' => $photoalbums, 'type' => $type])->render();
    }
}