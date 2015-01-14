
<script type="text/javascript">
    $(function(){
        $(".about a").click(function(){
            $(".about a").removeClass("hover");
            $(this).addClass("hover");
        });
    });
</script>
<div class="mb10"><a href="#"><img src="/img/banner_product.jpg" /></a></div>

<div class="mb10">
    <h1 class="subtitle">NEWS<span>新闻中心<span></h1>
</div>

<div class="mb10">
    <div class="leftbox">
        <div class="leftnav mb10">
            <ul class="about">
                <li><a <?php if($id==2):?>class="hover"<?php endif;?> href="/news/index/2">龙嘉新闻</a></li>
                <li class="last"><a <?php if($id==3):?>class="hover"<?php endif;?>  href="/news/index/3">业界消息</a></li>
            </ul>
        </div>

        <div class="mb10">
            <a href="#"><img src="/img/sub_ad_01.jpg" /></a>
        </div>

        <div class="mb10 leftcontact">
            <h1>联系我们</h1>
            <h2>CONTACT US</h2>
            <h3>86-755-88852929</h3>
            <h4>E-mail:service@szlongjia.com</h4>
            <h5>深圳市龙嘉珠宝实业有限公司</h5>
        </div>

    </div>

    <div class="rightbox">
        <div class="crumb mb10">
            <a href="#">首页</a> > <a href="/news">新闻中心</a> >
            <?php
            if(isset($category_name)):echo $category_name;endif;
            if(isset($article)):?>
            <a href="/news/index/<?php echo $article['category'];?>"><?php echo $article['category_title'];?></a> > <?php echo $article['title'];?>
            <?php
            endif;
            ?>
        </div>

        <div class="clear"></div>


        <div class="rbmain news_pt">
<?php if($control == 'index'):?>

            <div class="cont_box">
                <dl class="news_ls">
                <?php if($arr):foreach($arr as $v):?>
                    <dd>
                        <a href="/news/view/<?php echo $v['id'];?>">
                            <img src="/<?php echo $v['thumb'];?>" width="118" height="37"><p>
                                <?php echo $v['title'];?>
                            </p>
                            <span>HOT:<?php echo $v['click'];?></span><span><?php echo date('Y/m/d', strtotime($v['pubdate']));?></span></a>

                    </dd>
                <?php endforeach;?>
                <?php else:?>
                    暂无新闻
                <?php endif;?>

                </dl>
            </div>

            <?php echo $page;?>

<?php elseif($control == 'view'):?>

    <div class="deta_box">
        <h3>
            <p><?php echo $article['title'];?></p>
            <span class="a">HOT:<?php echo $article['click'];?></span><span class="b">[<?php echo $article['pubdate'];?>]</span></h3>
            <?php echo $article['body'];?>

    </div>

<?php endif;?>


            <div class="clear"></div>
        </div>

    </div>


    <div class="clear"></div>

</div>

