<?php

namespace App\Http\Controllers;

use App\Lesson;

use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;


class LessonController extends ApiController
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

        $lessons = Lesson::all();
        return $this->response(
            [
                'status' => 'success',
                'status_code' => $this->getStatusCode(),
                'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
            ]
        );
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (! $lesson)
        {
            return $this->setStatusCode(404)->responseNotFound();
        }

        return $this->response(
            [
                'status' => 'success',
                'data' => $this->lessonTransformer->transform($lesson)
            ]
        );
    }




}
