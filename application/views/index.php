
<style type="text/css">
    .effectContainer { width: 1000px; height: 470px; overflow: hidden;margin-top:24px; }
    .slide { position: relative; height: 470px; width: 953px; background: #fff;}

    /**   fadnav   **/
    div.fadenav { position: absolute; top: 445px; margin-left:460px;}
    div.fadenav a {background: url("/img/sidec.png") no-repeat scroll left top transparent;
        color: #CCCCCC;
        cursor: pointer;
        display: block;
        float: left;
        font-size: 30px;
        height: 10px;
        margin: 0 6px;
        overflow: hidden;
        width: 10px;}
    div.fadenav a:hover { text-decoration: none; }
    div.fadenav a.current {background-position: 0 -10px;}
    .effectContainer .arrow-wrapper { position: absolute; height:0px; width: 100%; top:92px;}
    .effectContainer .arrow-wrapper a { display: block; left: 29px; height: 68px; opacity: 0; filter: alpha(opacity = 0);}
    .effectContainer div.left,
    .effectContainer div.right { height: 68px; width: 29px;}
    .effectContainer div.left { float: left; padding: 100px 150px 100px 10px;}
    .effectContainer div.right { float: right; padding: 100px 10px 100px 150px;}
    .effectContainer a.left { background: url("/img/arrow_l.png") no-repeat left top;}
    .effectContainer a.right { background: url("/img/arrow_r.png") no-repeat left top;}
</style>

<script type="text/javascript">
    (function($) {
        function init() {

            $(".effectContainer").fadeTransition({pauseTime: 5000,
                transitionTime: 1000,
                ignore: null,
                delayStart: 0,
                pauseOnMouseOver: false,
                createNavButtons: true,
                arrowButton: true,
                arrowHoverShow: true
            });


        }


        $(document).ready(init);
    })(jQuery);
</script>
<div class="mb10 effectContainer">
    <div class="slide"><a href="#"><img src="img/flash01.jpg" /></a></div>
    <div class="slide"><a href="#"><img src="img/flash02.jpg" /></a></div>
    <div class="slide"><a href="#"><img src="img/flash03.jpg" /></a></div>
    <div class="slide"><a href="#"><img src="img/flash04.jpg" /></a></div>
</div>



<div class="mb10">
    <a href="/about" class="l"><img src="img/index_ad_01.jpg" /></a>
    <a href="" class="r"><img src="img/index_ad_02.jpg" /></a>
    <div class="clear"></div>
</div>





<div class="mb10">

    <div id="news">
        <div class="newsbox">
            <p class="title"><a href="news"><img src="img/index_title_01.png" /></a></p>
            <ul>
                <li>
                    <h4><a href="#">钯金I5系列首饰 解读...</a><h4>
                            <p><a href="#">——2010龙嘉珠宝携手国际钯金协会推荐款首饰闪亮登场2010国际钯金协会推荐款首饰钯金I5系列首饰闪亮登场，</a></p>
                </li>
                <li>
                    <h4><a href="#">2010龙嘉珠宝推荐款首饰...</a></h4>
                    <p><a href="#">——受经济数据和美元走高等因素的综合影响，11月16日铂金价格下跌7.49美元徘徊在每盎司1664.50美元附近，</a></p>
                </li>
            </ul>
            <a class="more" href="#"> > more...</a>
        </div>

        <div class="classbox">
            <a href="#"><img src="img/index_ad_03.jpg" /></a>
            <div class="title">
                <h3 class="l">铂金教室</h3>
                <a class="more r" href="#"> > more ...</a>
                <span class="clear"></span>
            </div>
            <ul>
                <li><a href="#">钯金与铂金及白色K金的区别</a></li>
                <li><a href="#">钯金在全球的分布</a></li>
                <li><a href="#">钯金在国际市场上的地位</a></li>
                <li><a href="#">钯金首饰有什么优点</a></li>
                <li><a href="#">如何保养钯金首饰</a></li>
            </ul>
        </div>
    </div>

    <a class="r" href="#"><img src="img/index_ad_04.jpg" /></a>

    <div class="clear"></div>
</div>