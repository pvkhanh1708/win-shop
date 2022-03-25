<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboards');
    }
    public function index(Request $request)
    {
        $limit = 10;
        if($request->session()->has('limit')){
            $limit = $request->session()->get('limit');
        }
//        if($request->session()->has('sort-product')){
//            $sort = $request->session()->get('sort-product');
//            $sorts = $request->session()->get('sort-products');
//
//            $product = Products::orderBy($sort, $sorts)->paginate($limit);
//        }else{
//            $product = Products::orderBy('name', 'desc')->paginate($limit);
//        }
//        if($request->ajax){
//            return view('dashboards.ajax.body-table-product', ['lists'=>$product]);
//        }
        $order = Order::orderBy('id', 'desc')->paginate($limit);
        return view('dashboards.order.index', [
            'title'=>'Đơn Hàng',
            'lists'=>$order
        ]);
    }
}
