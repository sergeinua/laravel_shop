<?php
namespace App\Http\Controllers;

use App\Order;
use App\ProductBalance;
use App\ProductOption;
use Illuminate\Http\Request;
use Psy\Util\Json;
use App\Option;

class RequestController extends Controller
{
    /**
     * Adds option for the product via post request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postOption(Request $request)
    {
        $exists = ProductOption::where([
            'product_id' => $request->input('product_id'),
            'option_id' => $request->input('option_id')
        ])->exists();
        if ($exists) {
            return response()->json(true, 201);
        }
        $model = new ProductOption();
        $model->product_id = $request->input('product_id');
        $model->option_id = $request->input('option_id');
        if ($model->save())
            return response()->json(true, 201);

        return response()->json(false, 200);
    }

    /**
     * Returns all options for the defined product
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOptions($product_id)
    {
        $model = ProductOption::where('product_id', $product_id)->get();

        return response()->json($model, 200);
    }

    /**
     * Deletes option for the product
     *
     * @param $item_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOption($item_id)
    {
        ProductOption::destroy($item_id);

        return response()->json(200);
    }

    /**
     * Updates order status
     *
     * @param $order_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrderStatus($order_id, Request $request)
    {
        $model = Order::find($order_id);
        $status = $request->input('status');
        $model->status = $status;
        $model->save();

        return response()->json(200);
    }

    /**
     * Updates stock quantity for the defined item
     *
     * @param $product_id
     * @param $option_id
     * @param $stock
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStock(Request $request)
    {
        $product_option_id = $request->input('product_option_id');
        $stock = $request->input('stock');
        $model = ProductBalance::where('product_option_id', $product_option_id)
            ->first();
        $model->stock = $stock;
        $model->save();

        return response()->json(200);
    }

    /**
     * Returns stock quantity for the defined product with option
     *
     * @param $product_option_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStock($product_option_id, Request $request)
    {
        $model = ProductBalance::where('product_option_id', $product_option_id)
            ->first();

        return response()->json($model->stock);
    }
}