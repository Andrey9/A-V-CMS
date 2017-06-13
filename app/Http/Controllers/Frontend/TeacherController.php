<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends FrontendController
{
    public $module = 'teacher';

    public function index()
    {
        $model = new \ArrayObject();
        $model->meta_title = trans('labels.photoalbums');
        $model->meta_description = trans('labels.photoalbums');
        $model->meta_keywords = trans('labels.photoalbums');
        $model->image = '';
        $this->data('model', $model);
        $list = Teacher::with(['translations','items'])->get();
        $this->data('list', $list);

        return $this->render($this->module.'.index');
    }

    public function show($slug = '')
    {
        $model = Teacher::with(['translations', 'visible_items', 'visible_items.translations'])->visible()->whereSlug($slug)->first();
        abort_if(!$model, 404);

        return view('views.teacher.show')->with('model',$model);

    }
}
