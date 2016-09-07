<?php
/**
 * Created by PhpStorm.
 * User: Hsu
 * Date: 9/7/16
 * Time: 07:46
 */

namespace App\Transformer;


class LessonTransformer extends Transformer
{

    public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'content' => $lesson['body'],
            'is_free' => (boolean)$lesson['free']
        ];
    }


}