<?php
namespace App\Http\Controllers;

use App\ProductOption;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function postOption(Request $request)
    {
        $exists = ProductOption::where([
            'product_id' => $request->input('product_id'),
            'option_id' => $request->input('option_id')
        ])->exists();
        if($exists) {
            return response()->json(true, 201);
        }
        $model = new ProductOption();
        $model->product_id = $request->input('product_id');
        $model->option_id = $request->input('option_id');
        if ($model->save())
            return response()->json(true, 201);

        return response()->json(false, 200);
    }

    public function getOptions($product_id)
    {
        $model = ProductOption::where('product_id', $product_id)->get();

        return response()->json($model, 200);
    }

    public function deleteOption($item_id)
    {
        ProductOption::destroy($item_id);

        return response()->json(200);
    }
}