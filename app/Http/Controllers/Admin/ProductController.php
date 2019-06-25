<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ProductController extends Controller
{
    //
    public function getProduct(){
    	$products =  Product::all();
    	return view('admin.product',compact('products'));
    }

    public function getEditProduct(){
    	return view('admin.editproduct');
    }

    public function getAddProduct(){
    	return view('admin.addproduct');
    }

    public function postAddProduct(){
    	return view('admin.addproduct');
    }

}
