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
      <li class="active">Danh sách</li>
    </ul>
    <div class="row">        
      <!-- Sidebar Start-->
      <aside class="col-lg-3">
       <!-- Category-->  
        <div class="sidewidt">
          <h2 class="heading2"><span>Danh sách</span></h2>
          @if(isset($product_cate[0]->cate_id))
          <ul class="nav nav-list categories">
            <li>
              @foreach($menu_cate as $menu_cate)
              <a href="{!! URL('product-cate',[$menu_cate->id,$menu_cate->alias]) !!}">{!! $menu_cate->name !!}</a>
              @endforeach
            </li>
          </ul>
          @endif
        </div>
       <!--  Best Seller -->  
        <div class="sidewidt">
          <h2 class="heading2"><span>Hàng bán chạy nhất</span></h2>
          <ul class="bestseller">
            @foreach($product_bestseller as $item_product_bsl)
            <?php
                $bsl = DB::table('products')->join('categories', 'categories.id', '=', 'products.cate_id')
                            ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name')
                            ->where('products.id',$item_product_bsl->product_id)
                            ->first();
            ?>
            <li>
              <img width="50" height="50" src="{!! asset('resources/upload/'.$bsl->image) !!}" alt="product" title="product">
              <a class="productname" href="{!! url('product-detail',[$bsl->id,$bsl->alias]) !!}"> {!! $bsl->name !!}</a>
              <span class="procategory"> {!! $bsl->cate_name !!}</span>
              <span class="price">
                @if($bsl->price_new == 0)
                  {!! number_format($bsl->price) !!} VNĐ
                @else
                  {!! number_format($bsl->price_new) !!} VNĐ
                @endif
              </span>
            </li>
            @endforeach
          </ul>
        </div>
        <!-- Latest Product -->  
        <div class="sidewidt">
          <h2 class="heading2"><span>Sản phẩm mới nhất</span></h2>
          <ul class="bestseller">
            @foreach($product_related as $item_product_related)
            <li>
              <img width="50" height="50" src="{!! asset('resources/upload/'.$item_product_related->image) !!}" alt="product" title="product">
              <a class="productname" href="{!! url('product-detail',[$item_product_related->id,$item_product_related->alias]) !!}">{!! $item_product_related->name !!}</a>
              <span class="procategory">{!! $item_product_related->cate_name !!}</span>
              <span class="price">
                @if($item_product_related->price_new == 0)
                  {!! number_format($item_product_related->price) !!} VNĐ
                @else
                  {!! number_format($item_product_related->price_new) !!} VNĐ
                @endif
              </span>
            </li>
            @endforeach
          </ul>
        </div>

      </aside>
      <!-- Sidebar End-->
      <!-- Category-->
      <div class="col-lg-9">          
        <!-- Category Products-->
        <section id="category">
             <!-- Sorting-->
              <div class="sorting well">
                <form class=" form-inline pull-left">
                  {{--Sort By :--}}
                  {{--<select>--}}
                    {{--<option>Mặc định</option>--}}
                    {{--<option>Tên</option>--}}
                    {{--<option>Giá</option>--}}
                    {{--<option>Đánh giá </option>--}}
                    {{--<option>Màu</option>--}}
                  {{--</select>--}}
                  {{--&nbsp;&nbsp;--}}
                  Show:
                  <select class="xxx">
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                  </select>
                </form>
                <div class="btn-group pull-right">
                  <button class="btn" id="list"><i class="icon-th-list"></i>
                  </button>
                  <button class="btn btn-orange" id="grid"><i class="icon-th icon-white"></i></button>
                </div>
              </div>
             <!-- Category-->
              <section id="categorygrid">
                <ul class="thumbnails grid">
                  @foreach($product_cate as $item_product_cate)
                  <li class="col-lg-4 col-sm-6">
                    <a class="prdocutname" href="{!! url('product-detail',[$item_product_cate->id,$item_product_cate->alias]) !!}">{!! $item_product_cate->name !!}</a>
                    <div class="thumbnail">
                      @if($item_product_cate->price_new != 0)
                      <span class="sale tooltip-test">Giảm giá</span>
                      @endif
                      <a href="{!! url('product-detail',[$item_product_cate->id,$item_product_cate->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_product_cate->image) !!}"></a>
<!--                       <div class="shortlinks">
                        <a class="details" href="#">DETAILS</a>
                        <a class="wishlist" href="#">WISHLIST</a>
                        <a class="compare" href="#">COMPARE</a>
                      </div> -->
                      <div class="pricetag">
                        @if($item_product_cate->status == 0)
                          <span class="spiral"></span><a href="{!! url('product-detail',[$item_product_cate->id,$item_product_cate->alias]) !!}" class="productcart">Thêm</a>
                        @else
                          <span class="spiral"></span><a href="{!! url('add-to-cart',[$item_product_cate->id,$item_product_cate->alias]) !!}" class="productcart">Thêm</a>
                        @endif
                        <div class="price">
                          @if($item_product_cate->price_new == 0)
                            <div class="pricenew">${!! $item_product_cate->price !!}</div>
                          @else
                            <div class="pricenew">${!! $item_product_cate->price_new !!}</div>
                            <div class="priceold">${!! $item_product_cate->price !!}</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <ul class="thumbnails list row">
                  @foreach($product_cate as $item_product_cate)
                  <li>
                    <div class="thumbnail">
                      <div class="row">
                        <div class="col-lg-4 col-sm-4">
                          @if($item_product_cate->price_new != 0)
                            <span class="sale tooltip-test"> Giảm giá</span>
                          @endif
                          <a href="{!! url('product-detail',[$item_product_cate->id,$item_product_cate->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_product_cate->image) !!}"></a>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                          <a class="prdocutname" href="{!! url('product-detail',[$item_product_cate->id,$item_product_cate->alias]) !!}">{!! $item_product_cate->name !!}</a>
                          <div class="productdiscrption">{!! $item_product_cate->intro !!}</div>
                          <div class="pricetag">
                            @if($item_product_cate->status == 0)
                              <span class="spiral"></span><a href="{!! url('product-detail',[$item_product_cate->id,$item_product_cate->alias]) !!}" class="productcart">Thêm</a>
                            @else
                              <span class="spiral"></span><a href="{!! url('add-to-cart',[$item_product_cate->id,$item_product_cate->alias]) !!}" class="productcart">Thêm</a>
                            @endif
                            <div class="price">
                              @if($item_product_cate->price_new == 0)
                                <div class="pricenew">${!! $item_product_cate->price !!}</div>
                              @else
                                <div class="pricenew">${!! $item_product_cate->price_new !!}</div>
                                <div class="priceold">${!! $item_product_cate->price !!}</div>
                              @endif
                            </div>
                          </div>
<!--                           <div class="shortlinks">
                            <a class="details" href="#">DETAILS</a>
                            <a class="wishlist" href="#">WISHLIST</a>
                            <a class="compare" href="#">COMPARE</a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <div>
                  <ul class="pagination pull-right">
                    @if($product_cate->currentPage() != 1)
                    <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1)) !!}">Trước</a></li>
                    @endif
                    @for($i = 1; $i <= $product_cate->lastPage(); $i = $i + 1)
                    <li class="{!! ($product_cate->currentPage() == $i) ? 'active' : '' !!}">
                      <a href="{!! str_replace('/?','?',$product_cate->url($i)) !!}">{!! $i !!}</a>
                    </li>
                    @endfor
                    @if($product_cate->currentPage() != $product_cate->lastPage())
                    <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1)) !!}">Sau</a></li>
                    @endif
                  </ul>
                </div>
              </section>
        </section>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <?php $a = str_replace('/?','?',$product_cate->url(1));
            $b = explode('?',$product_cate->url(1));
            $url = $b[0];
        ?>
<script type="text/javascript">
    $(document).ready(function () {
       $('.xxx').change(function () {
          var per = $('.xxx').val();
          var herf ='{{$url}}';
          console.log('{{$url}}');
           window.location.assign(herf+'?per_page='+per);
       });
    });
</script>

@endsection