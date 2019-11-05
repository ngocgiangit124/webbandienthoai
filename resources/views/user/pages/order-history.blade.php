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
        <li class="active">Tài khoản của tôi</li>
      </ul>
      <div class="row">
        
        <!-- My Account-->
        <div class="col-lg-9">
            <h1 class="heading1"><span class="maintext">Lịch sử đơn hàng</span><span class="subtext">Xem tất cả các đơn đặt hàng của bạn</span></h1>
            <div class="container col-md-6"   style="">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <th>ID đơn hàng</th>
                  <th>Ngày đặt hàng</th>
                  <th>Trạng thái</th>
                  <th>Toàn bộ</th>
                </thead>
                <tbody>
                  @foreach($orders as $item)
                  <tr>
                    <td>{!! $item->id !!} <a href="#" style="color: Blue; float: right;">Chi tiết</a></td>
                    <td>{!! $item->date_order !!}</td>
                    <td>
                      @if($item->status == 0)
                        Đơn hàng mới
                      @elseif($item->status == 1)
                         Chưa giao hàng
                      @elseif($item->status == 2)
                            Đang Vận chuyển
                      @elseif($item->status == 3)
                            Đã giao hàng
                      @endif
                    </td>
                    <td style="color: red;">{!! $item->total !!} VNĐ</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
     
        </div>
        <!-- Sidebar Start-->
          <aside class="col-lg-3">
            <div class="sidewidt">
              <h2 class="heading2"><span>Tài khoản</span></h2>
              <ul class="nav nav-list categories">
                @if(Auth::user()->level == 1)
                <li>
                  <a href="{!! url('admin/bill/list') !!}">Trang quản trị</a>
                </li>
                @endif
                <li>
                  <a href="{!! url('edit-account') !!}">Chỉnh sửa tài khoản</a>
                </li>
                <li><a href="{!! url('order-history') !!}">Lịch sử đơn hàng</a>
                </li>
                <li>
                  <a href=" {!! url('logout') !!}">Đăng xuất</a>
                </li>
              </ul>
            </div>
          </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
@endsection