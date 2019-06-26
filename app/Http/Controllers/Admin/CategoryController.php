<?php

namespace App\Http\Controllers\Admin;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCateRequest;

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

    public function postCate(AddCateRequest $request){
    	$category =  new ProductType;
    	$category->name = $request->name;
    	$category->description = $request->desc;
    	$file = $request->file('img');
    	$file->move('layout/backend/image/product');
    	$category->image = $request->img;
    	$category->save();
    	return back()->with('notification','Them thanh cong.');
    }
}
