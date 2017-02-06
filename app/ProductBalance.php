<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBalance extends Model
{
    protected $table = 'product_balance';

    /**
     * Defines if the option for the product is in stock
     *
     * @param $product_id
     * @param $option_id
     * @return bool
     */
    public static function inStock($product_id, $option_id)
    {
        $product_option_id = ProductOption::where('product_id', $product_id)
            ->where('option_id', $option_id)
            ->first()
            ->id;
        $stock = ProductBalance::where('product_option_id', $product_option_id)
            ->first()
            ->stock;

        if ($stock > 0) {
            return true;
        }

        return false;
    }

    /**
     * Returns product option stock quantity
     *
     * @param $product_id
     * @param $option_id
     * @return mixed
     */
    public static function getStock($product_id, $option_id)
    {
        $product_option_id = ProductOption::where('product_id', $product_id)
            ->where('option_id', $option_id)
            ->first()
            ->id;
        $stock = ProductBalance::where('product_option_id', $product_option_id)
            ->first()
            ->stock;

        return $stock;
    }
}
