<div class="headerstrip">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"> <a href="{{ url('/index')}}" class="logo pull-left"><img src="{!! url('public/user/img/logo.png') !!}" alt="SimpleOne" title="SimpleOne"></a> 
                <!-- Top Nav Start -->
                <div class="pull-left">
                    <div class="navbar" id="topnav">
                        <div class="navbar-inner">
                            <ul class="nav" >
                                <li><a class="home active" href="{!! url('index') !!}">Trang chủ</a> </li>
                                <li><a class="shoppingcart" href="{!! url('cart-info') !!}">Giỏ hàng</a> </li>
                                <li><a class="checkout" href="{!! url('check-out') !!}">Thanh toán</a> </li>
                                <li><a class="myaccount" href="{!! url('myaccount') !!}">Tài khoản của tôi</a> </li>
                                @if(Auth::check())
                                    <li><a class="log-out" href="{!! url('logout') !!}">Đăng xuất</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Nav End -->
                <div class="pull-right">
                    <form action="{!! route('search') !!}" method="post" class="form-search top-search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="key_search" class="input-medium search-query" placeholder="Tìm kiếm…">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>