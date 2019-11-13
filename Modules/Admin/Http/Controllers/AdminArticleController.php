<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);
        $request->name = strtolower($request->name);
        $chuoikhongdau = $this->hamlocdau($request->name);


            if($request->name) $articles->where('a_name','like','%'. $request->name.'%');
            $articles = $articles->paginate(10);
        $viewData = [
            'articles' => $articles
        ];
        return view('admin::article.index', $viewData);
    }
    public function hamlocdau($st){
        $codau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
            "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
        ,"ế","ệ","ể","ễ",
            "ì","í","ị","ỉ","ĩ",
            "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
        ,"ờ","ớ","ợ","ở","ỡ",
            "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
            "ỳ","ý","ỵ","ỷ","ỹ",
            "đ",
            "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
        ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
            "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
            "Ì","Í","Ị","Ỉ","Ĩ",
            "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
        ,"Ờ","Ớ","Ợ","Ở","Ỡ",
            "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
            "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
            "Đ"," ");

        $khongdau=array("a","a","a","a","a","a","a","a","a","a","a"
        ,"a","a","a","a","a","a",
            "e","e","e","e","e","e","e","e","e","e","e",
            "i","i","i","i","i",
            "o","o","o","o","o","o","o","o","o","o","o","o"
        ,"o","o","o","o","o",
            "u","u","u","u","u","u","u","u","u","u","u",
            "y","y","y","y","y",
            "d",
            "A","A","A","A","A","A","A","A","A","A","A","A"
        ,"A","A","A","A","A",
            "E","E","E","E","E","E","E","E","E","E","E",
            "I","I","I","I","I",
            "O","O","O","O","O","O","O","O","O","O","O","O"
        ,"O","O","O","O","O",
            "U","U","U","U","U","U","U","U","U","U","U",
            "Y","Y","Y","Y","Y",
            "D"," ");
        return str_replace($codau,$khongdau,$st);
    }

    public function create()
    {
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.create',compact('article'));
    }

    public function update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle,$id);
        return redirect()->back();
    }

    public function insertOrUpdate(RequestArticle $requestArticle, $id = '')
    {
        $article = new Article();
        if ($id) {
            $article = Article::find($id);
        }
        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = $requestArticle->a_description;
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description;
        if ($requestArticle->hasFile('avatar')){
            $file = upload_image('avatar');
            if(isset($file['name'])){
                $article->a_avatar = $file['name'];
            }

        }
        $article->save();
    }
    public function action($action,$id){
        if($action){
            $article = Article::find($id);
            switch ($action){
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active =  $article->a_active ? 0 : 1;
                    $article->save();
                    break;
            }
        }
    return redirect()->back();
    }
}
