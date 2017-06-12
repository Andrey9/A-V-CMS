<?php

namespace App\Http\Controllers\Backend;

use App\Models\Teacher;
use App\Traits\Controllers\AjaxFieldsChangerTrait;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Teacher\TeacherRequest;
use Datatables;
use DB;
use Event;
use Exception;
use FlashMessages;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Meta;
use Redirect;
use Response;

class TeacherController extends BackendController
{
    use AjaxFieldsChangerTrait;

    public $module = "teacher";

    /**
     * @var array
     */
    public $accessMap = [
        'index'           => 'teacher.read',
        'create'          => 'teacher.create',
        'store'           => 'teacher.create',
        'show'            => 'teacher.read',
        'edit'            => 'teacher.read',
        'update'          => 'teacher.write',
        'destroy'         => 'teacher.delete',
        'ajaxFieldChange' => 'teacher.write',
    ];

    public function __construct(ResponseFactory $response)
    {
        parent::__construct($response);

        Meta::title(trans('labels.teachers'));

        $this->breadcrumbs(trans('labels.teachers'), route('admin.teacher.index'));

        $this->middleware('slug.set', ['only' => ['store', 'update']]);
    }

    /**
     * Display a listing of the resource.
     * GET /teacher
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Response
     */
    public function index(Request $request)
    {
        if ($request->get('draw')) {
            $list = Teacher::withTranslations()->joinTranslations('teachers', 'teacher_translations')->select(
                'teachers.id',
                'teacher_translations.name',
                'status',
                'position',
                'slug'
            );

            return $dataTables = Datatables::of($list)
                ->filterColumn('id', 'where', 'teachers.id', '=', '$1')
                ->filterColumn('teacher_translations.name', 'where', 'teacher_translations.name', 'LIKE', '%$1%')
                ->editColumn(
                    'status',
                    function ($model) {
                        return view(
                            'partials.datatables.toggler',
                            ['model' => $model, 'type' => $this->module, 'field' => 'status']
                        )->render();
                    }
                )
                ->editColumn(
                    'position',
                    function ($model) {
                        return view(
                            'partials.datatables.text_input',
                            ['model' => $model, 'type' => $this->module, 'field' => 'position']
                        )->render();
                    }
                )
                ->editColumn(
                    'actions',
                    function ($model) {
                        return view(
                            'partials.datatables.control_buttons',
                            ['model' => $model, 'front_link' => false, 'type' => $this->module]
                        )->render();
                    }
                )
                ->setIndexColumn('id')
                ->removeColumn('meta_keywords')
                ->removeColumn('meta_title')
                ->removeColumn('meta_description')
                ->removeColumn('description')
                ->removeColumn('translations')
                ->removeColumn('slug')
                ->make();
        }

        $this->_fillAdditionTemplateData();

        $this->data('page_title', trans('labels.teachers'));
        $this->breadcrumbs(trans('labels.teachers_list'));

        return $this->render('views.teacher.index');
    }

    public function create()
    {
        $this->_fillAdditionTemplateData();

        $this->data('model', new Teacher);

        $this->data('page_title', trans('labels.teacher_create'));

        $this->breadcrumbs(trans('labels.teacher_create'));

        return $this->render('views.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /teacher
     *
     * @param TeacherCreateRequest $request
     *
     * @return \Response
     */
    public function store(TeacherRequest $request)
    {
        $input = $request->all();

        DB::beginTransaction();

        try {
            $model = new Teacher($input);

            $model->save();

            DB::commit();

            FlashMessages::add('success', trans('messages.save_ok'));

            return Redirect::route('admin.teacher.index');
        } catch (Exception $e) {
            DB::rollBack();

            FlashMessages::add('error', trans('messages.save_failed'));

            return Redirect::back()->withInput();
        }
    }

    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /teacher/{id}/edit
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        try {
            $model = Teacher::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            FlashMessages::add('error', trans('messages.record_not_found'));

            return Redirect::route('admin.teacher.index');
        }

        $this->data('page_title', '"'.$model->name.'"');

        $this->breadcrumbs(trans('labels.teacher_editing'));

        $this->_fillAdditionTemplateData($model);

        return $this->render('views.teacher.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /teacher/{id}
     *
     * @param  int              $id
     * @param TeacherUpdateRequest $request
     *
     * @return \Response
     */
    public function update($id, TeacherRequest $request)
    {
        try {
            $model = Teacher::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            FlashMessages::add('error', trans('messages.record_not_found'));

            return Redirect::route('admin.teacher.index');
        }

        $input = $request->all();

        DB::beginTransaction();

        try {
            $model->fill($input);

            $model->update();

            DB::commit();

            FlashMessages::add('success', trans('messages.save_ok'));

            return Redirect::route('admin.teacher.index');
        } catch (Exception $e) {
            DB::rollBack();

            FlashMessages::add("error", trans('messages.update_error').': '.$e->getMessage());

            return Redirect::back()->withInput($input);
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /teacher/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $model = Teacher::findOrFail($id);

            if (!$model->delete()) {
                FlashMessages::add("error", trans("messages.destroy_error"));
            } else {
                FlashMessages::add('success', trans("messages.destroy_ok"));
            }
        } catch (ModelNotFoundException $e) {
            FlashMessages::add('error', trans('messages.record_not_found'));
        }

        return Redirect::route('admin.teacher.index');
    }

    /**
     * set to template addition variables for add\update teacher
     *
     * @param \App\Models\Teacher|null $model
     */
    private function _fillAdditionTemplateData($model = null)
    {
        return true;
    }
}
