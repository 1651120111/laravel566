<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;



class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if ($request->name) $products->where('pro_name','like','%'.$request->name.'%');
        if ($request->cate) $products->where('pro_category_id',$request->cate);
        $products = $products->orderByDesc('id')->paginate(10);
        $categories = $this->getCategory();
        $viewData   = [
            'products' => $products,
            'categories' => $categories

        ];
        return view('admin::product.index',$viewData);
    }

    public  function create(){
        $categories = $this->getCategory();
        return view('admin::product.create',compact('categories'));
    }
    public  function store(RequestProduct $requestProduct){
        $this->insertOrUpdate($requestProduct);
        return redirect()->back()->with('success','Đã lưu thành công');
    }
    public function  getCategory(){
        return Category::all();
    }
    public  function  insertOrUpdate($RequestProduct,$id = '' ){
        $product = new Product();
        if($id) $product= Product::find($id);

        $product->pro_name          = $RequestProduct->pro_name;
        $product->pro_slug          = str_slug($RequestProduct->pro_name);
        $product->pro_price         = $RequestProduct->pro_price;
        $product->pro_sale          = $RequestProduct->pro_sale;
        $product->pro_number        = $RequestProduct->pro_number;
        $product->pro_description   = $RequestProduct->pro_description;
        $product->pro_content       = $RequestProduct->pro_content;

        $product->pro_category_id   = $RequestProduct->pro_category_id;
        $product->pro_title_seo     = $RequestProduct->pro_title_seo ? $RequestProduct->pro_title_seo : $RequestProduct->pro_name;
        $product->pro_description_seo = $RequestProduct->pro_description_seo ? $RequestProduct->pro_description_seo : $RequestProduct->pro_name;
        $product->pro_name          = $RequestProduct->pro_name;


        if ($RequestProduct->hasFile('avatar')){
            $file = upload_image('avatar');
            if(isset($file['name'])){
                $product->pro_avatar = $file['name'];
            }

        }

        $product->save();

    }
    public function edit($id){
        $product = Product::find($id);
        $categories = $this->getCategory();
        return view('admin::product.update',compact('product','categories'));
    }
    public function update(RequestProduct $requestProduct,$id){
        $this->insertOrUpdate($requestProduct,$id);
        return redirect()->back()->with('success','Đã cập nhật thành công');
    }

    public function action(Request $request,$action,$id){
        if($action){
            $product = Product::find($id);
            switch ($action){
                case 'delete':
                    $product->delete();
                    break;

                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    break;

                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    break;
            }
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
}
