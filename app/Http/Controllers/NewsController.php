<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Product_image;
use App\Product_size;
use File;
use Request;
use Auth;

class NewsController extends Controller
{
    public function upload() {
        if (!empty(Request::file('fImages'))) {
            $file_name = Request::file('fImages')->getClientOriginalName();
            Request::file('fImages')->move('resources/upload/',$file_name);
        }else{
            echo "ko co file";
        }
    }
    public function getList() {
        $data = Product::select('id','name','price', 'price_new', 'status','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }

    public function getAdd() {
//        dd('xx');
//        $cate = Category::select('name','id','parent_id')->get()->toArray();
        return view('admin.news.add');
    }

    public function postAdd(ProductRequest $product_request) {
        $file_name = $product_request->file('fImages')->getClientOriginalName();
        $product = new Product();
        $product->name = $product_request->txtName;
        $product->alias = changeTitle($product_request->txtName);
        $product->price = $product_request->txtPrice;
        $product->quantity = $product_request->txtQuantity;
        $product->price_new = 0;
        $product->status = 1;
        $product->intro = $product_request->txtIntro;
        $product->content = $product_request->txtContent;
        $product->image = $file_name;
        $product->keywords = $product_request->txtKeywords;
        $product->description = $product_request->txtDescription;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $product_request->sltParent;
        $product->screen = $product_request->txtScreen;
        $product->camera1 = $product_request->txtCamera1;
        $product->camera2 = $product_request->txtCamera2;
        $product->ram = $product_request->txtRam;
        $product->rom = $product_request->txtRom;
        $product->cpu = $product_request->txtCpu;
        $product->gpu = $product_request->txtGpu;
        $product->battery_capacity = $product_request->battery_capacity;
        $product->operating_system = $product_request->operating_system;
        $product->sim = $product_request->txtSim;
        $product->origin = $product_request->txtOrigin;
        $product_request->file('fImages')->move('resources/upload/',$file_name);
        $product->save();
        $product_id = $product->id;
        if ($product_request->hasFile('fProductDetail')) {
            //print_r(Input::file('fProductDetail'));
            foreach ($product_request->file('fProductDetail') as $file) {
                $product_img = new Product_image();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        if(!empty(Request::input('SizeAddDetail'))){
            foreach ($product_request->get('SizeAddDetail') as $size) {
                $product_size = new Product_size();
                if ($size != '') {
                    $product_size->size = $size;
                    $product_size->product_id = $product_id;
                    $product_size->save();
                }
            }
        } else {
            $product_size = new Product_size();
            $product_size->size = 1;
            $product_size->product_id = $product_id;
            $product_size->save();
        }
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Add Product Complete Success!']);
    }

    public function getDelete($id) {
        $product_detail = Product::find($id)->product_image->toArray();
        foreach ($product_detail as $value) {
            File::delete('resources/upload/detail/'.$value["image"]);
        }
        $product = Product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Delete Product Complete Success!']);
    }

    public function getEdit($id){
        $cate = Category::select('name','id','parent_id')->get()->toArray();
        $product = Product::find($id);
        $product =$product->getArrayInfo1();
        if(!$product) {
            return view('errors.404');
        }
        $product_image = Product::find($id);
        if($product_image) {
            $product_image=$product_image->product_image;
        } else {
            $product_image = '';
        }
        $product_size = Product::find($id);
        if(count((array)$product_size)>0) {
            $product_size=$product_size->product_size;
        } else {
            $product_size = [];
        }
//        dd(compact('cate','product','product_image','product_size'));
        return view('admin.product.edit',compact('cate','product','product_image','product_size'));
    }

    public function postEdit($id){
        $product = Product::find($id);
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->quantity = Request::input('txtQuantity');
        $product->price_new = Request::input('txtPriceNew');
        $product->status = Request::input('status');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDescription');
        $product->user_id = Auth::user()->id;
        $product->cate_id = Request::input('sltParent');
        $product->screen = Request::input('txtScreen');
        $product->camera1 = Request::input('txtCamera1');
        $product->camera2 = Request::input('txtCamera2');
        $product->ram = Request::input('txtRam');
        $product->rom = Request::input('txtRom');
        $product->cpu = Request::input('txtCpu');
        $product->gpu = Request::input('txtGpu');
        $product->battery_capacity = Request::input('battery_capacity');
        $product->operating_system = Request::input('operating_system');
        $product->sim = Request::input('txtSim');
        $product->sim = Request::input('txtOrigin');
        $img_current = 'resources/upload/'.Request::input('img_current');
        if (!empty(Request::file('fImages'))) {
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('resources/upload/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }else{
            echo "ko co file";
        }
        $product->save();

        if (!empty(Request::file('fEditDetail'))) {
            foreach (Request::file('fEditDetail') as $file) {
                $product_img = new Product_image();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        if(!empty(Request::input('idSize')) && !empty(Request::input('SizeEditDetail'))){
            foreach (array_combine(Request::input('idSize'),Request::input('SizeEditDetail')) as $size_id => $size_edit) {
                $product_size = Product_size::find($size_id);
                if(empty($size_edit)){
                    $product_size->delete($size_id);

                }else{
                    $product_size->size = $size_edit;
                    $product_size->product_id = $id;
                    $product_size->save();
                }

            }
        }
        if(!empty(Request::input('SizeAddDetail'))){
            foreach (Request::input('SizeAddDetail') as $size) {
                $product_size = new Product_size();
                if ($size != '') {
                    $product_size->size = $size;
                    $product_size->product_id = $id;
                    $product_size->save();
                }
            }
        }

        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Edit Product Complete Success!']);
    }

    public function getDelImg($id) {
        $idImg = (int)Request::get('idImg');
        $image_detail = Product_image::find($id);
        if (!empty($image_detail)) {
            $img = 'resources/upload/detail/'.$image_detail->image;
            if (File::exists($img)) {
                File::delete($img);
            }
            $image_detail->delete();
        }
        $res['status'] = 200;
        return $res;
    }
}
