<!DOCTYPE HTML>
<html>
<head>
    <title>一启乐帆天</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <!-- uc强制竖屏 -->
    <meta name="screen-orientation" content="landscape">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="landscape">

    <!--禁用手机号码链接(for iPhone)-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui" />
    <!--自适应设备宽度-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--控制全屏时顶部状态栏的外，默认白色-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="Keywords" content="">
    <meta name="Description" content="...">
    <link rel="stylesheet" type="text/css" href="/build/assets/css/main.min.css?v=4b654c5f85">
    <script type="text/javascript" src="http://pbwechat.samesamechina.com/api/v1/js/4c360e05-6e2e-465f-8583-9c247cb9465c/wechat"></script>
</head>
<body>
<?php print $type;?>
<?php print $number;?>
<div class="loading" >
    <div class="loading_con">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  <p>目前涌入的小伙伴过多<br>页面正在跳转中，请耐心等待。</p>
</div>


<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请解锁横屏浏览<br><em>建议全程在wifi环境下观看</em></div>
    </div>
</div>

<div id="dreambox">
    <div class="section show transition" id="apply">
        <!-- <div class="ticketcon">
            <div class="useway">
                <a href="javascript:void(0);" class="btn useway-1"></a>
                <a href="javascript:void(0);" class="btn useway-2"></a>
            </div> 
            <img src="/build/assets/img/apply-text.png?v=06b8ed2ca4" alt="" width="100%">
        </div>
 -->
        <div class="tickerule storerule hidden"></div>
        <div class="ticketcon">
            <a href="javascript:void(0)" class="rulelink"></a>
            <div class="tickettext">
                <img src="/build/assets/img/store_text.png?v=fe40c8d2f5" alt="" width="100%">
            </div>
            <div class="ticketcode">MG00T00000000</div>
            <img src="/build/assets/img/ticket_bg.png?v=235027cc3f" alt="" width="100%">
        </div>

        <img src="/build/assets/img/bridge.png?v=0099348449" class="bridge" alt="" width="100%">
    </div>

    <div class="warelist applywarelist">
        <div class="ware el el-1" data-depth="0.10"></div>
        <div class="ware boat boat-blue" data-depth="0.20"></div>
        <div class="ware el el-2" data-depth="0.30"></div>
        <div class="ware el el-3" data-depth="0.40"></div>
        <div class="ware el el-4" data-depth="0.40"></div>
    </div>

</div>

<script type="text/javascript" src="/build/assets/js/main.min.js?v=26260f2a99"></script>
<script type="text/javascript">
    var allimg = [
        "/build/assets/img/bg.jpg?v=73d8f4dc4c",
        "/build/assets/img/boat-1.png?v=5d7ae45abd",
        "/build/assets/img/boat-yellow.png?v=580498dea6",
        "/build/assets/img/boat-red.png?v=9d7cf6662f",
        "/build/assets/img/boat-lightblue.png?v=5270ad33e7",
        "/build/assets/img/boat-blue.png?v=c72278c622",
        "/build/assets/img/bridge.png?v=0099348449",
        "/build/assets/img/slogan.png?v=5b2bbcf0c1",
        "/build/assets/img/t-1.png?v=c069378db8",
        "/build/assets/img/ware-1.png?v=6742377a9c",
        "/build/assets/img/ware-2.png?v=79cb525801",
        "/build/assets/img/ware-3.png?v=4282944fe7"
    ], $scene = $('#scene');

    
    pfun.loadingFnDoing(allimg, function(){
        $(".loading").css({"visibility": "hidden"});
        pfun.init();

        // Setup FastClick.
        FastClick.attach(document.body);
        // $scene.parallax();
    })


    $(".rulelink").on("click", function(){
        $(".tickerule").removeClass("hidden");
    })

    $(".tickerule").on("click", function(){
        $(this).addClass("hidden");
    })

</script>

</body>
</html>