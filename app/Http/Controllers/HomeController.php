<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Product;
class HomeController extends FrontendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(5)->get();
        $articleNews = Article::orderBy('id','DESC')->limit(6)->get();
        $categoriesHome = Category::with('products')
            ->where('c_home',Category::HOME)
            ->limit(3)
            ->get();

        $viewData = [
            'productHot' => $productHot,
            'articleNews' => $articleNews,
            'categoriesHome'   =>$categoriesHome
        ];
        return view('home.index',$viewData);
    }
    public  function renderProductView(Request $request){
        if($request->ajax()){
            $listID = $request->id;
            $productView = Product::whereIn('id',$listID)->orderBy('id','DESC')->take(4)->get();
            $html = view('components.product_view',compact('productView'))->render();
            return response()->json(['data'=>$html]);

        }
    }

}
