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

    /**
     * Add product to the cart
     *
     * @param $item
     * @param $id
     * @param $option_id
     * @param int $quantity
     */
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

    /**
     * Increases quantity by 1 for the defined product and option
     *
     * @param $product_id
     * @param $option_id
     */
    public function inrease($product_id, $option_id)
    {
        ++$this->items[$product_id]['option_id'][$option_id];
        $this->total_price += $this->items[$product_id]['price'];
        ++$this->total_quan;
    }

    /**
     * Decreases quantity by 1 for the defined product and option
     *
     * @param $product_id
     * @param $option_id
     */
    public function decrease($product_id, $option_id)
    {
        if ($this->items[$product_id]['option_id'][$option_id] > 0) {
            --$this->items[$product_id]['option_id'][$option_id];
            $this->total_price -= $this->items[$product_id]['price'];
            --$this->total_quan;
        }
        $this->checkEmptyOptions($product_id, $option_id);
    }

    /**
     * Deletes items with zero quantity
     *
     * @param $product_id
     * @param $option_id
     */
    public function checkEmptyOptions($product_id, $option_id)
    {
        if ($this->items[$product_id]['option_id'][$option_id] == 0) {
            unset($this->items[$product_id]['option_id'][$option_id]);
        }
        $this->clearEmptyItems($product_id);
    }

    /**
     * Clears empty items
     *
     * @param $product_id
     */
    public function clearEmptyItems($product_id)
    {
        if (empty($this->items[$product_id]['option_id'])) {
            unset($this->items[$product_id]);
        }
    }

    /**
     * Deletes item from the cart
     *
     * @param $product_id
     * @param $option_id
     */
    public function delete($product_id, $option_id)
    {
        $this->total_price -= $this->items[$product_id]['price'] * $this->items[$product_id]['option_id'][$option_id];
        $this->total_quan -= $this->items[$product_id]['option_id'][$option_id];
        unset($this->items[$product_id]['option_id'][$option_id]);
        $this->clearEmptyItems($product_id);
    }
}