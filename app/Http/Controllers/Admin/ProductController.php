<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function getProduct(){
    	return view('admin.product');
    }

    public function getEditProduct(){
    	return view('admin.editproduct');
    }
}
