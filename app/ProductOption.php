<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table = 'product_option';

    public static function getProductOptions($product_id)
    {
        $models = ProductOption::where('product_id', $product_id)->get();
        $result = [];
        foreach ($models as $item) {
            $option = Option::find($item->option_id);
            $result[$item->id] = [
                'description' => $option->description,
                'img' => $option->img
            ];
        }

        return $result;
    }
}
