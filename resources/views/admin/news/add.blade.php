@extends('admin.master')
@section('controller', 'category')
@section('Add','acction')
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <div class="col-lg-12">
    @include('admin.blocks.error')
    <h1 class="page-header">News
        <small>Add</small>
    </h1>
        <style>
            .modal-backdrop {
                z-index: 0!important;
            }
        </style>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{!! route('admin.cate.getAdd') !!}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Name - ( Tên danh mục)</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Description - (Mô tả)</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
        </div>
        <div class="form-group">
            <textarea style="display: none" name="AboutTeam" class="form-control" id="AboutTeam" placeholder="Introduce your team!"></textarea>
            {{--{!! old('AboutTeam')?old('AboutTeam'):$team['AboutTeam'] !!}--}}
            <div id="content-editor"></div>
                @if ($errors && count($errors->get('AboutTeam')) > 0)
                {{--{!! old('AboutTeam')?old('AboutTeam'):$team['AboutTeam'] !!}--}}
                    <div class="form-group invalid-err " style="margin: 0">
                        <div class="invalid-mes">
                            @foreach ($errors->get('AboutTeam') as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    </div>
                @endif
        </div>
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function(){
//        $("#content-editor").summernote("focus");
        $('#content-editor').summernote({
            focus: true,
            placeholder: 'Introduce your team',
            tabsize: 2,
            height: 500,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    console.log('xx');
                    sendFile(files);
                },
                onChange: function(contents, $editable) {
                    var ele = $('.note-editable *');
                    ele.removeAttr("class");
                    ele.removeAttr("id");
                    var xxx = $('.note-editable').html();
                    if ($('#content-editor').summernote('isEmpty')) {
                        $('#AboutTeam').val("");
                    } else {
                        $('#AboutTeam').val(xxx);
                    }
                }
            },
            toolbar: [
//                ['style', ['style']],
                ['font', ['bold','italic', 'underline']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen']],
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
//                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            }
        });

        setTimeout(function() {
            if (window.innerWidth<760) {
                $('.note-image-popover .note-children-container').append('<br/><div class="note-btn-group btn-group note-resize">Zoom: <input type="range" min="1" max="100" value="100" id="rangeImage"></div>')
                document.getElementById("rangeImage").oninput = function () {
                    var value = this.value;
                    $(currImg).css('width', value + '%');
                }
            }
        },1000);
    });
    function sendFile(file, editor, welEditable) {
        data = new FormData();
        for (var i = 0; i < file.length; i++) {
            data.append("file[]", file[i]);
        }
        data.append("_token", '{{csrf_token()}}');
        url = "/ajax/uploadImageSpec";
        $.ajax({
            data: data,
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
//            xhr: function(){
//                $('.off-popup-loading').css('display','block');
//                $('.text-error-img').css('display','block');
//                $('.loader-error-img').css('display','none');
//            },
            success: function (data) {

                if(data.status == 200) {
                    $.fancybox.close();
                    insertImage(data.url);
//                    setTimeout(function () {
//                    },1000);
                } else {
                    $('.off-popup-loading').css('display','block');
                    $('.text-error-img').css('display','block');
                    $('.loader-error-img').css('display','none');
                }
            }
        });
    }
    //    async function insertImage(urls)
    function insertImage(urls) {
        {{--var team_name = '{{$team['Name']}}';--}}
        for (var i = 0; i < urls.length; i++) {
//            await
            $('#content-editor').summernote('insertImage', urls[i], team_name);
            $('#content-editor').summernote('insertParagraph');

        }
    }
</script>
@endsection()