<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('verified')->only('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $products = Product::all()->take(6);//paginate(6);
        return view('home', compact('products'));
    }

    public function welcome(){
        $products = Product::all()->take(6);//paginate(6);
        return view('home', compact('products'));
    }
}
