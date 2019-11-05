@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')

<section id="product">
  <div class="container">
  <!--  breadcrumb -->  
    <ul class="breadcrumb">
      <li>
        <a href="#">Trang chủ</a>
        <span class="divider">/</span>
      </li>
      <li class="active">Liên hệ</li>
    </ul>
    <div class="row">        
      <!-- Account Login-->
      <div class="col-lg-12">

        <h1 class="heading1"><span class="maintext">Kết nối</span><span class="subtext"> Contact Us for more</span></h1>

        <form class="form-vertical" role="form" action="{!! url('contact') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="">
          <div class="row">
              <fieldset>
                @include('admin.blocks.error')
                <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Họ tên<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtFname" class=""  value="{!! old('txtFname') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >E-Mail<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtEmail" class=""  value="{!! old('txtEmail') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" >Số điện thoại<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtPhone" class=""  value="{!! old('txtPhone') !!}">
                    </div>
                  </div>  
                </div>
                <div class="col-lg-12">
                  <div class="control-group">
                    <label class="control-label" >Ghi chú<span class="red">*</span></label>
                    <div class="controls">
                    <textarea class="form-control" placeholder="Thêm bình luận ở đây..." rows="6" name="txtContact">{!! old('txtContact') !!}</textarea>
                    </div>
                  </div>
                </div>
              </fieldset>
          </div>
        </div>

          <div class="col-lg-4 pull-right">
            <input type="submit" class="btn btn-orange pull-right" value="Submit">
            <a href="{!! url('index') !!}"><input type="" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
          </div>  
        </form>
      </div>        
    </div>
  </div>
</section>

@endsection