<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products(Request $request, Products $products)
    {
        $p = $products->search($request->search)->query(function ($query){
            $query->with(['productAttributes', 'productAttributes.attribute', 'productCategories.category', 'user']);
        })->where('user_id', $request->user_id)->orderBy('created_at', 'DESC')->paginate(10);
        echo "<pre>";
        print_r($p);
        echo "</pre>";
    }
}
