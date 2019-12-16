@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')

<section id="product">
  <div class="container">
  <!--  breadcrumb -->  
    <ul class="breadcrumb">
      <li>
        <a href="#">Home</a>
        <span class="divider">/</span>
      </li>
      <li class="active">ĐĂNG KÝ TÀI KHOẢN</li>
    </ul>
    <div class="row">        
      <!-- Account Login-->
      <div class="col-lg-12">

        <h1 class="heading1"><span class="maintext">ĐĂNG KÝ TÀI KHOẢN</span><span class="subtext"> Đăng ký thông tin của bạn với chúng tôi</span></h1>
          <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.error')
            <form class="form-vertical" role="form" action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="form-group">
                  <label>Tài khoản<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtUser" placeholder="Tài khoản" value="{!! old('txtUser') !!}" />
              </div>
              <div class="form-group">
                  <label>Mật khẩu<span class="red">*</span></label>
                  <input type="password" class="form-control" name="txtPass" placeholder="Mật khẩu" />
              </div>
              <div class="form-group">
                  <label>Mật khẩu lại<span class="red">*</span></label>
                  <input type="password" class="form-control" name="txtRePass" placeholder="Mật khẩu" />
              </div>
              <div class="form-group">
                  <label>Họ và tên<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtFName" placeholder="Họ tên" value="{!! old('txtFName') !!}"/>
              </div>
              <div class="form-group">
                  <label>Giới tính<span class="red">*</span></label>
                  <label class="radio-inline">
                      <input name="rdoGender" value="1" checked="" type="radio">Nam
                  </label>
                  <label class="radio-inline">
                      <input name="rdoGender" value="0" type="radio">Nữ
                  </label>
              </div>
              <div class="form-group">
                  <label>Email<span class="red">*</span></label>
                  <input type="email" class="form-control" name="txtEmail" placeholder=" Email" value="{!! old('txtEmail') !!}"/>
              </div>
              <div class="form-group">
                  <label>Địa chỉ<span class="red">*</span></label>
                  <input type="text" class="form-control" name="txtAddress" placeholder="Địa chỉ" value="{!! old('txtAddress') !!}"/>
              </div>
              <div class="form-group">
                  <label>Số điện thoại<span class="red">*</span></label>
                  <input type="number" class="form-control" name="txtPhone" placeholder="Số điện thoại" value="{!! old('txtPhone') !!}"/>
              </div>
              <input type="submit" class="btn btn-orange pull-left" value="Đăng ký">
            </form>
          </div> 
      </div>        
    </div>
  </div>
</section>

@endsection