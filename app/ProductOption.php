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
            $result[$item->id] = Option::find($item->option_id)->description;
        }

        return $result;
    }
}
