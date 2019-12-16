@extends('admin.master')
@section('controller', 'category')
@section('Add','acction')
@section('content')
<div class="col-lg-12">
    @include('admin.blocks.error')
    <h1 class="page-header">Category
        <small>Add</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{!! route('admin.cate.getAdd') !!}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent - (Danh mục cha)</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please Choose Category</option>
                <?php cate_parent($parent); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name - ( Tên danh mục)</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Keywords - (Mã danh mục)</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Category Description - (Mô tả)</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
        </div>
        <div class="form-group">
            <label>Icon - (ảnh nhỏ)</label>
            <input type="file" class="form-control" name="icon" />
        </div>
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()