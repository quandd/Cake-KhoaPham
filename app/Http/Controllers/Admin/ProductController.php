<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{
    //
    public function getProduct(){
    	$products =  Product::paginate(10);
    	return view('admin.product',compact('products'));
    }

    public function getEditProduct(){
    	return view('admin.editproduct');
    }

    public function getAddProduct(){
        $data['catelist'] = ProductType::all();
    	return view('admin.addproduct',$data);
    }

    public function postAddProduct(AddProductRequest $request){
        $product =  new Product;
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->unit_price = $request->u_price;
        $product->promotion_price = $request->p_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->cate;


        $fileName = $request->img->getClientOriginalName();
        $file = $request->file('img');
        $move = $file->move('layout/backend/image/product',$fileName);
        $product->image = $fileName;

        $product->save();

        return back()->with('notification','Them thanh cong.');
    }

}
