<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;

class LessonController extends Controller
{
    //

    public function index()
    {
        //没有提示信息
        //直接返回数据结构
        //没有错误信息
        return Lesson::all(); //bad
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return $lesson;
    }




}
