<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application Index.
     *
     * @return data
     */
    public function index()
    {
        $results = Product::where('status',1)->orderBy('id', 'DESC')->paginate(8);
        return view('index',compact('results'));
    }
    public function getAllProduct()
    {
        $results = Product::where('status',1)->orderBy('id', 'DESC')->get();
        return view('shop',compact('results'));
    }
}
