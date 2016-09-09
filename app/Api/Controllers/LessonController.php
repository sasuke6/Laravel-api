<?php
/**
 * Created by PhpStorm.
 * User: Hsu
 * Date: 9/9/16
 * Time: 23:42
 */

namespace App\Api\Controllers;


use App\Api\Transformers\LessonTransformer;
use App\Lesson;


class LessonController extends BaseController
{
    public function index()
    {
        $lesson = Lesson::all();
        return $this->collection($lesson , new LessonTransformer());
    }
}