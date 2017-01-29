<?php
namespace App;

class Cart
{
    public $items = null;
    public $total_quan = 0;
    public $total_price = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->total_quan = $oldCart->total_quan;
            $this->total_price = $oldCart->total_price;
        }
    }

    public function add($item, $id, $option_id, $quantity = 1)
    {
        $product = Product::find($id);
        $stored_item = [
            'price' => $product->price,
            'item' => $product,
            'option_id' => [$option_id => $quantity]
        ];
        // the cart has got items
        if ($this->items) {
            // the cart has already got the item is being added
            if (array_key_exists($id, $this->items)) {
                // it has also got the same options, just increasing the quantity
                if (array_key_exists($option_id, $this->items[$id]['option_id'])) {
                    $this->items[$id]['option_id'][$option_id] += $quantity;
                } else {
                    // just adding option and increasing quantity
                    $this->items[$id]['option_id'][$option_id] = $quantity;
                }
            } else {
                // adding new item
                $this->items[$id] = $stored_item;
            }
        } else {
            // cart was empty
            $this->items[$id] = $stored_item;
        }

        $this->total_quan += $quantity;
        $this->total_price += $item->price * $quantity;
    }
}