@extends('admin.master')
@section('content')
<style type="text/css">
    .img_current {
        width: 150px;
    }
    .img_detail{
        width: 200px;
        padding-bottom: 20px;
    }
    .icon_del{
        position: relative;
        top: -155px;
        left: -20px;
    }
    #insert {
        margin-top: 20px;
    }
    #insertSize {
        margin-top: 20px;
    }
</style>
<div class="col-lg-12">
    @include('admin.blocks.error')
    <h1 class="page-header">Product
        <small>Edit</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
    
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent *</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,"--",$product["cate_id"]); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name - (Tên) *</label>
            <input class="form-control" required name="txtName" placeholder="Please Enter Username" value="{!! old('txtName',isset($product) ? $product['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Price - (Giá)*</label>
            <input class="form-control" type="number" required name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice',isset($product) ? $product['price'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Price New - (Giá mới)*</label>
            <input class="form-control"  name="txtPriceNew" placeholder="Please Enter Price" value="{!! old('txtPriceNew',isset($product) ? $product['price_new'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Status - (Trạng thái)*</label>
            <label class="radio-inline">
            <input name="status" value="1" type="radio" {!! old('status',$product['status']=='1' ? 'checked' : '' )!!}>OverStock</label>
            <label class="radio-inline">
            <input name="status" value="0" type="radio" {!! old('status',$product['status']=='0' ? 'checked' : '' )!!}>Out of Stock</label>
        </div>
        <div class="form-group">
            <label>Intro - (Mô tả ngắn)*</label>
            <textarea required class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] : null) !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace("txtIntro")</script>
        </div>
    <div class="form-group">
        <label>Screen -( Màn hình)</label>
        <input class="form-control" name="txtScreen" placeholder="Please Enter Product Screen" value="{{$product['screen']}}" />
    </div>
    <div class="form-group">
        <label>Camera Trước</label>
        <input class="form-control" name="txtCamera1" placeholder="Please Enter Product Camera1" value="{{$product['camera1']}}" />
    </div>
    <div class="form-group">
        <label>Camera Sau</label>
        <input class="form-control" name="txtCamera2" placeholder="Please Enter Product Camera2" value="{{$product['camera2']}}" />
    </div>
    <div class="form-group">
        <label>Ram</label>
        <input class="form-control" name="txtRam" placeholder="Please Enter Product Ram" value="{{$product['ram']}}" />
    </div><div class="form-group">
        <label>Rom</label>
        <input class="form-control" name="txtRom" placeholder="Please Enter Product Rom" value="{{$product['rom']}}" />
    </div>
    <div class="form-group">
        <label>CPU</label>
        <input class="form-control" name="txtCpu" placeholder="Please Enter Product Cpu" value="{{$product['cpu']}}" />
    </div>
    <div class="form-group">
        <label>GPU</label>
        <input class="form-control" name="txtGpu" placeholder="Please Enter Product Gpu" value="{{$product['gpu']}}" />
    </div>
    <div class="form-group">
        <label>Battery capacity - (Dung lượng pin)</label>
        <input class="form-control" name="battery_capacity" placeholder="Please Enter Product battery capacity" value="{{$product['battery_capacity']}}" />
    </div>
    <div class="form-group">
        <label>Operating system - (Hệ điều hành)</label>
        <input class="form-control" name="operating_system" placeholder="Please Enter Product operating system" value="{{$product['operating_system']}}" />
    </div>
    <div class="form-group">
        <label>Sim</label>
        <input class="form-control" name="txtSim" placeholder="Please Enter Product Sim" value="{{$product['sim']}}" />
    </div>
    <div class="form-group">
        <label>Origin - (Xuất xứ)</label>
        <input class="form-control" name="txtOrigin" placeholder="Please Enter Product Origin" value="{{$product['origin']}}" />
    </div>
        <div class="form-group" style="display: none">
            <label>Content *</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] : null) !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Images Current *</label>
            <img src="{!! asset('resources/upload/'.$product['image']) !!}" class="img_current" >
            <input type="hidden" name="img_current"  value="{!! $product['image'] !!}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group" style="display: none;">
            <label>Product Keywords</label>
            <input class="form-control"  name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords',isset($product) ? $product['keywords'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control required rows="3" name="txtDescription" >{!! old('txtDescription',isset($product) ? $product['description'] : null) !!}</textarea>
            <script type="text/javascript">CKEDITOR.replace("txtDescription")</script>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    
</div>
<div class="col-md-1"></div>
<div class="col-md-4">
    @foreach($product_image as $key => $item)
    <div class="form-group " style="position: relative" id="{{ $item['id'] }}">
        <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" style="position: relative" class="img_detail" idImg="{!! $item['id'] !!}" id="{!! $key !!}">
        <a href="javascript:void(0)" style="position: absolute;top: 0;" id="del_image-spec" data-id="{{$item['id']}}" type="button"  class=" del_image-spec btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
    </div>
    
    @endforeach
    <button type="button" id="addImages" class="btn btn-danger">Add Images</button>
    <div id="insert"></div>
    
    <h3>Edit Size</h3>
    @foreach($product_size as $key => $item_size)
    <div class="form-group">Input Size
        <input type="text" name="SizeEditDetail[]" value="{!! old('SizeEditDetail',isset($item_size) ? $item_size['size'] : null) !!}">
        <input type="hidden" name="idSize[]" value="{!! $item_size['id'] !!}">
    </div>
    @endforeach
    <button type="button" id="addSizes" class="btn btn-danger">Add Color</button>
    <div id="insertSize"></div>
</div>

</form>

<script type="text/javascript" src="{{ url('public/js/jquery.js')}}"></script>

<script type="text/javascript">
    $('.del_image-spec').click(function () {
        var id=$(this).attr('data-id');
        $.ajax({
            url: "/admin/product/delimg/"+id,
            data: [],
        }).done(function() {
            $('#'+id).remove();
        });
    });
</script>

@endsection()