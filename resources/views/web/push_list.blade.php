<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{$title}}-朋友推</title>
    <!--设置视口-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-sclable=0">
    <!-- 设置主题样式-->
    <link rel="stylesheet" href="/web/lib/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- 引入字体样式-->
    <link rel="stylesheet" href="/web/lib/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/css/com.css"/>
    <link rel="stylesheet" href="/web/css/choiceness.css"/>


</head>
<body>
<!--头部-->
<div class="container-fluid">
    @include('web.layouts.header')

    <!--搜索导航栏-->
    @include('web.layouts.search')

    <!--导航-->
    @include('web.layouts.navigation')

    <!--主题部分-->
    <seation class="pyt-seation container-fluid">


        <div class="row  container">
            <!-- 中心内容-->
            <!--图片-->

            <div class="img_door">
                <img src="/web/images/push_banner.png" alt="...">
            </div>


            @if($active['active_column_code']!='meishijingxuan' && $active['active_column_code']!='jiajujingxuan')
                <div class="prod_type_box ">
                    <p class="prod_type">商品分类：</p>
                    <ul class="prod_type_list margin_left4">
                        <a href="{{url('/columns/'.$active['active_column_code'].'/goods')}}" class="click_open">
                            <li class="@if($active['active_category']=='') active @endif">全部</li>
                        </a>
                        @foreach($categorys as $v)
                            <a href="{{url('/columns/'.$active['active_column_code'].'/goods').'?category='.$v->id}}"  class="click_open">
                                <li class="@if($active['active_category']==$v->id) active @endif">{{$v->name}}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="prod_type_box line_30">
                <form method="get" action="{{url('/columns/'.$active['active_column_code'].'/goods')}}">
                    {{csrf_field()}}
                    <p class="prod_type">高级筛选：</p>

                    <div class="scree_box">
                        <ul class="prod_type_list margin_right">
                            <li><input type="checkbox" name="today" value="1"/>今日新品</li>
                            <li><input type="checkbox" name="isTmall" value="1"/>只看天猫</li>
                            <li><input type="checkbox" name="isJpseller" value="1"/>金牌卖家</li>
                            <li><input type="checkbox" name="isQjd" value="1"/>旗舰店</li>
                            <li><input type="checkbox" name="isTaoqianggou" value="1"/>淘抢购</li>
                            <li><input type="checkbox" name="isJuhuashuan" value="1"/> 聚划算</li>
                            <li><input type="checkbox" name="isNine" value="1"/>9.9包邮</li>
                            <li><input type="checkbox" name="isTwenty" value="1"/>20元封顶</li>
                            <li><input type="checkbox" name="isJyj" value="1"/>极有家</li>
                            <li><input type="checkbox" name="isHaitao" value="1"/>淘淘</li>
                            <li><input type="checkbox" name="isYfx" value="1"/>运费险</li>

                        </ul>
                        <div class="section">
                            <p class="section_title">
                                <span>券区间</span>
                                <input type="text" name="minCouponPrice" placeholder="￥">-<input type="text"
                                                                                                 name="maxCouponPrice"
                                                                                                 placeholder="￥">
                            </p>

                            <p class="section_title">
                                <span>价格</span>
                                <input type="text" name="minPrice" placeholder="￥">-<input type="text" name="maxPrice"
                                                                                           placeholder="￥">
                            </p>

                            <p class="section_title">
                                <span>佣金比例></span>
                                <input type="text" name="minCommission" placeholder="￥">
                            </p>

                            <p class="section_title">
                                <span>销量></span>
                                <input type="text" name="minSellNum" placeholder="￥">
                            </p>

                            <p class="section_title">
                                <button type="button screen-btn">筛选</button>
                            </p>

                        </div>
                    </div>
                </form>
            </div>
            <div class="clear"></div>


            <!--商品列表-->
            <div class="pro_list">
                <div class="tab_nav">
                    <a href="{{url('/columns/'.$active['active_column_code'].'/goods')}}"  class="click_open">
                        <span class=" @if($active['active_sort']=='') tab_nav_active @endif">综合</span>
                    </a>
                    <a href="{{url('/columns/'.$active['active_column_code'].'/goods').'?sort=2'}}"  class="click_open">
                        <span class=" @if($active['active_sort']==2) tab_nav_active @endif">最新</span>
                    </a>
                    <a href="{{url('/columns/'.$active['active_column_code'].'/goods').'?sort=3'}}"  class="click_open">
                        <span class=" @if($active['active_sort']==3) tab_nav_active @endif">销量</span>
                    </a>
                    <a href="{{url('/columns/'.$active['active_column_code'].'/goods').'?sort=1'}}"  class="click_open">
                        <span class=" @if($active['active_sort']==1) tab_nav_active @endif">人气</span>
                    </a>
                    <a href="{{url('/columns/'.$active['active_column_code'].'/goods').'?sort=-4'}}" class="click_open">
                        <span class=" @if($active['active_sort']==-4) tab_nav_active @endif">价格</span>
                    </a>
                </div>
                @foreach($list as $k => $v)

                    <div class="single">
                        <a href="{{url('/goods/'. $v['id']).'?columnCode='.$active['active_column_code']}}"
                           target="_blank" >
                            <img src="{{ $v['pic'] }}" alt="..." class="img_size">
                        </a>

                        <div class="price_introduce">
                            <p class="title">
                                <a href="{{url('/goods/'. $v['id']).'?columnCode='.$active['active_column_code']}}"
                                   target="_blank"  class="click_open">
                                    {{str_limit($v['short_title'], $limit = 24, $end = '...')}}
                                </a>
                            </p>

                            <p class="discount"><span class="coupun">券</span> {{ $v['coupon_price']}}元</p>

                            <p class="mouth_num">月销：<span>{{ $v['sell_num'] }}</span></p>

                            <p class="coupon_back">
                                <span class="small_word small_color">券后:</span><span
                                        class="small_word">￥</span><span>{{ $v['price'] }}</span>
                            </p>

                            <p class="commission">
                                <span class="small_word small_color">佣金:</span><span
                                        class="small_word">￥</span><span>{{ $v['commission_finally'] }}</span>
                            </p>
                            <!--商品所属图标-->
                            <p class="log_pro">
                                @if ($v['is_tmall'] !== 0)
                                    <img src="/web/images/tmail.png" alt="天猫"/>
                                @else
                                    <img src="/web/images/taobao.png" alt="淘宝"/>
                                @endif
                            </p>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </seation>
    <div class="clear"></div>
    <!--页脚-->
    @include('web.layouts.footer')

</div>
</body>
<script src="/web/lib/jquery/dist/jquery.js"></script>
<scrpit src="/web/lib/bootstrap/dist/js/bootstrap.min.js"></scrpit>
<script>
    <!-- 头部登录下拉菜单-->
    $(".dropdown-toggle").on("click", function () {
        $(".dropdown-menu").slideToggle()
    });
    //提交表单事件


</script>
</html>