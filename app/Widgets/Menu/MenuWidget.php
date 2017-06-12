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
    public function index($position)
    {

        $menu = Menu::with(['translations', 'visible_items', 'visible_items.translations'])
            ->where('layout_position', $position)
            ->visible()
            ->first();

        return view('widgets.menu.index')->with(compact('menu'))->render();

    }
}