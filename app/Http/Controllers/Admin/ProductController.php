<?php

namespace App\Http\Controllers\Admin;
use App\Product;
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
    	return view('admin.addproduct');
    }

    public function postAddProduct(AddProductRequest $request){
    	return view('admin.addproduct');
    }

}
