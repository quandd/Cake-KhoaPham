<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    //
    public function getProduct(){
    	$products =  Product::paginate(10);
    	return view('admin.product',compact('products'));
    }

    public function getEditProduct($id){
    	$products = Product::find($id);
        $catelist = ProductType::all();
        return view('admin.editproduct',compact('products','catelist'));
    }

    public function getAddProduct(){
        $data['catelist'] = ProductType::all();
    	return view('admin.addproduct',$data);
    }
    ////////////////////////////////////
    public function postEditProduct(EditProductRequest $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->unit_price = $request->u_price;
        $product->promotion_price = $request->p_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->cate;

        if($request->img)
        {
        $fileName = $request->img->getClientOriginalName();
        $file = $request->file('img');
        $move = $file->move('layout/backend/image/product',$fileName);
        $product->image = $fileName;
        }
        $product->save();
        return redirect()->intended('admin/product')->with('notification','Sua thanh cong.');      
    }
    ///////////////////////////////////

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

    public function getDeleteProduct($id){
        Product::destroy($id);
        return back()->with('notification','Xoa thanh cong.');
    }

}
