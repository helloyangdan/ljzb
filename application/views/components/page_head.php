<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>深圳龙嘉珠宝</title>
    <meta name="keywords" content="深圳市龙嘉珠宝实业有限公司|黄金生产销售、铂金生产销售、钯金生产销售" />
    <meta name="description" content="深圳市龙嘉珠宝实业有限公司-珠宝首饰产品设计开发、生产加工、批发销售为一体的独立法人企业" />
    <link href="<?php echo site_url();?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo site_url();?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url();?>js/fade-plugin.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#navi a").hover(
                function(){
                    $(this).addClass("hover");
                },
                function(){
                    $(this).removeClass("hover");
                }

            );

        });
    </script>
</head>

<body>

<div id="header">
    <a id="logo" href="/"><img src="/img/logo.png" /></a>
    <ul id="navi">
        <li><a <?php if($nav == 'index'): echo 'class="active"'; endif?> href="/"><p>HOME</p><span>首页</span></a></li>
        <li><a <?php if($nav == 'about'): echo 'class="active"'; endif?> href="/about"><p>ABOUT US</p><span>关于我们</span></a></li>
        <li><a <?php if($nav == 'news'): echo 'class="active"'; endif?> href="/news"><p>NEWS</p><span>新闻中心</span></a></li>
        <li><a <?php if($nav == 'product'): echo 'class="active"';  endif?> href="/product"><p>PRODUCT</p><span>产品展示</span></a></li>
        <li><a <?php if($nav == 'recruitment'): echo 'class="active"'; endif?> style="width:120px" href="/recruitment"><p>RECRUITMENT</p><span>人才招聘</span></a></li>
        <li><a <?php if($nav == 'service'): echo 'class="active"'; endif?> href="/service"><p>SERVICE</p><span>服务中心</span></a></li>
        <li><a <?php if($nav == 'contact'): echo 'class="active"'; endif?> class="last" href="/contact"><p>CONTACT</p><span>联系我们</span></a></li>

    </ul>
</div>
