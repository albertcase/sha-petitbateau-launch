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
</head>
<body>
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
    <div class="section" id="index">
        <div class="slogan">
            <img src="/build/assets/img/slogan.png" alt="" width="100%">
        </div>

        <div class="btnArea">
            <a href="javascript:void(0);" class="btn startBtn"></a>
            <img src="/build/assets/img/t-1.png" alt="" width="100%">
        </div>

        <img src="/build/assets/img/bridge.png" class="bridge" alt="" width="100%">
    </div>

    <div class="section" id="step1">
        <div class="stepgo stepgo-1">
            <div class="step1-t1">
                <input type="text" name="username" class="username" value="<?php print $nickname;?>" placeholder="您的昵称">
                <img src="/build/assets/img/step-1-text-01.png" alt="" width="100%">
            </div>
            <div class="step1-t2">
                <ul class="colorlist">
                    <li class="yellow" data-val="yellow"></li>
                    <li class="red" data-val="red"></li>
                    <li class="lightblue" data-val="lightblue"></li>
                    <li class="blue hover" data-val="blue"></li>
                </ul>
                <a href="javascript:void(0);" class="btn createBtn"></a>
                <img src="/build/assets/img/step-1-text-02.png" alt="" width="100%">
            </div>
        </div>
    </div>


    <div class="section" id="step2">
        <div class="stepgo stepgo-2">
            <div class="step1-t1">
                <input type="text" name="username" value="<?php print $nickname;?>" class="confirm" readonly>
                <img src="/build/assets/img/step-2-text-01.png" alt="" width="100%">
            </div>
            <div class="step1-t2">
                <a href="javascript:void(0);" class="btn goBtn"></a>
                <img src="/build/assets/img/step-2-text-02.png" alt="" width="100%">
            </div>
        </div>
    </div>

    <div class="warelist">
        <div class="ware el el-1"></div>
        <div class="ware boat boat-blue"></div>
        <div class="ware el el-2"></div>
        <div class="ware el el-3"></div>
        <div class="ware el el-4"></div>
    </div>

</div>
<script type="text/javascript" src="/build/assets/js/main.min.js"></script>
<script type="text/javascript">
    var allimg = [
        "/build/assets/img/bg.jpg",
        "/build/assets/img/boat-1.png",
        "/build/assets/img/boat-yellow.png",
        "/build/assets/img/boat-red.png",
        "/build/assets/img/boat-lightblue.png",
        "/build/assets/img/boat-blue.png",
        "/build/assets/img/bridge.png",
        "/build/assets/img/slogan.png",
        "/build/assets/img/t-1.png",
        "/build/assets/img/ware-1.png",
        "/build/assets/img/ware-2.png",
        "/build/assets/img/ware-3.png"
    ], createInfo = {
        "name": "",
        "color": ""
    };

    
    pfun.loadingFnDoing(allimg, function(){
        $(".loading").css({"visibility": "hidden"});
        _v.sectionChange("index");
        pfun.init();

        // Setup FastClick.
        FastClick.attach(document.body);
    })



    $(".colorlist li").on("click", function(){
        if($(this).hasClass("hover")) return false;
        var curClass = $(this).attr("class");
        $(".colorlist li").removeClass("hover");
        $(this).addClass("hover");
        $(".boat").attr("class", "ware boat boat-" + curClass);
    })


    $(".startBtn").on("click", function(){
        _v.sectionChange("step1");
    })

    $(".createBtn").on("click", function(){
        createInfo["name"] = $(".username").val();
        createInfo["color"] = $(".colorlist li.hover").attr("data-val");

        if(!createInfo["name"] || !createInfo["color"]){
            pfun.formErrorTips("创建信息有误!");
        }else{
            // console.log("创建成功！");
            $(".confirm").val(createInfo["name"]);
            _v.sectionChange("step2");
        }
    })


    $(".goBtn").on("click", function(){
        if($(this).hasClass("disabled")) return false;
        $(this).addClass("disabled");
        pfun.ajaxFun("POST", "/api/submit", createInfo, "json", function(){
            if(data.status = 1){
                location.href = "/result?id=" + data.msg;
            } 
            $(".goBtn").removeClass("disabled");
        });
    })
    


</script>

</body>
</html>