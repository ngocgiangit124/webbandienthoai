@extends('admin.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Category
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Photo Banner</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $index =>$banner)
        <tr class="odd gradeX" align="center">
            <td>{{ $index }}</td>
            <td>
                <img src="{{$banner['photo']}}" width="200px" alt="">
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick=" return xacnhanxoa('Are you sure you want to delete?')" href="/admin/banner/delete/{{$banner['id']}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="/admin/banner/edit/{{$banner['id']}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()