<?php
namespace App;

class Cart
{
    public $items = null;
    public $total_quan = 0;
    public $total_price = 0;
    //out of stock positions
    public $items_out = null;
    public $total_quan_out = 0;
    public $total_price_out = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->total_quan = $oldCart->total_quan;
            $this->total_price = $oldCart->total_price;
            //out of stock items
            $this->items_out = $oldCart->items_out;
            $this->total_quan_out = $oldCart->total_quan_out;
            $this->total_price_out = $oldCart->total_price_out;
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
        if (ProductBalance::inStock($product->id, $option_id)) {
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
        } else {
            //out of stock
            // the cart has got items
            if ($this->items_out) {
                // the cart has already got the item is being added
                if (array_key_exists($id, $this->items_out)) {
                    // it has also got the same options, just increasing the quantity
                    if (array_key_exists($option_id, $this->items_out[$id]['option_id'])) {
                        $this->items_out[$id]['option_id'][$option_id] += $quantity;
                    } else {
                        // just adding option and increasing quantity
                        $this->items_out[$id]['option_id'][$option_id] = $quantity;
                    }
                } else {
                    // adding new item
                    $this->items_out[$id] = $stored_item;
                }
            } else {
                // cart was empty
                $this->items_out[$id] = $stored_item;
            }
            $this->total_quan_out += $quantity;
            $this->total_price_out += $item->price * $quantity;
        }
    }

    /**
     * Increases quantity by 1 for the defined product and option
     *
     * @param $product_id
     * @param $option_id
     */
    public function increase($product_id, $option_id)
    {
        //in stock items
        if (isset($this->items[$product_id]['option_id'][$option_id])) {
            ++$this->items[$product_id]['option_id'][$option_id];
            $this->total_price += $this->items[$product_id]['price'];
            ++$this->total_quan;
        } else {
            //out of stock items
            ++$this->items_out[$product_id]['option_id'][$option_id];
            $this->total_price_out += $this->items_out[$product_id]['price'];
            ++$this->total_quan_out;
        }
    }

    /**
     * Decreases quantity by 1 for the defined product and option
     *
     * @param $product_id
     * @param $option_id
     */
    public function decrease($product_id, $option_id)
    {
        //in stock items
        if (isset($this->items[$product_id]['option_id'][$option_id])) {
            if ($this->items[$product_id]['option_id'][$option_id] > 0) {
                --$this->items[$product_id]['option_id'][$option_id];
                $this->total_price -= $this->items[$product_id]['price'];
                --$this->total_quan;
            }
        } else {
            //out of stock items
            if ($this->items_out[$product_id]['option_id'][$option_id] > 0) {
                --$this->items_out[$product_id]['option_id'][$option_id];
                $this->total_price_out -= $this->items_out[$product_id]['price'];
                --$this->total_quan_out;
            }
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
        //in stock items
        if (isset($this->items[$product_id]['option_id'][$option_id])) {
            if ($this->items[$product_id]['option_id'][$option_id] == 0) {
                unset($this->items[$product_id]['option_id'][$option_id]);
            }
        } else {
            //out of stock items
            if ($this->items_out[$product_id]['option_id'][$option_id] == 0) {
                unset($this->items_out[$product_id]['option_id'][$option_id]);
            }
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
        //in stock items
        if (isset($this->items[$product_id]['option_id'])) {
            if (empty($this->items[$product_id]['option_id'])) {
                unset($this->items[$product_id]);
            }
        } else {
            //out of stock items
            if (empty($this->items_out[$product_id]['option_id'])) {
                unset($this->items_out[$product_id]);
            }
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
        //in stock items
        if (isset($this->items[$product_id]['option_id'][$option_id])) {
            $this->total_price -= $this->items[$product_id]['price'] * $this->items[$product_id]['option_id'][$option_id];
            $this->total_quan -= $this->items[$product_id]['option_id'][$option_id];
            unset($this->items[$product_id]['option_id'][$option_id]);
        } else {
            //out of stock items
            $this->total_price_out -= $this->items_out[$product_id]['price'] * $this->items_out[$product_id]['option_id'][$option_id];
            $this->total_quan_out -= $this->items_out[$product_id]['option_id'][$option_id];
            unset($this->items_out[$product_id]['option_id'][$option_id]);
        }
        $this->clearEmptyItems($product_id);
    }
}