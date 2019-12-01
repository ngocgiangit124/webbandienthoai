<section class="slider">
  <div class="container">
    <div class="flexslider" id="mainslider">
      <ul class="slides">
        @foreach($banners as $banner)
        <li>
          <img src="{{$banner['photo']}}" alt="" />
        </li>
        @endforeach
        {{--<li>--}}
          {{--<img src="{!! url('public/user/img/banner11.jpg') !!}" alt="" />--}}
        {{--</li>--}}
        {{--<li>--}}
          {{--<img src="{!! url('public/user/img/banner3.jpg') !!}" alt="" />--}}
        {{--</li>--}}
        {{--<li>--}}
          {{--<img src="{!! url('public/user/img/banner3.jpg') !!}" alt="" />--}}
        {{--</li>--}}
      </ul>
    </div>
  </div>
</section>