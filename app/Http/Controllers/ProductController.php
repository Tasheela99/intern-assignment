<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function addProducts(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->has('id')) {
            $product = ProductsModel::find($request->input('id'));
        } else {
            $product = new ProductsModel();
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product_image', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product saved successfully');

    }

    public function update($productID)
    {
        $productModal =  ProductsModel::where(["id"=>$productID])->first();
        return view('update', compact('productModal'));
    }


    public function delete_product($id)
    {
        $data = ProductsModel::find($id);
        $data->delete();
        return redirect()->back();
    }
}
