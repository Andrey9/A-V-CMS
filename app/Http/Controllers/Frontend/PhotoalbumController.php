<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Photoalbum;
use App\Models\PhotoalbumItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoalbumController extends FrontendController
{
    public $module = 'photoalbum';

    public function index()
    {
        $model = new \ArrayObject();
        $model->meta_title = trans('labels.photoalbums');
        $model->meta_description = trans('labels.photoalbums');
        $model->meta_keywords = trans('labels.photoalbums');
        $model->image = '';
        $this->data('model', $model);
        $list = Photoalbum::with(['translations','items'])->get();
        $this->data('list', $list);

        return $this->render($this->module.'.index');
    }

    public function show($slug = '')
    {
        $model = Photoalbum::with('translations')->visible()->whereSlug($slug)->first();
        abort_if(!$model, 404);

        return view('views.photoalbum.show')->with('model',$model);

    }

    public function get_first_photos(Request $request)
    {
        $id = $request->input('id');
        if($id == 0){
            $id = Photoalbum::first()->id;
        }
        $photos = PhotoalbumItem::with('translations')->visible()->positionSorted()->where('photoalbum_id',$id)->limit(6)->get();
        return view('views.photoalbum.get_first_photos')->with('photos', $photos);
    }
}
