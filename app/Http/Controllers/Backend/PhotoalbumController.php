<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Photoalbum\PhotoalbumRequest;
use App\Models\Photoalbum;
use App\Models\PhotoalbumItem;
use App\Traits\Controllers\AjaxFieldsChangerTrait;
use Datatables;
use DB;
use Exception;
use FlashMessages;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Meta;
use Redirect;
use Response;

class PhotoalbumController extends BackendController
{
    use AjaxFieldsChangerTrait;

    /**
     * @var string
     */
    public $module = "photoalbum";

    /**
     * @var array
     */
    public $accessMap = [
        'index'           => 'photoalbum.read',
        'create'          => 'photoalbum.create',
        'store'           => 'photoalbum.create',
        'show'            => 'photoalbum.read',
        'edit'            => 'photoalbum.read',
        'update'          => 'photoalbum.write',
        'destroy'         => 'photoalbum.delete',
        'ajaxFieldChange' => 'photoalbum.write',
    ];

    public function __construct(ResponseFactory $response)
    {
        parent::__construct($response);

        Meta::title(trans('labels.photoalbums'));

        $this->breadcrumbs(trans('labels.photoalbums'), route('admin.photoalbum.index'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('draw')) {
            $list = Photoalbum::withTranslations()->joinTranslations('photoalbums')->select(
                'photoalbums.id',
                'photoalbum_translations.title',
                'status',
                'position'
            );

            return $dataTables = Datatables::of($list)
                ->filterColumn('id', 'where', 'photoalbums.id', '=', '$1')
                ->filterColumn('photoalbum_translations.title', 'where', 'photoalbum_translations.title', 'LIKE', '%$1%')
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
                ->removeColumn('short_content')
                ->removeColumn('content')
                ->removeColumn('meta_keywords')
                ->removeColumn('meta_title')
                ->removeColumn('meta_description')
                ->removeColumn('parent')
                ->removeColumn('translations')
                ->make();
        }

        $this->data('page_title', trans('labels.photoalbums'));
        $this->breadcrumbs(trans('labels.photoalbums_list'));

        return $this->render('views.photoalbum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('model', new Photoalbum());

        $this->data('page_title', trans('labels.photoalbum_create'));

        $this->breadcrumbs(trans('labels.photoalbum_create'));

        return $this->render('photoalbum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoalbumRequest $request)
    {
        DB::beginTransaction();

        try {
            $input = $request->all();

            $model = new Photoalbum($input);
            $model->save();

            $this->_processItems($model);

            DB::commit();

            FlashMessages::add('success', trans('messages.save_ok'));

            return Redirect::route('admin.photoalbum.index');
        } catch (Exception $e) {
            DB::rollBack();

            FlashMessages::add('error', trans('messages.save_failed'));

            return Redirect::back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $model = Photoalbum::with('items')->findOrFail($id);

            $this->data('page_title', trans('labels.photoalbum').' "'.$model->name.'"');

            $this->breadcrumbs(trans('labels.photoalbum_editing'));

            return $this->render('views.photoalbum.edit', compact('model'));
        } catch (ModelNotFoundException $e) {
            FlashMessages::add('error', trans('messages.record_not_found'));

            return Redirect::route('admin.photoalbum.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoalbumRequest $request, $id)
    {
        try {
            /*dd($request->all());*/
            $model = Photoalbum::findOrFail($id);

            DB::beginTransaction();

            $model->fill($request->all());
            $model->save();

            $this->_processItems($model);

            DB::commit();

            FlashMessages::add('success', trans('messages.save_ok'));

            return Redirect::route('admin.photoalbum.index');
        } catch (ModelNotFoundException $e) {
            FlashMessages::add('error', trans('messages.record_not_found'));

            return Redirect::route('admin.photoalbum.index');
        } catch (Exception $e) {
            DB::rollBack();

            FlashMessages::add("error", trans('messages.update_error').': '.$e->getMessage());

            return Redirect::back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $model = Photoalbum::findOrFail($id);

            $model->delete();

            FlashMessages::add('success', trans("messages.destroy_ok"));
        } catch (ModelNotFoundException $e) {
            FlashMessages::add('error', trans('messages.record_not_found'));
        } catch (Exception $e) {
            FlashMessages::add("error", trans('messages.delete_error').': '.$e->getMessage());
        }

        return Redirect::route('admin.photoalbum.index');
    }

    private function _processItems(Photoalbum $model)
    {
        $data = request('items.remove', []);
        foreach ($data as $id) {
            try {
                $item = $model->items()->findOrFail($id);
                $item->delete();
            } catch (Exception $e) {
                FlashMessages::add("error", trans("messages.item destroy failure"." ".$id.". ".$e->getMessage()));
                continue;
            }
        }

        $data = request('items.old', []);
        foreach ($data as $key => $item) {
            try {
                $_item = PhotoalbumItem::findOrFail($key);
                $_item->update($item);
            } catch (Exception $e) {
                FlashMessages::add(
                    "error",
                    trans("messages.item update failure"." ".$item['name'].". ".$e->getMessage())
                );
                continue;
            }
        }

        $data = request('items.new', []);
        foreach ($data as $item) {
            try {
                $item = new PhotoalbumItem($item);
                $model->items()->save($item);
            } catch (Exception $e) {
                FlashMessages::add(
                    "error",
                    trans("messages.item save failure"." ".$item['name'].". ".$e->getMessage())
                );
                continue;
            }
        }
    }
}
