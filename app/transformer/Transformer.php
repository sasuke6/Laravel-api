<?php
/**
 * Created by PhpStorm.
 * User: Hsu
 * Date: 9/7/16
 * Time: 07:43
 */

namespace App\Transformer;


abstract class Transformer
{
    public function transformCollection($item)
    {
        return array_map([$this, 'transform'], $item);
    }

    public abstract function transform($item);

}