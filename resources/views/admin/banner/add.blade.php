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
    <form action="/admin/banner/add" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Photo Banner</label>
            <input type="file" class="form-control" name="photo" placeholder="" />
        </div>
        <div class="form-group">
            <label>Status hidden</label> <br>
            <input type="radio" class="" name="status" value="0" placeholder="" />
        </div>
        <div class="form-group">
            <label>Status show</label><br>
            <input type="radio" class="" name="status" value="1" placeholder="" />
        </div>

        <button type="submit" class="btn btn-default">Banner Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()