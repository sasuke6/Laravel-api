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
        $this->middleware('auth.basic', ['only' => ['store', 'update']]);
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

    public function store(Request $request)
    {
        if (! $request->get('title') or ! $request->get('body')) {
            return $this->setStatusCode(422)->responseError('validate fails');
        }

        Lesson::create($request->all());
        return $this->setStatusCode(201)->response(
            [
                'status' => 'success',
                'message' => 'lesson created'
            ]
        );


    }




}
