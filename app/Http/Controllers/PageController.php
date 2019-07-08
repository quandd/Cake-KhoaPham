<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;


class PageController extends Controller
{
    //
    public function index()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(4, ['*'], 'pag');
        $promotion_product = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('page.trangchu', compact('slide', 'new_product', 'promotion_product'));
    }

    public function getCategory($type)
    {
        $product_type = Product::where('id_type', $type)->get();
        $product_other = Product::where('id_type', '<>', $type)->paginate(3);
        $types = ProductType::all();
        $categories = ProductType::where('id', $type)->first();
        return view('page.loai_sanpham', compact('product_type', 'product_other', 'types', 'categories'));
    }

    public function getProduct(Request $req)
    {
        $products = Product::where('id', $req->id)->first();
        $products_same = Product::where('id_type', $products->id_type)->paginate(6);
        return view('page.chitiet_sanpham', compact('products', 'products_same'));
    }

    public function getContact()
    {
        return view('page.lienhe');
    }

    public function getIntro()
    {
        return view('page.gioithieu');
    }
}
