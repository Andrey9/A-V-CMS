<?php
/**
 * Created by Newway, info@newway.com.ua
 * User: ddiimmkkaass, ddiimmkkaass@gmail.com
 * Date: 31.08.15
 * Time: 15:16
 */

namespace App\Widgets\Banner;

use App\Models\Banner;
use Pingpong\Widget\Widget;

/**
 * Class BannerWidget
 * @package App\Widgets\Banner
 */
class BannerWidget extends Widget
{

    /**
     * @var string
     */
    protected $view = 'default';

    /**
     * @param string $position
     *
     * @return $this
     */
    public function index($position)
    {
        $banner = Banner::with(['translations', 'visible_items', 'visible_items.translations'])
            ->where('layout_position', $position)
            ->visible()
            ->first();

        return view('widgets.banner.index')->with('banner', $banner)->render();
    }
}