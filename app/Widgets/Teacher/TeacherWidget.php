<?php
/**
 * Created by Newway, info@newway.com.ua
 * User: ddiimmkkaass, ddiimmkkaass@gmail.com
 * Date: 29.08.15
 * Time: 15:53
 */

namespace App\Widgets\Teacher;

use App\Models\Teacher;
use Pingpong\Widget\Widget;
use Illuminate\Support\Facades\View;
use App\Models\TextWidget;

/**
 * Class TextWidgetWidget
 * @package App\Widgets\TextWidget
 */
class TeacherWidget extends Widget
{
    /**
     * @param string $position
     * @param string $delimiter
     */
    function index($type)
    {
        $teachers = Teacher::with(['translations'])->visible()->positionSorted()->get();

        return View::make('widgets.teacher.index')->with(compact("teachers", "type"));
    }
}
 