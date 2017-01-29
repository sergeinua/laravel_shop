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
    public static function getUtl($product_id)
    {
        $product_slug = Product::find($product_id)->slug;
        $category_id = ProductCategory::where('product_id', $product_id)
            ->first()
            ->category_id;
        $category_slug = Category::find($category_id)->slug;
        $url = route('site_product', ['category' => $category_slug, 'slug' => $product_slug]);

        return $url;
    }
}
