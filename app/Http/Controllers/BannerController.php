<?php

namespace App\Http\Controllers;

use App\Banner;
use File;
use Request;
use Auth;

class BannerController extends Controller
{
    public function getList() {
        $banners = Banner::all();
        $data=[];
        foreach ($banners as $banner) {
            $data[] = $banner->getArrayInfo();
        }
        $this->data['banners'] = $data;
        return view('admin.banner.list',$this->data);
    }
    public function getAdd() {
        return view('admin.banner.add');
    }
    public function postAdd(Request $request) {
        $banner = new Banner();

        if (!empty(Request::file('photo'))) {
            $file_name = str_random(4).Request::file('photo')->getClientOriginalName();
            $banner->photo = $file_name;
            Request::file('photo')->move('resources/upload/',$file_name);
        }
        $banner->status = Request::input("status");
        $banner->save();
        return redirect('/admin/banner/list');
    }
    public function getDelete($id) {
        $banner = Banner::find($id);
        if(!$banner) {
            return view('errors.404');
        }
        $img_current = 'resources/upload/'.$banner->photo;
        if (File::exists($img_current)) {
            File::delete($img_current);
        }
        $banner->delete();
        return redirect('/admin/banner/list');
    }
    public function getEdit($id) {
        $banner = Banner::find($id);
        if(!$banner) {
            return view('error.404');
        }
        $this->data['banner'] = $banner->getArrayInfo();
        return view('admin.banner.edit',$this->data);
    }
    public function postEdit($id) {
        $banner = Banner::find($id);
        $img_current = 'resources/upload/'.$banner->photo;
        if (!empty(Request::file('photo'))) {
            $file_name = str_random(4).Request::file('photo')->getClientOriginalName();
            $banner->photo = $file_name;
            Request::file('photo')->move('resources/upload/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        $banner->status = Request::input("status");
        $banner->save();
        return redirect('/admin/banner/list');
    }
}
