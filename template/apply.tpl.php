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
    <link rel="stylesheet" type="text/css" href="/build/assets/css/main.min.css">
    <script type="text/javascript" src="http://pbwechat.samesamechina.com/api/v1/js/4c360e05-6e2e-465f-8583-9c247cb9465c/wechat"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?16431e4327c0351ac1e096d03b6288d6";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
<div class="loading">
    <div class="loading_con">
        <div class="dotAni">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      <p>目前涌入的小伙伴过多<br>页面正在跳转中，请耐心等待。</p>
    </div>
</div>



<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请解锁竖屏浏览<br><em>建议全程在wifi环境下观看</em></div>
    </div>
</div>

<div id="dreambox">
    <div class="section show transition" id="apply">

        <?php 
            if($number){ 
                echo '<div class="tickerule rule-1 hidden"><a href="javascript:void(0);" class="close"></a></div>
                        <div class="ticketcon">
                            <a href="javascript:void(0)" class="rulelink"></a>
                            <div class="tickettext">
                                <img src="/build/assets/img/storetext-1.png" alt="" width="100%">
                            </div>
                            <div class="ticketcode"> '.$number.'</div>
                            <div class="tickettime"> '.$end.'</div>
                            <img src="/build/assets/img/ticket_bg.png" alt="" width="100%">
                        </div>'; 
            }else{
                echo '<div class="ticketcon">
                            <div class="useway">
                                <a href="javascript:void(0);" class="btn useway-1"></a>
                                <!-- <a href="javascript:void(0);" class="btn useway-2"></a> -->
                            </div> 
                            <img src="/build/assets/img/apply-text.png" alt="" width="100%">
                        </div>';
            }
        ?>


        <!-- 
 -->
        

        <img src="/build/assets/img/bridge.png" class="bridge" alt="" width="100%">
    </div>

    <div class="warelist applywarelist">
        <div class="ware el el-1" data-depth="0.10"></div>
        <div class="ware boat boat-blue" data-depth="0.20"></div>
        <div class="ware el el-2" data-depth="0.30"></div>
        <div class="ware el el-3" data-depth="0.40"></div>
        <div class="ware el el-4" data-depth="0.40"></div>
    </div>

</div>

<script type="text/javascript" src="/build/assets/js/main.min.js"></script>
<script type="text/javascript">
    var allimg = [
        "/build/assets/img/store.png",
        "/build/assets/img/tmall.png",
    ];

    
    pfun.loadingFnDoing(allimg, function(){
        $(".loading").css({"visibility": "hidden"});
        pfun.init();

        // Setup FastClick.
        FastClick.attach(document.body);
    })


    $(".rulelink").on("click", function(){
        $(".tickerule").removeClass("hidden");
    })

    // $(".tickerule").on("click", function(){
    //     $(this).addClass("hidden");
    // })



    $(".useway-1").on("click", function(){
        if($(this).hasClass("disabled")) return false;
        $(this).addClass("disabled");

        _hmt.push(['_trackEvent', 'btn', 'TMALL']);

        pfun.ajaxFun("POST", "/api/apply", {"type": "1"}, "json", function(data){
            if(data.status == "1"){
                location.reload();
            }
            $(".useway-1").removeClass("disabled");
        });
    })

    // $(".useway-2").on("click", function(){
    //     if($(this).hasClass("disabled")) return false;
    //     $(this).addClass("disabled");

    //     _hmt.push(['_trackEvent', 'btn', 'STORE']);

    //     pfun.ajaxFun("POST", "/api/apply", {"type": "2"}, "json", function(data){
    //         if(data.status == "1"){
    //             location.reload();
    //         }
    //         $(".useway-2").removeClass("disabled");
    //     });
    // })


</script>

</body>
</html>