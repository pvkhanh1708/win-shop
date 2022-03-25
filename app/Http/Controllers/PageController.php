<?php

namespace App\Http\Controllers;

use App\Models\Slides;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use Auth;
class PageController extends Controller
{
    public function index(Request $request)
    {
        $wishes = [];
        $carts = [];
        if(Auth::user()){
            $wishes = Auth::user()->wish()->pluck('product_id')->toArray();
            $carts = Auth::user()->cart()->pluck('product_id')->toArray();
        }
        return view('pages.home', [
            'title' => 'Trang Chủ',
            'categories' => Categories::where('status', true)->get(),
            'featured_products' => Products::where('status', true)
                    ->orderBy('id', 'desc')
                    ->limit(12)
                    ->get(),
            'slide' => Slides::where('status', true)->inRandomOrder()->first(),
        ]);
    }
    public function product_detail(Request $request){
        if(($slug = $request->slug) && $slug!=''){
            $data = Products::where('slug', $slug)->get()->first();
            $related = Products::all()->random(4);
            if($data){
                return view('pages.product', [
                    'title' => $data->name,
                    'product' => $data,
                    'related' =>$related
                ]);
            }
        }
        return redirect()->route('home');
    }
    public function category_detail(Request $request){
        if(($slug = $request->slug) && $slug!=''){
            $data = Categories::where('slug', $slug)->get()->first();
            if($data){
                $product = $data->products;
                return view('pages.category', [
                    'title' => $data->name,
                    'category' => $data,
                    'products' => $product
                ]);
            }
        }
        return redirect()->route('home');
    }
}
