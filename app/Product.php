<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    /**
     * Get product url by product_id
     *
     * @param $product_id
     * @return string
     */
    public static function getUrl($product_id)
    {
        $product_slug = Product::find($product_id)->slug;
        $category_id = ProductCategory::where('product_id', $product_id)
            ->first()
            ->category_id;
        $category_slug = Category::find($category_id)->slug;
        $url = route('site_product', ['category' => $category_slug, 'slug' => $product_slug]);

        return $url;
    }

    /**
     * Returns name of the defined product
     *
     * @param $id
     * @return mixed
     */
    public static function getName($id)
    {
        return Product::find($id)->name;
    }

    /**
     * Returns price of the defined product
     *
     * @param $id
     * @return mixed
     */
    public static function getPrice($id)
    {
        return Product::find($id)->price;
    }
}
