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
<body data-ismy="<?php print $ismy;?>" data-countf="<?php print $row;?>" data-count="<?php print $boat;?>" data-subscribe="<?php print $subscribe;?>">
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


<?php
    if($ismy){
        echo '<div class="shareTips hidden"></div>';
        if($subscribe==0){
            echo '<div class="qrcode hidden"><img src="/build/assets/img/qrcode.png" alt="" width="100%"></div>';
        }
    }
?> 

<div class="jiasuTips hidden">
    <a href="javascript:void(0);" class="close"></a>
</div>


<div id="dreambox">
    <div class="section" id="result">
            <?php
                if($ismy){
                    
                        echo '<a href="javascript:void(0);" class="applyhb"></a>';
                  
                }
            ?>  

            
            <?php 
                if($ismy){ 
                    echo '<div class="stepgo stepgo-3">'; 
                }else{
                    echo '<div class="stepgo">';
                }
            ?>
            <div class="lave">
                <img src="/build/assets/img/lave-<?php print $boat;?>.png" width="100%" alt="">
            </div>

            <div class="footerArea">
                <?php
                    if($ismy){
                        if($boat == 3){
                            echo '<a href="javascript:void(0);" class="btn applyBtn"></a><img src="/build/assets/img/apply.png" width="100%">';
                        }else{
                            echo '<a href="javascript:void(0);" class="btn iadd"></a><img src="/build/assets/img/iadd.png" width="100%">';
                        }
                    }else{
                        if($boat == 3){
                            echo '<a href="/" class="btn applyFriend"></a><img src="/build/assets/img/apply_friend.png" width="100%">';
                        }else{
                            echo '<a href="javascript:void(0);" class="btn tadd"></a><a href="/" class="btn iplay"></a><img src="/build/assets/img/hyBtn.png" width="100%">';
                        }   
                    }
                ?>  
            </div>
        </div>
    </div>


    <div class="warelist">
        <div class="ware el lighthouse"></div>
        <div class="ware el r_ware_8"></div>
        <div class="ware el r_ware_7"></div>

        <div class="ware el r_ware_6"></div>

        <div class="ware el r_ware_5"></div>

        <div class="ware el r_ware_4"></div>

        <div class="ware el r_ware_3"></div>

        <div class="ware el r_ware_2"></div>

        <div class="ware el r_ware_1"></div>

        <?php 
            if($ismy){ 
                if($boat == 3){ 
                    echo '<div class="ware el money-2"></div>'; 
                }else{
                    echo '<div class="ware el money"></div>';
                }
            }else{
                echo '<div class="ware el money"></div>';
            }
        ?>
        
        <div class="ware el ancla"></div>

        <div class="ware el ball-1"></div>

        <div class="ware el ball-2"></div>

        <!-- 0/3 -->
        <div class="ware el boatele boatstep<?php print $boat;?>">
            <div class="r_boat animove<?php print $boat;?>-in">
                <?php 
                    if($boat >= 1 && $boat < 3){ 
                        echo '<span class="jiasu"><img src="/build/assets/img/jiasu.png" width="100%" alt=""></span>'; 
                    }
                ?>
                <p><?php print $name;?></p>
                <img src="/build/assets/img/r_boat_<?php print $color;?>.png" width="100%" alt="">
            </div>
        </div>

    </div>

</div>

<?php if ($boat!=0 && $ismy) {
?>
<marquee direction="left" behavior="scroll">
    <p>
    <?php 

        foreach ($friends as $key => $value) {
            if ($key < 3)
            echo '<span>'.$value['nickname'].' 刚刚给你加速</span>';
        }      
    ?>
    </p>
</marquee>
<?php } ?>



<script type="text/javascript" src="/build/assets/js/main.min.js"></script>
<script type="text/javascript">
    var allimg = [
        "/build/assets/img/r_ware_1.png",
        "/build/assets/img/r_ware_2.png",
        "/build/assets/img/r_ware_3.png",
        "/build/assets/img/r_ware_4.png",
        "/build/assets/img/r_ware_5.png",
        "/build/assets/img/r_ware_6.png",
        "/build/assets/img/r_ware_7.png",
        "/build/assets/img/r_ware_8.png",
    ],_createId = pfun.getQueryString("id");

    shareArr["_title"] = "Petit Bateau丨快来帮我的小船加速吧！";
    shareArr["_desc"] = "Petit Bateau丨快来帮我的小船加速吧！";
    shareArr["_desc_friend"] = "一起出发，畅游快乐的海洋！";
    shareArr["_link"] = window.location.href;


    pfun.loadingFnDoing(allimg, function(){
        $(".loading").css({"visibility": "hidden"});

        _v.sectionChange("result");
        pfun.init();
        $(".r_boat").addClass("moveAnimate");
        $(".ware").addClass("moveAnimate");
        // Setup FastClick.
        FastClick.attach(document.body);
        // $scene.parallax();
    })


    $(".iadd").on("click", function(){
        _hmt.push(['_trackEvent', 'btn', 'SPEED']);
        $(".shareTips").removeClass("hidden");
    })

    $(".shareTips").on("click", function(){
        $(this).addClass("hidden");
    })


    $(".tadd").on("click", function(){
        if($(this).hasClass("disabled")) return false;
        $(this).addClass("disabled");
        _hmt.push(['_trackEvent', 'btn', 'likes']);
        pfun.ajaxFun("POST", "/api/like", {"id": _createId}, "json", function(data){
            if(data.status == "1"){
                // pfun.formErrorTips("加速成功!");

                $(".jiasuTips").removeClass("hidden");

                if($(".jiasu").length > 0){
                    $(".jiasu").hide();
                }
                
                if($(".boatele").hasClass("boatstep0")){
                    $(".r_boat").addClass("animove0-out");
                }else if($(".boatele").hasClass("boatstep1")){
                    $(".r_boat").addClass("animove1-out");
                }else if($(".boatele").hasClass("boatstep2")){
                    $(".r_boat").addClass("animove2-out");
                }else{
                    $(".r_boat").addClass("animove3-out");
                }

            }else{
                pfun.formErrorTips("无法加速!");
            }
            $(".tadd").removeClass("disabled");
        });


    })
    

    $(".r_boat").bind("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){
        if($(this).hasClass("animove0-out") || $(this).hasClass("animove1-out") || $(this).hasClass("animove2-out") || $(this).hasClass("animove3-out")){

            location.reload();
        }
    });

    $(".applyhb").on("click", function(){
        _hmt.push(['_trackEvent', 'btn', 'RECIEVECOUPON红包']);
        if($("body").attr("data-count") == 3){
            if($(".qrcode").length > 0){
                $(".qrcode").removeClass("hidden");
            }else{
                location.href = "/apply";
            } 
        }else{
            if($("body").attr("data-ismy") == 1){
                $(".shareTips").removeClass("hidden");
            }
        }
    })

    $(".applyBtn").on("click", function(){
        _hmt.push(['_trackEvent', 'btn', 'RECIEVECOUPON']);

        if($(".qrcode").length > 0){
            $(".qrcode").removeClass("hidden");
        }else{
            location.href = "/apply";
        } 
    })


    $(".iplay").on("click", function(){
        _hmt.push(['_trackEvent', 'btn', 'PLAY2']);
    })
    

    $(".applyFriend").on("click", function(){
        _hmt.push(['_trackEvent', 'btn', 'PLAY3']);
    })

    $(".close").on("click", function(){
        if(!$(this).parent("div").hasClass("hidden")){
            $(this).parent("div").addClass("hidden");
        };
    })


</script>

</body>
</html>