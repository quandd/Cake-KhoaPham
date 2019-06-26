<?php

namespace App\Http\Controllers\Admin;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;

class CategoryController extends Controller
{
    //
    public function getCate(){
    	$cates =  ProductType::paginate(5);
    	return view('admin.category', compact('cates'));
    }

    public function postCate(AddCateRequest $request){
    	$category =  new ProductType;
    	$category->name = $request->name;
    	$fileName = $request->img->getClientOriginalName();
    	$category->description = $request->desc;
    	$file = $request->file('img');
    	$move = $file->move('layout/backend/image/product',$fileName);
    	$category->image = $fileName;
    	$category->save();
    	return back()->with('notification','Them thanh cong.');
    }

    public function getEditCate($id){
    	$cates = ProductType::find($id);
    	return view('admin.editcategory',compact('cates'));
    }

    public function postEditCate(EditCateRequest $request,$id){
    	$category =  ProductType::find($id);
    	$category->name = $request->name;
    	$category->description = $request->desc;
    	// $file = $request->file('img');
    	// $file->move('layout/backend/image/product');
    	// $category->image = $request->img;
    	$category->save();
    	return redirect()->intended('admin/category')->with('notification','Sua thanh cong.');  	
    }

    public function getDeleteCate($id){
    	ProductType::destroy($id);
    	return back()->with('notification','Xoa thanh cong.');
    }

    
}
