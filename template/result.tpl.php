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
    <script type="text/javascript" src="http://pbwechat.samesamechina.com/api/v1/js/4c360e05-6e2e-465f-8583-9c247cb9465c/wechat?debug=true"></script>
</head>
<body data-ismy="<?php print $ismy;?>" data-friends="<?php print json_encode($friends);?>">
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

<?php
    echo $count = count($friends);
    $friends = json_encode($friends);
    
?>

<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请解锁横屏浏览<br><em>建议全程在wifi环境下观看</em></div>
    </div>
</div>


<?php
    if($ismy){
        echo '<div class="shareTips hidden"></div>
            <div class="qrcode hidden">
                <img src="/build/assets/img/qrcode.png" alt="" width="100%">
            </div>';
    }
?> 

<div id="dreambox">
    <div class="section" id="result">
        <div class="stepgo stepgo-3">
            <div class="lave">
                <img src="/build/assets/img/lave-0.png" width="100%" alt="">
            </div>

            <div class="footerArea">
                <?php
                    if($ismy){
                        echo '<a href="javascript:void(0);" class="btn iadd"></a><img src="/build/assets/img/iadd.png" width="100%">';
                    }else{
                        echo '<a href="javascript:void(0);" class="btn tadd"></a><a href="javascript:void(0);" class="btn iplay"></a><img src="/build/assets/img/hyBtn.png" width="100%">';
                    }
                ?>  
            </div>
        </div>
    </div>


    <div class="warelist">
        <div class="ware el lighthouse"></div>
        <div class="ware el r_ware_8"></div>
        <div class="ware boat boat-blue"></div>
        <div class="ware el r_ware_7"></div>

        <div class="ware el money"></div>

        <!-- 3/3 -->
        <div class="ware el boatstep4">
            <div class="r_boat">
                <p><?php print $name;?></p>
                <img src="/build/assets/img/r_boat_<?php print $color;?>.png" width="100%" alt="">
            </div>
        </div>

        <div class="ware el r_ware_6"></div>

        <div class="ware el ball-2"></div>

        <div class="ware el r_ware_5"></div>

        <div class="ware el ball-1"></div>

        <!-- 2/3 -->
        <!-- <div class="ware el boatstep3">
            <div class="r_boat">
                <span><img src="/build/assets/img/jiasu.png" width="100%" alt=""></span>
                <p>友谊的小船</p>
                <img src="/build/assets/img/r_boat_yellw.png" width="100%" alt="">
            </div>
        </div> -->

        <div class="ware el r_ware_4"></div>

        <!-- 1/3 -->
        <!-- <div class="ware el boatstep2">
            <div class="r_boat">
                <span><img src="/build/assets/img/jiasu.png" width="100%" alt=""></span>
                <p>友谊的小船</p>
                <img src="/build/assets/img/r_boat_yellw.png" width="100%" alt="">
            </div>
        </div> -->

        <div class="ware el r_ware_3"></div>
    
        <div class="ware el ancla"></div>

        <div class="ware el r_ware_2"></div>
        <!-- 0/3 -->
        <!-- <div class="ware el boatstep1">
            <div class="r_boat">
                <p>友谊的小船</p>
                <img src="/build/assets/img/r_boat_yellw.png" width="100%" alt="">
            </div>
        </div> -->
        <div class="ware el r_ware_1"></div>
    </div>

</div>

<script type="text/javascript" src="/build/assets/js/main.min.js"></script>
<script type="text/javascript">
    var allimg = [
        "/build/assets/img/bg.jpg",
        "/build/assets/img/ware-1.png",
        "/build/assets/img/ware-2.png",
        "/build/assets/img/ware-3.png"
    ];

    shareArr["_title"] = "Petit Bateau丨快来帮我的小船加速吧！";
    shareArr["_desc"] = "Petit Bateau丨快来帮我的小船加速吧！";
    shareArr["_desc_friend"] = "Petit Bateau丨快来帮我的小船加速吧！";
    shareArr["_link"] = window.location.href;


    pfun.loadingFnDoing(allimg, function(){
        $(".loading").css({"visibility": "hidden"});

        _v.sectionChange("result");
        pfun.init();

        // Setup FastClick.
        FastClick.attach(document.body);
        // $scene.parallax();
    })


    $(".iadd").on("click", function(){
        $(".shareTips").removeClass("hidden");
    })

    $(".shareTips").on("click", function(){
        $(this).addClass("hidden");
    })
    


</script>

</body>
</html>