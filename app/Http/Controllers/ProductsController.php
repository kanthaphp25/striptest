<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getfiles(){
		$files = Products::paginate(10);
		//echo "<pre>";print_r($files);exit;
		return view('products',['products'=>$files]);
  }   
  public function strip_checkout(){
		$files = Products::paginate(10);
		//echo "<pre>";print_r($files);exit;
		return view('products',['products'=>$files]);
  }
}
