<?php

namespace App\Http\Controllers;


use App\Banner;
use App\Http\Requests\QtyRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CheckOutRequest;
use DB;
use Auth;
use App\User;
use App\Order;
use App\Order_detail;
use App\Contact;
use App\Product;
use Cart;
use Alert;
use Illuminate\Support\Facades\URL;
use Request;
class PageController extends Controller
{
    public function getIndex(){
    	$product = DB::table('products')->select('id','name','image','price','price_new','alias','status')->orderBy('id','DESC')->skip(0)->take(4)->get();
        $banners1 = Banner::where('status',1)->get();
        $banners = [];
        foreach ($banners1 as $banner1) {
            $banners[] = $banner1->getArrayInfo();
        }
        return view('user.pages.home',compact('product','banners'));
    }
    public function productcateparent($id){
        $per_page = Request::input('per_page')?Request::input('per_page'):9;
        $price1 = Request::input('price1')?Request::input('price1'):0;
        $price2 = Request::input('price2')?Request::input('price2'):0;
    	$product_cate = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
                        ->select('products.*', 'categories.id as cate_id', 'categories.parent_id as parent_id')
                        ->where('parent_id', '=', $id)
                        ->where(function ($q) use ($price1,$price2) {
                            if($price1>0 && $price2>0) {
                                return $q->whereBetween('products.price',[$price1,$price2]);
                            }
                            if($price1==0 && $price2>0) {
                                return $q->where('products.price','<=',$price2);
                            }
                            if($price1>0 && $price2==0) {
                                return $q->where('products.price','>=',$price2);
                            }
                        })
                        ->orderBy('products.id','desc')
                        ->paginate($per_page);
        if(isset($product_cate[0]->cate_id)){
            $cate = DB::table('categories')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
            $menu_cate = DB::table('categories')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
        } else {
            $menu_cate = collect([]);
        }
    	$product_related = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
                            ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name')
                            ->orderBy('id','DESC')->take(4)->get();
        $product_bestseller = DB::table('order_details')
                                ->select('product_id', DB::raw('count(product_id) as seller'))
                                ->groupBy('product_id')
                                ->take(3)
                                ->get();

//        $banners = Banner::where('status',1)->get();
//        $banners = $banners->getArrayInfo();
//        $this->data['banners'] = $banners;
        return view('user.pages.cate',compact('product_cate','product_related','menu_cate','product_bestseller'),['per_page'=>$per_page]);
    }
    public function productcate($id){

        $per_page = Request::input('per_page')?Request::input('per_page'):9;
        $price1 = Request::input('price1')?Request::input('price1'):0;
        $price2 = Request::input('price2')?Request::input('price2'):0;
        $product_cate = DB::table('products')->select('id','name','image','price','price_new','alias','status','cate_id','intro')
            ->where('cate_id',$id)
            ->where(function ($q) use ($price1,$price2) {
                if($price1>0 && $price2>0) {
                    return $q->whereBetween('price',[$price1,$price2]);
                }
                if($price1==0 && $price2>0) {
                    return $q->where('price','<=',$price2);
                }
                if($price1>0 && $price2==0) {
                    return $q->where('price','>=',$price2);
                }
            })
            ->paginate($per_page);
        $product_related = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
                            ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name')
                            ->orderBy('id','DESC')->take(4)->get();
        if(isset($product_cate[0]->cate_id)){
            $cate = DB::table('categories')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
            $menu_cate = DB::table('categories')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
        } else {
            $menu_cate = collect([]);
        }
        $product_bestseller = DB::table('order_details')
                                ->select('product_id', DB::raw('count(product_id) as seller'))
                                ->groupBy('product_id')
                                ->take(3)
                                ->get();
        return view('user.pages.cate',compact('product_cate','product_related','menu_cate','product_bestseller'),['per_page'=>$per_page]);
    }
    public function productsale(){
        $per_page = Request::input('per_page')?Request::input('per_page'):9;
        $price1 = Request::input('price1')?Request::input('price1'):0;
        $price2 = Request::input('price2')?Request::input('price2'):0;
        $product_cate = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.id as cate_id', 'categories.parent_id as parent_id')
            ->where('products.price_new','>',0)
            ->where(function ($q) use ($price1,$price2) {
                if($price1>0 && $price2>0) {
                    return $q->whereBetween('products.price',[$price1,$price2]);
                }
                if($price1==0 && $price2>0) {
                    return $q->where('products.price','<=',$price2);
                }
                if($price1>0 && $price2==0) {
                    return $q->where('products.price','>=',$price2);
                }
            })
            ->orderBy('products.id','desc')
            ->paginate($per_page);
        if(isset($product_cate[0]->cate_id)){
            $cate = DB::table('categories')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
            $menu_cate = DB::table('categories')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
        } else {
            $menu_cate = collect([]);
        }
        $product_related = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name')
            ->orderBy('id','DESC')->take(4)->get();
        $product_bestseller = DB::table('order_details')
            ->select('product_id', DB::raw('count(product_id) as seller'))
            ->groupBy('product_id')
            ->take(3)
            ->get();

        return view('user.pages.cate',compact('product_cate','product_related','menu_cate','product_bestseller'),['per_page'=>$per_page]);
    }
    public function productdetail($id){
    	$product_detail = DB::table('products')->where('id',$id)->first();
        $image = DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
        $size = DB::table('product_sizes')->select('id','size')->where('product_id',$product_detail->id)->get();
        $product_related = DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->take(4)->get();
    	return view('user.pages.productdetail',compact('product_detail','image','size','product_related'));
    }
    public function myAccount(){
        if(Auth::check()){
            $user_detail = User::find(Auth::user()->id);
            return view('user.pages.myaccount',compact('user_detail'));
        }else{
            return redirect('login');
        }    
    }
    public function orderhistory(){
        $orders = DB::table('orders')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('user.pages.order-history',compact('orders'));
    }

    public function getEditAccount(){
        $user_edit = User::find(Auth::user()->id);
        return view('user.pages.edit-account',compact('user_edit'));
    }

    public function postEditAccount(Request $request){
        $user = User::find(Auth::user()->id);
        if($request->input('txtPass')){
            $this->validate($request,
                [
                    'txtRePass' => 'required|same:txtPass'
                ],
                [
                    'txtRePass.required' => 'Please Enter RePassword',
                    'txtRePass.same'    => 'Two Password Don\'t Match'
                ]
            );
            $pass = $request->input('txtPass');
            $user->password = Hash::make($pass);
        }
        $user->fullname = $request->txtFName;
        $user->email = $request->txtEmail;
        $user->gender = $request->rdoGender;
        $user->address = $request->txtAddress;
        $user->phone = $request->txtPhone;
        if($request->input('rdoLevel')){
            $user->level = $request->rdoLevel;
        }
        $user->save();
        Alert::success('Edit Your Account Success!');
        return redirect('myaccount');
    }

    public function getContact(){
        return view('user.pages.contact');
    }
    public function postContact(ContactRequest $request){
        $contact = new Contact;
        $contact->name = $request->txtFname;
        $contact->email = $request->txtEmail;
        $contact->phone = $request->txtPhone;
        $contact->note = $request->txtContact;
        $contact->status = 0;
        $contact->save();
        Alert::success('Your submission is received and we will contact you soon.', 'Thank you!')->persistent('Close');
        return redirect()->back();

    }

    public function postSearch(Request $request){
//        dd($request);
        $key_search  = Request::input('key_search');
        $product_search = Product::where('name','like',"%$key_search%")->orWhere('price','=',$key_search)->take(9)->get();
        $product_related = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
                            ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name')
                            ->orderBy('id','DESC')->take(4)->get();
        $product_bestseller = DB::table('order_details')
                                ->select('product_id', DB::raw('count(product_id) as seller'))
                                ->groupBy('product_id')
                                ->take(3)
                                ->get();
        return view('user.pages.search',['product_search'=>$product_search,'key_search'=>$key_search,'product_related'=>$product_related,'product_bestseller'=>$product_bestseller]);
    }

    public function addtocart($id){
        $product_buy = DB::table('products')->where('id',$id)->first();
        $size = DB::table('product_sizes')->where('product_id',$id)->first();
        if ($product_buy->price_new == 0) {
            $price = $product_buy->price;
        }else{
            $price = $product_buy->price_new;
        }
        if($product_buy->status == 1){
        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$price,'options'=>array('img'=>$product_buy->image,'size'=>$size->size,'alias'=>$product_buy->alias)));
        Alert::success('Add to Cart Success!');
        }
        return redirect()->back();
    }
    public function cart(QtyRequest $request){
        if ($request->isMethod('post')) {
            $product_id = $request->get('product_id');
            $product = DB::table('products')->where('id',$product_id)->first();
            $size = $request->get('size');
            $qty = $request->quantity;
            if ($product->price_new == 0) {
                $price = $product->price;
            }else{
                $price = $product->price_new;
            }
            Alert::success('Add to Cart Success!');
            Cart::add(array('id'=>$product_id,'name'=>$product->name,'qty'=>$qty,'price'=>$price,'options'=>array('img'=>$product->image,'size'=>$size,'alias'=>$product->alias)));
        }
        return redirect()->back();
    }
    public function cartinfo(){
        $content = Cart::content();
        return view('user.pages.shopping-cart',compact('content'));
    }
    public function detetecart($id){
        Cart::remove($id);
        return redirect()->route('cartinfo');
    }
    public function updatecart(Request $request){
        if ($request->ajax()) {
            $id = $request->get('id');
            $qty = (int)$request->get('qty');
            Cart::update($id,$qty);
            echo "oke";
        }
    }
    public function checkout(){
        return view('user.pages.checkout');
    }
    public function postCheckout(Request $request){
        $cartInfor = Cart::content();
        if(Cart::count() != 0){
            if(Auth::check()){
                $bill = new Order;
                $bill->user_id = Auth::user()->id;
                $bill->date_order = date('Y-m-d H:i:s');
                $bill->total = str_replace(',', '', Cart::total());
                if (!empty($request->get('note'))) {
                    $bill->note = $request->get('note');
                }else{
                    $bill->note = '';
                }
                $bill->status = 0;
                $bill->payment = $request->get('payment');
                $bill->save();

                if (count($cartInfor) > 0) {
                    foreach ($cartInfor as $key => $item) {
                        $billDetail = new Order_detail;
                        $billDetail->order_id = $bill->id;
                        $billDetail->product_id = $item->id;
                        $billDetail->quantity = $item->qty;
                        $billDetail->unit_price = $item->price;
                        $billDetail->size = $item->options['size'];
                        $billDetail->save();
                        $this->quantityChange($item->id,$item->qty);
                    }
                }
                Cart::destroy();
                Alert::success('Cảm ơn bạn đã đặt hàng của bạn!');
                return redirect('index');

            }else{
                $sid = DB::table('users')->select('id')->orderBy('id','DESC')->take(1)->first();
                $ids = $sid->id + 1;
                
                $user = new User;
                $user->username = 'Guest'.$ids;
                $user->fullname = $request->get('txtFname');
                $user->email = $request->get('txtEmail');
                $user->password = $request->get('txtPhone');
                $user->gender = 0;
                $user->address = $request->get('txtAddress');
                $user->phone = $request->get('txtPhone');
                $user->level = 2;
                $user->status = 'Offline';
                $user->save();

                $bill = new Order;
                $bill->user_id = $user->id;
                $bill->date_order = date('Y-m-d H:i:s');
                $bill->total = str_replace(',', '', Cart::total());
                if (!empty($request->get('note'))) {
                    $bill->note = $request->get('note');
                }else{
                    $bill->note = '';
                }
                $bill->status = 0;
                $bill->payment = $request->get('payment');
                $bill->save();

                if (count($cartInfor) > 0) {
                    foreach ($cartInfor as $key => $item) {
                        $billDetail = new Order_detail;
                        $billDetail->order_id = $bill->id;
                        $billDetail->product_id = $item->id;
                        $billDetail->quantity = $item->qty;
                        $billDetail->unit_price = $item->price;
                        $billDetail->size = $item->options['size'];
                        $billDetail->save();
                        $this->quantityChange($item->id,$item->qty);
                    }
                }
                Cart::destroy();
                Alert::success('Thank You for Your Order!');
                return redirect('index');
            }

        }else{
            Alert::error('Something went wrong', 'Oops!');
            return redirect()->route('cartinfo');
        }
        
    }
    function quantityChange($id,$quantity) {
        $product = Product::find($id);
        $product->quantity = $product->quantity - $quantity;
        $product->save();
    }
}
