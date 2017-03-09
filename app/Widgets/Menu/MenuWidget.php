<?php
/**
 * Created by Newway, info@newway.com.ua
 * User: ddiimmkkaass, ddiimmkkaass@gmail.com
 * Date: 10.06.15
 * Time: 15:05
 */

namespace App\Widgets\Menu;

use App\Models\Menu;
use Pingpong\Widget\Widget;

/**
 * Class MenuWidget
 * @package App\Widgets\Menu
 */
class MenuWidget extends Widget
{

    /**
     * @var string
     */
    private $_view = 'default';

    /**
     * @param string $position
     *
     * @return $this
     */
    public function index($menu_id, $template)
    {

        $menu = Menu::with(['translations', 'visible_items', 'visible_items.translations'])
            ->visible()
            ->findOrFail($menu_id);

//        if (count($list)) {
//            foreach ($list as $model) {
//                if (view()->exists('widgets.menu.templates.'.$model->template.'.index')) {
//                    $this->_view = $model->template;
//                }
//
//                $menus[] = view('widgets.menu.templates.'.$this->_view.'.index')
//                    ->with(['model' => $model, 'template' => $this->_view])
//                    ->render();
//            }

            return view('views.menu.template-'.$template)->with(compact('menu'))->render();

    }
}