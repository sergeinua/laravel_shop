<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public static function getCategoryList()
    {
        $result = [];
        $model = Category::all();

        if (! empty($model)) {
            foreach ($model as $item) {
                $result[$item->id] = self::getCatPath($item->id) . ' >>> ' . $item->name;
            }
        }

        return $result;
    }

    static function getCategoryName($category_id)
    {
        if ($category_id == 0 ) {
            $result = '---';
        } else {
            $model = Category::findOrFail($category_id);
            $result = $model->name;
        }

        return $result;
    }

    public function getStatus($status_id)
    {
        if ($status_id == 0) {
            $result = 'Неактивно';
        } else {
            $result = 'Активно';
        }

        return $result;
    }

    static function getCatPath($cat_id)
    {
        $model = Category::findOrFail($cat_id);
        $path = [];

        if ($model->parent_id > 0) {
            $path = self::getParentCatPath($model->parent_id, $path);
        }
        $path = array_reverse($path);
        $path = implode(' > ', $path);

        return $path;
    }

    static function getParentCatPath($cat_id, $path)
    {
        $model = Category::findOrFail($cat_id);
        $path[] = $model->name;

        if ($model->parent_id > 0) {
            $path = self::getParentCatPath($model->parent_id, $path);
        }

        return $path;
    }
}
