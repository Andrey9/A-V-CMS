<?php
/**
 * Created by PhpStorm.
 * User: ddiimmkkaass
 * Date: 24.03.16
 * Time: 23:11
 */

namespace App\Widgets\LastNews;

use App\Models\News;
use Pingpong\Widget\Widget;

/**
 * Class LastNewsWidget
 * @package App\Widgets\LastNews
 */
class LastNewsWidget extends Widget
{

    /**
     * @var string
     */
    protected $view = 'default';

    /**
     * @param null $template
     * @param int  $count
     *
     * @return mixed
     */
    public function index($type = null, $view, $count = 5)
    {
        $list = News::withTranslations()->visible()->publishAtSorted()->positionSorted()->take($count)->get();

        return view('widgets.last_news.'.$view)->with(['list' => $list, 'type' => $type])->render();
    }
}