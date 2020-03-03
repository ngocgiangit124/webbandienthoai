@extends('admin.master')
@section('content')
<div class="col-lg-12">
    @include('admin.blocks.error')
    <h1 class="page-header">Category
        <small>Edit</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent - (Danh mục cha)</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please Choose Category</option>
                <?php cate_parent($parent,0,"--",$data["parent_id"]); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name - ( Tên danh mục)</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Category Keywords - (Mã danh mục)</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords',isset($data) ? $data['keywords'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Category Description - (Mô tả)</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($data) ? $data['description'] : null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Icon - (ảnh nhỏ)</label> :
            <img width="30px" src="{!! asset('resources/upload/'.$data['icon']) !!}" class="img_current" >
            <input type="file" class="form-control" name="icon" />
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()