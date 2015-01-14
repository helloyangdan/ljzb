
<script type="text/javascript">
    $(function(){
        $(".about a").click(function(){
            $(".about a").removeClass("hover");
            $(this).addClass("hover");
        });
    });
</script>
<div class=""><a href="#"><img src="/img/banner_product.jpg" /></a></div>

<div class="">
    <h1 class="subtitle">RECRUITMENT<span>人才招聘<span></h1>
</div>

<div class="mb10">
    <div class="leftbox">
        <div class="leftnav mb10">
            <ul class="about">
                <li><a <?php if($id==5):?>class="hover"<?php endif;?>  href="/recruitment/index/5">生产类</a></li>
                <li><a <?php if($id==6):?>class="hover"<?php endif;?>  href="/recruitment/index/6">设计类</a></li>
                <li><a <?php if($id==7):?>class="hover"<?php endif;?>  href="/recruitment/index/7">综合类</a></li>
                <li class="last"><a <?php if($id==8):?>class="hover"<?php endif;?>  href="/recruitment/index/8">销售类</a></li>
            </ul>
        </div>

        <div class="mb10">
            <a href="#"><img src="/img/sub_ad_01.jpg" /></a>
        </div>

        <div class="mb10">
            <img src="/img/contactus.gif" />
        </div>

    </div>

    <div class="rightbox">
        <div class="crumb mb10">
            <a href="/">首页</a> > <a href="/recruitment"> 人才招聘</a> >
            <?php
            if(isset($category_name)):echo $category_name;endif;
            if(isset($article)):?>
                <a href="/recruitment/index/<?php echo $article['category'];?>"><?php echo $article['category_title'];?></a> > <?php echo $article['title'];?>
            <?php
            endif;
            ?>
        </div>

        <div class="clear"></div>


        <div class="rbmain news_pt">
<?php if($control == 'index'):?>

            <div class="cont_box">
                <dl class="re_ls">
    <?php if($arr):foreach($arr as $v):?>
                    <dd>
                        <a href="/recruitment/view/<?php echo $v['id'];?>">
                            <p><?php echo $v['title'];?></p>
                            <span>HOT:<?php echo $v['click'];?></span><span><?php echo date('Y/m/d', strtotime($v['pubdate']));?></span></a>
                        </a></dd>

    <?php endforeach;?>
    <?php else:?>
        暂无招聘
    <?php endif;?>
                </dl>
            </div>

            <div class="clear"></div>

<?php elseif($control == 'view'):?>

            <div class="deta_box">
                <h3>
                    <p><?php echo $article['title'];?></p>
                    <span class="a">HOT:<?php echo $article['click'];?></span><span class="b">[<?php echo $article['pubdate'];?>]</span></h3>
                <?php echo $article['body'];?>

            </div>

<?php endif;?>

        </div>

    </div>


    <div class="clear"></div>

</div>

