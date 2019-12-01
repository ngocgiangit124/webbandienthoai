@extends('admin.master')
@section('content')
<style type="text/css">
    #insertSize {
        margin-top: 20px;
    }
</style>
<div class="col-lg-12">
    @include('admin.blocks.error')
    <h1 class="page-header">Product
        <small>Add</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent - (Thể loại)</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,"--",old('sltParent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name - (Tên)*</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Price - (Giá)*</label>
            <input class="form-control" name="txtPrice" type="number" placeholder="Please Enter Product Price" value="{!! old('txtPrice') !!}" />
        </div>
        <div class="form-group">
            <label>Intro - (Mô tả ngắn)*</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Screen -( Màn hình)</label>
            <input class="form-control" name="txtScreen" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Camera Trước</label>
            <input class="form-control" name="txtCamera1" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Camera Sau</label>
            <input class="form-control" name="txtCamera2" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Ram</label>
            <input class="form-control" name="txtRam" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div><div class="form-group">
            <label>Rom</label>
            <input class="form-control" name="txtRom" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>CPU</label>
            <input class="form-control" name="txtCpu" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>GPU</label>
            <input class="form-control" name="txtGpu" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Battery capacity - (Dung lượng pin</label>
            <input class="form-control" name="battery_capacity" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Operating system - (Hệ điều hành)</label>
            <input class="form-control" name="operating_system" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Sim</label>
            <input class="form-control" name="txtSim" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Origin - (Xuất xứ)</label>
            <input class="form-control" name="txtOrigin" placeholder="Please Enter Product Name" value="{!! old('txtName') !!}" />
        </div>

        <div class="form-group" style="display: none;">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Images - (Ảnh hiển thị)*</label>
            <input type="file" name="fImages" value="{!! old('fImages') !!}">
        </div>
        <div class="form-group" style="display: none">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Product Keywords" value="{!! old('txtKeywords') !!}" />
        </div>
        <div class="form-group">
            <label>Product Description - ( Mô tả sản phẩm)</label>
            <textarea class="form-control" rows="3" name="txtDescription" placeholder="Please Enter Product Description">{!! old('txtDescription') !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace("txtDescription")</script>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            @for($i = 1; $i <= 5 ; $i++)
            <div class="form-group">
                <label>Product Image Detail {!! $i !!}</label>
                <input type="file" name="fProductDetail[]"/>
            </div>
            @endfor

            <button type="button" id="addSizes" class="btn btn-danger">Add Color</button>
            <div id="insertSize"></div>
        </div>
</form>

@endsection()