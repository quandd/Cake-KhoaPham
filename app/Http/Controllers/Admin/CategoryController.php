<?php

namespace App\Http\Controllers\Admin;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function getCate(){
    	$cates =  ProductType::all();
    	return view('admin.category', compact('cates'));
    }

    public function getEditCate(){
    	return view('admin.editcategory');
    }
}
