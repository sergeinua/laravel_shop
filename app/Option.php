<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'option';

    public static function getOptions()
    {
        $model = Option::all();
        $result = [];
        foreach ($model as $item) {
            $result[$item->id] = $item->description;
        }

        return $result;
    }
}
