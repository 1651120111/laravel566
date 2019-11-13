<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();

        //doanh thu ngày
        $moneyDay = Transaction::whereDay('updated_at',date('d'))
            ->where('tr_status',Transaction::STATUS_DONE )
            ->sum('tr_total');
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
            ->where('tr_status',Transaction::STATUS_DONE )
            ->sum('tr_total');

        $viewMoney = [
            [
                'name' => 'doanh thu ngày',
                'y'    => (int)$moneyDay
            ],
            [
                'name' => 'doanh thu tháng',
                'y'    => (int)$moneyMonth
            ]
        ];
        //tong số các thành viên
        $totalMember = User::select(DB::raw('count(id) as totalMember'))->get();
        //tổng số sản phẩm
        $totalProduct = Product::select(DB::raw('count(id) as totalProduct'))->get();
        //tong số bài viết
        $totalArticle = Article::select(DB::raw('count(id) as totalArticle'))->get();

        //tồng số đánh giá
        $totalRating = Rating::select(DB::raw('count(id) as totalRating'))->get();

        //danh sách đơn hàng mới
        $transactionNews = Transaction::with('user:id,name')->limit(5)->orderByDesc('id')->get();
        $viewData = [
            'ratings'           => $ratings,
            'moneyDay'          =>$moneyDay,
            'moneyMonth'        =>$moneyMonth,
            'viewMoney'         => json_encode( $viewMoney),
            'transactionNews'   =>$transactionNews,
            'totalMember'       =>$totalMember,
            'totalProduct'      =>$totalProduct,
            'totalArticle'     =>$totalArticle,
            'totalRating'      =>$totalRating

        ];


        return view('admin::index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
