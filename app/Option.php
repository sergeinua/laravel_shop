<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'option';

    /**
     * Returns array of all available options
     *
     * @return array
     */
    public static function getOptions()
    {
        $model = Option::all();
        $result = [];
        foreach ($model as $item) {
            $result[$item->id] = $item->description;
        }

        return $result;
    }

    /**
     * Returns img url for the defined option_id
     *
     * @param $id
     * @return mixed
     */
    public static function getImg($id)
    {
        return Option::find($id)->img;
    }

    /**
     * Returns code for the defined option_id
     *
     * @param $id
     * @return mixed
     */
    public static function getCode($id)
    {
        return Option::find($id)->code;
    }

    /**
     * Returns description for the defined option_id
     *
     * @param $id
     * @return mixed
     */
    public static function getDescription($id)
    {
        return Option::find($id)->description;
    }
}
