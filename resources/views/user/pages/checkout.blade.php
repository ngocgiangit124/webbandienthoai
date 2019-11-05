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
      <li class="active">Thanh toán</li>
    </ul>
    <div class="row">        
      <!-- Account Login-->
      <div class="col-lg-12">
        @if(!Auth::check())
        <h1 class="heading1"><span class="maintext">Thanh toán</span><span class="subtext"> ác bước của quy trình thanh toán</span></h1>
        <div class="checkoutsteptitle">Tùy chỉnh<a class="modify">Sửa đổi</a>
        </div>
        <div class="checkoutstep ">

          <section class="returncustomer">
            <h2 class="heading2">Phản hồi khách hàng </h2>
            <div class="loginbox">
                <h4 class="heading4">Bạn đã có tài khoản. Xin vui lòng đăng nhập:</h4>
              @if(Session::has('flash_message'))
                  <div class="alert alert-{!! Session::get('flash_level') !!}">
                      {!! Session::get('flash_message') !!}
                  </div>
              @endif
              @include('admin.blocks.error')
              <form class="form-vertical" role="form" action="{!! url('login-checkout') !!}" method="POST">
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">Tên tài khoản:</label>
                    <div class="controls">
                      <input type="text" name="txtUsername" placeholder="Username" class="" value="{!! old('txtUsername') !!}">
                    </div>
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Mật khẩu:</label>
                    <div class="controls">
                      <input type="password" name="txtPass" placeholder="Password" class="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="checkbox" name="remember" value="true">Nhớ
                    <br>
                    <a class="" href="#">Quên mật khẩu</a>
                  </div>
                  
                  <button type="submit" class="btn btn-orange">Đăng nhập</button>
                </fieldset>
              </form>
            </div>
          </section>
          <section class="newcustomer">
            <h2 class="heading2">Khách hàng mới </h2>
            <div class="loginbox">
              <h4 class="heading4"> Đăng ký tài khoản</h4>
              <p>Đăng ký tại Shop Fashion ST để sử dụng các chức năng trên trang web và cập nhật thông tin về các sản phẩm mới của chúng tôi một cách nhanh nhất.</p>
              <br>
              <br>
              <a href="{!! url('register') !!}" class="btn btn-orange">Đăng ký tài khoản</a>
            </div>
          </section>

        </div>
        @endif
        <form class="form-vertical" role="form" action="{!! url('checkout') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        @if(!Auth::check())
        <div class="checkoutsteptitle">Khách mời<a class="modify">Sửa đổi</a>
        </div>
        <div class="checkoutstep">
          <div class="row">
              <fieldset>
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
                  </div>
                  <div class="col-lg-6">
                  <div class="control-group">
                    <label class="control-label" >Số điện thoại<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtPhone" class=""  value="{!! old('txtPhone') !!}">
                    </div>
                  </div>
    
                  <div class="control-group">
                    <label class="control-label" >Địa chỉ<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="txtAddress" class=""  value="{!! old('txtAddress') !!}">
                    </div>
                  </div>
              </fieldset>
          </div>
        </div>


        @endif

        <div class="checkoutsteptitle">Phương thức thanh toán<a class="modify">Sửa đổi</a>
        </div>
        
          <div class="checkoutstep">
            <p>Vui lòng chọn phương thức thanh toán ưa thích để sử dụng cho đơn hàng này.</p>
            <label class="inline">
              <input name="payment" type="radio" checked="checked" value="Cash On Delivery">Thanh toán khi giao hàng</label>
            <textarea name="note" rows="2" placeholder="Thêm bình luận ở đây..."></textarea>
            <br>

          </div>
          <div class="col-lg-4 pull-right">
            <input type="submit" class="btn btn-orange pull-right" value="CheckOut">
            <a href="{!! url('index') !!}"><input type="" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
          </div>  
        </form>
      </div>        
    </div>
  </div>
</section>

@endsection