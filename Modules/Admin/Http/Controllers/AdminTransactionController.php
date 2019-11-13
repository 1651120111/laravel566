<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transaction = Transaction::with('user:id,name')->paginate(10);

        $viewData = [
            'transaction' => $transaction,
        ];

        return view('admin::transaction.index',$viewData);
    }

    public function viewOrder(Request $request,$id){
        if($request->ajax()){
            $orders = Order::with('Product')->where('or_transaction_id',$id)->get();

            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json( $html);
        }
    }

    public function action(Request $request,$id){
        $transactions = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();

        if ($orders) {
            foreach ($orders as $order) {

                $product = Product::find($order->or_product_id);
                if( $product->pro_number >= $order->or_qty){

                \DB::table('users')->where('id',$transactions->tr_user_id)->increment('total_pay');
                $transactions->tr_status = Transaction::STATUS_DONE; // nhấp chuột 1 cái thì khi đó nó sẽ không bằng nhau và chuyển qua 1
                $transactions->save();
                $product->pro_number = $product->pro_number - $order->or_qty;
                $product->pro_pay++;
                $product->save();



                    return redirect()->back()->with('success','Xư lí đơn hàng thành công');
            }
                else{
                    return redirect()->back()->with('danger','Xư lí đơn hàng không thành công vì hết hàng');
                }
        }

        }

    }

}
