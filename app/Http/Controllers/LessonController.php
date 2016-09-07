<?php

namespace App\Http\Controllers;

use App\Lesson;

use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;


class LessonController extends Controller
{
    //


    protected $lessonTransformer;

    /**
     * LessonController constructor.
     * @param $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }


    public function index()
    {
        //没有提示信息
        //直接返回数据结构
        //没有错误信息

        $lessons = Lesson::all();
        return \Response::json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
        ]); //bad
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return \Response::json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }




}
