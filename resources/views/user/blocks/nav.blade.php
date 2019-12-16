<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a class="active"  href="{{ url('/index')}}">Trang chủ</a></li>
            <?php
                $menu_level_1 = DB::table('categories')->where('parent_id',0)->get();
            ?>
            @foreach($menu_level_1 as $item_level_1)
            <li><a class=""  href="{!! URL('product-cate-parent',[$item_level_1->id,$item_level_1->alias]) !!}"><i><img style="height: 22px; margin-right: 3px" src="{!! asset('resources/upload/'.$item_level_1->icon) !!}" alt=""></i>{!! $item_level_1->name !!}</a>
                <div>
                    <ul>
                        <?php
                            $menu_level_2 = DB::table('categories')->where('parent_id',$item_level_1->id)->get();
                         ?>
                        @foreach($menu_level_2 as $item_level_2)
                        <li><a href="{!! URL('product-cate',[$item_level_2->id,$item_level_2->alias]) !!}">{!! $item_level_2->name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
            <li><a class=""  href="{{ url('contact')}}">Kết nối</a></li>
        </ul>
    </nav>
</div>