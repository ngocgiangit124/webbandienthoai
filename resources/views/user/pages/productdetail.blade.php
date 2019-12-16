@extends('user.master')
@section('content')
@section('description','Shop Fashion ST')
<style>
  .productprice {
    display: block;
    /*height: 70px;*/
    padding-top: 12px;
    text-align: center;
    border: solid 1px #d1d1d1;
    background-color: #f5f5f5;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
  }
  .zlboxs {
    border-radius: 3px;
    background-color: #eff9ff;
    padding: 10px;
    color: #5d3d07;
    margin-bottom: 10px;
  }
  .zlboxs strong {
    color: #dc001b;
  }
  .zlboxs a {
    color: #3f8fbc;
  }
  .fs-dtibtn {
    margin: 0 -7px 15px;
  }
  .clearfix {
    zoom: 1;
  }
  ul {
    list-style: none;
  }
  .fs-dtibtn li.fsw100 {
    width: 100%;
  }
  .fs-dtibtn li {
    margin-bottom: 12px;
  }
  .fs-dtibtn li {
    float: left;
    width: 50%;
    padding: 0 7px;
  }
  .fs-dtibtn li.fsw100 a {
    padding-top: 6px;
  }

  .fs-dtibtn li a {
    display: block;
    padding-top: 9px;
    text-align: center;
    height: 60px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.23);
    cursor: pointer;
  }
  .fs-dti-oder:active, .fs-dti-oder:focus, .fs-dti-oder {
    color: #fff;
    background: #d0021b;
    border: solid 1px #d0021b;
  }
  .fs-dtibtn li.fsw100 a p {
    font-size: 20px;
  }
  .fs-dtibtn li a span {
    display: block;
    font-size: 12px;
  }
  .fs-dtibtn li {
    margin-bottom: 12px;
  }
  .fs-dtibtn li {
    float: left;
    width: 50%;
    padding: 0 7px;
  }
  .fs-dti-tgop:active, .fs-dti-tgop:focus, .fs-dti-tgop {
    color: #fff;
    background: #337ab7;
    border: solid 1px #337ab7;
  }
  p {
    margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline;
    background: transparent;
  }
</style>

  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="col-lg-5">
          <ul class="thumbnails mainimage">
            <li>
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/'.$product_detail->image) !!}">
                <img src="{!! asset('resources/upload/'.$product_detail->image)  !!}" alt="" title="">
              </a>
            </li>
            @foreach($image as $item_image)
            <li>
              <a  rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{!! asset('resources/upload/detail/'.$item_image->image) !!}">
                <img src="{!! asset('resources/upload/detail/'.$item_image->image)  !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
          <span>Chuột di chuyển trên Ảnh để phóng to</span>
          
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/'.$product_detail->image) !!}" alt="" title="">
              </a>
            </li>
            @foreach($image as $item_image)
            <li class="producthtumb">
              <a class="thumbnail" >
                <img  src="{!! asset('resources/upload/detail/'.$item_image->image) !!}" alt="" title="">
              </a>
            </li>
            @endforeach
          </ul>
        </div>
         <!-- Right Details-->
        <div class="col-lg-7">
          <div class="row">
            <form id="form-mua-spec" class="form-vertical" role="form" action="{!! route('cart') !!}" method="POST">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="product_id" value="{!! $product_detail->id !!}">
            <div class="col-lg-7">
              <h1 class="productname"><span class="bgnone">{!! $product_detail->name !!}</span></h1>
              <div class="productprice" style="padding: 10px;text-align: center">
                @if($product_detail->price_new == 0)
                  <div class="productpageprice" style="font-size: 24px;margin:0">
                  <span class="spiral"></span>{!! number_format($product_detail->price) !!} VNĐ
                </div>
                @else
                  <div class="productpageprice" style="font-size: 24px;margin:0">

                  <span class="spiral"></span>{!! number_format($product_detail->price_new) !!} VNĐ
                  </div>
                    <div class="productpageoldprice" style="font-size: 18px;margin:0;color: red;font-weight: 700">Giá cũ : {!! $product_detail->price !!} VNĐ</div>
                @endif

                {{--<ul class="rate">--}}
                  {{--<li class="on"></li>--}}
                  {{--<li class="on"></li>--}}
                  {{--<li class="on"></li>--}}
                  {{--<li class="off"></li>--}}
                  {{--<li class="off"></li>--}}
                {{--</ul>--}}
              </div>
              <div class="quantitybox">
                <div class="col-sm-6">
                  <legend style="font-size: 16px">Màu sắc</legend>
                    <select class="selectsize" name="size">
                      @foreach($size as $size)
                      <option value="{!! $size->size !!}">{!! $size->size !!}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                  <legend style="font-size: 16px">Số lượng</legend>
                    <div class="col-lg-12">
                        <input type="number" min="0" max="{{$product_detail->quantity}}" id="quantity" name="quantity" class="form-control input-number" value="1" >
                    </div>
                </div>
                @include('admin.blocks.error')
                <div class="clear"></div>
               <div class="control-group">
                  <div class="controls">

                  </div>
                </div>
              </div>
              <div class="zlboxs">
                <img src="/public/user/img/vnpay.png" alt="vnpay"> Giảm ngay <strong>5%</strong>
                (tối đa 100.000đ) khi thanh toán bằng quét QRCode trên ứng dụng ngân hàng
                <a href="https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/duoc-giam-den-500-000-dong-khi-thanh-toan-qua-vnpay-qr-tai-fpt-shop-80673" title="Click xem chi tiết" target="_blank">
                  Xem chi tiết
                </a>
              </div>
              @if($product_detail->status == 0)
                <button disabled type="submit" class="btn btn-orange" style="font-size: 20px"><span class="glyphicon glyphicon-shopping-cart"></span> Thêm</button>
              @else
                <ul data-xx="" class="fs-dtibtn clearfix build-order">
                  <li class="fsw100"> <a type="submit" id="mua-spec" class=" fs-dti-oder dts-addtocart sp-goal-1042-2000-115-1569750355675" title=""> <p>MUA NGAY</p> <span>Giao hàng trong 1 giờ hoặc nhận tại shop</span> </a> </li>
                  <li> <a class="fs-dti-tgop btn-ntc-ttd sp-goal-1042-2000-115-1569750358394" href="javascript:" title=""> <p>TRẢ GÓP 0%</p> <span>Xét duyệt nhanh qua điện thoại</span> </a> </li>
                  <li> <a class="fs-dti-tgop sp-goal-1042-2000-115-1569750362482" href="javascript:" title=""> <p>TRẢ GÓP QUA THẺ</p> <span>Visa, Master Card, JCB</span> </a> </li>
                </ul>
                {{--<button type="submit" class="btn btn-orange" style="font-size: 20px"><span class="glyphicon glyphicon-shopping-cart"></span> Thêm</button>--}}
              @endif
            </div>
              <div class="col-lg-5" style="padding: 0 5px">
                <div class="fs-dtcol2">
                  <style>.fs-tsright{padding:15px;background:#fff;margin-bottom:20px}.fs-tsright ul li{display:table;width:100%;padding:5px 0}.fs-tsright ul li label,.fs-tsright ul li span{display:table-cell;vertical-align:top}.fs-tsright ul li label{width:100px;font-size:13px;color:#616161;padding-right:6px}.fs-tsright ul li span{color:#3d3d3d;font-size:13px}.fs-tsright ul li a{color:#337ab7}.fs-tsrvmo{text-align:center;padding:10px 0 0}.fs-tsrvmo span{cursor:pointer;display:block;height:36px;line-height:36px;text-align:center;font-size:13px;color:#337ab7;border-radius:2px;background-color:#fff;border:solid 1px #337ab7}</style>
                  <div class="fs-dtbox main_spec">
                    <div class="fs-dttop">
                      <h2>Thông số kỹ thuật</h2>
                    </div>
                    <div class="fs-tsright">

                      <ul>
                        <li> <label>Màn hình :</label>{{$product_detail->screen}} <span></span> </li>
                        <li> <label>Camera trước :</label> <span>{{$product_detail->camera1}}</span> </li>
                        <li> <label>Camera sau :</label> <span>{{$product_detail->camera2}}</span> </li>
                        <li> <label>RAM :</label> <span>{{$product_detail->ram}}</span> </li>
                        <li> <label>Bộ nhớ trong :</label> <span>{{$product_detail->rom}}</span> </li>
                        <li> <label>CPU :</label> <span>{{$product_detail->cpu}}</span> </li>
                        <li> <label>GPU :</label> <span>{{$product_detail->gpu}}</span> </li>
                        <li> <label>Dung lượng pin :</label> <span>{{$product_detail->battery_capacity}}</span> </li>
                        <li> <label>Hệ điều hành :</label> <span>{{$product_detail->operating_system}}</span> </li>
                        <li> <label>Thẻ SIM :</label> <span>{{$product_detail->sim}}</span> </li>
                        <li> <label>Xuất xứ :</label> <span>{{$product_detail->origin}}</span> </li>
                        {{--<li> <label>Năm sản xuất :</label> <span>{{$product_detail->screen}}</span> </li>--}}
                      </ul>
                      <style>.fs-ifsimss{position:relative;padding-left:44px;font-size:13px;color:#4a4a4a}.fs-ifsimss span{position:absolute;left:0;top:0;padding:0 5px;display:inline-block;height:18px;line-height:18px;border-radius:8px;color:#fff;font-size:12px;font-weight:bold;background-color:#e40000}.fs-ifsimss a{color:#337ab7}.fs-ifsimss strong{color:#d0021b}</style>
                      <p class="fs-ifsimss"><span>HOT</span> <a href="/sim-so-dep/chon-so/viettel/00529745" title="Sim Alo Max90 Viettel" target="_blank">Sim Alo Max90 Viettel</a> (5GB data/ tháng, miễn phí gọi nội mạng &lt;10 phút, miễn phí 15 phút ngoại mạng). Giá từ <strong>80.000đ</strong></p>
                      <p class="fs-tsrvmo" data-toggle="modal" data-target="#PopTSKTLT"><span class="tstk" onclick="ga('send', 'event', 'Product Detail', 'Click chi tiết cấu hình', 'Xem cấu hình chi tiết');">Xem cấu hình chi tiết</span></p>
                    </div>
                  </div>

                </div>
              </div>
              
            </form>
  
         <!-- Product Description tab & comments-->

          </div>
        </div>

      </div>
    </div>
  </section>

<section id="related" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Chi tiết sản phẩm</span><span class="subtext"></span></h1>
    <ul class="thumbnails">
      <div class="productdesc">
        <ul class="nav nav-tabs" id="myTab">
          {{--<li ><a href="#detail">Chi tiết sản phẩm</a>--}}
          <li class="active"><a href="#description">Mô tả Sản phẩm</a>
          </li>
          <!-- <li><a href="#specification">Specification</a>
          </li> -->
          <li><a href="#producttag">Thẻ</a>
          </li>
        </ul>
        <div class="tab-content">
          {{--<div class="tab-pane " id="detail">--}}
            {{--{!! $product_detail->content !!}--}}
          {{--</div>--}}
          <div class="tab-pane active" id="description">

            {!! $product_detail->description !!}

          </div>

          <!-- <div class="tab-pane " id="specification">
          </div> -->

          <div class="tab-pane" id="producttag">
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum <br>
              <br>
            </p>
            <ul class="tags">
              <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> html</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> html</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> css</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> jquery</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> css</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> jquery</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> css</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> jquery</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> Webdesign</a>
              </li>
              <li><a href="#"><i class="icon-tag"></i> html</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </ul>
  </div>
</section>


  <!--  Related Products-->
  <section id="related" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản phẩm liên quan</span><span class="subtext"> Xem các sản phẩm nổi bật nhất của chúng tôi</span></h1>
      <ul class="thumbnails">
        @foreach($product_related as $item_related)
        <li class="col-lg-3 col-sm-3">
          <a class="prdocutname" href="{!! url('product-detail',[$item_related->id,$item_related->alias]) !!}">{!! $item_related->name !!}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Giảm giá</span>
            <a href="{!! url('product-detail',[$item_related->id,$item_related->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_related->image) !!}"></a>
<!--             <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div> -->
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">Thêm</a>
              <div class="price">
                <div class="pricenew">{!! $item_related->price_new !!} VNĐ</div>
                <div class="priceold">{!! $item_related->price !!} VNĐ</div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  <!-- Popular Brands-->
  <section id="popularbrands" class="container">
    <h1 class="heading1"><span class="maintext">Thương hiệu nổi tiếng</span><span class="subtext"> Xem các nhãn hiệu phổ biến của chúng tôi</span></h1>
    <div class="brandcarousalrelative">
      <ul id="brandcarousal">
        <li><img src="{!! url('public/user/img/brand1.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand2.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand3.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand4.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand1.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand2.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand3.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand4.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand1.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand2.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand3.jpg') !!}" alt="" title=""/></li>
        <li><img src="{!! url('public/user/img/brand4.jpg') !!}" alt="" title=""/></li>
      </ul>
      <div class="clearfix"></div>
      <a id="prev" class="prev" href="#">&lt;</a>
      <a id="next" class="next" href="#">&gt;</a>
    </div>
  </section>
<script>
      document.getElementById("mua-spec").onclick = function() {
          document.getElementById("form-mua-spec").submit();
      }
</script>
@endsection