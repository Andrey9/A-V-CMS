<?php

namespace App\Http\Controllers\Backend;

use App\Models\Dashboard;
use App\Models\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends BackendController
{
    public function index(){

        $model = Dashboard::with('translations')->find(1);

        $this->data('page_title', trans('labels.home'));

        $menus = Menu::with('translations')->get();

        $list = [];

        foreach ($menus as $menu){
            $list[$menu->id] = $menu->name;
        }

        return $this->render('views.dashboard.index')->with(['model' => $model, 'menus' => $list]);
    }

    public function update(Request $request){
        $input = $request->all();

        $model = Dashboard::findOrFail(1);

        $model->{$input['attr']} = $input['value'];

        $model->update();

        return 'done';
    }

    public function updateFooter(Request $request){
        $input = $request->all();
        $data = json_decode($input['footers']);
        foreach ($data as $item){
            \DB::statement('UPDATE `dashboard_translations` SET `footer`="'.htmlentities($item->footer).'" WHERE `locale` ="'.$item->locale.'" AND `dashboard_id` = 1');
        }
        return 'done';
    }
}
