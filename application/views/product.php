

    <div class=""><a href="#"><img src="<?php if($picture): echo $picture; else:?>/img/banner_product.jpg<?php endif;?>" /></a></div>

    <div class="">
        <h1 class="subtitle">PRODUCTS<span>产品展示<span></h1>
    </div>

    <div class="mb10">
        <div class="leftbox">
            <div class="leftnav mb10">
                <ul>
                    <?php foreach($categories as $v):?>
                        <li style="font-size:14px;"><img src="/img/star.png" />
                            <?php if($v['id'] == 10):?>黄金<span>GOLD</span><?php endif;?>
                            <?php if($v['id'] == 11):?>铂金<span>PLATINUM</span><?php endif;?>
                            <?php if($v['id'] == 12):?>镶嵌<span>MOSAIC</span><?php endif;?>
                            <?php if($v['children']):?>
                                <ol>
                                <?php foreach($v['children'] as $vv):?>
                                    <li><a <?php if($both['id'] == $vv['id']):?>class="active"<?php endif;?> href="/product/index/<?php echo $vv['id'];?>"><?php echo $vv['title'];?></a></li>
                                <?php endforeach;?>
                                </ol>
                            <?php endif;?>

                        <li>
                    <?php endforeach;?>

                    <!-- <li>
                        <a href="#" class="navtitle"><img src="/img/star.png" />黄金<span>GOLD</span></a>
                        <ol>
                            <li><a href="#">囍金良缘</a></li>
                            <li><a href="#">爱尚金</a></li>
                            <li><a href="#">金枝玉叶</a></li>
                            <li><a href="#">自然精灵</a></li>
                            <li><a href="#">十二生肖</a></li>
                        </ol>
                    </li>
                    <li><a href="#" class="navtitle"><img src="/img/star.png" />铂金<span>PLATINUM</span></a>
                        <ol>
                            <li><a href="#">如愿本色系列</a></li>
                            <li><a href="#">如愿简爱系列</a></li>
                            <li><a href="#">如愿炫彩系列</a></li>
                            <li><a href="#">如愿珍爱系列</a></li>
                        </ol>
                    </li>
                    <li><a href="#" class="navtitle"><img src="/img/star.png" />镶嵌<span>MOSAIC</span></a>
                        <ol>
                            <li><a href="#">爱随心系列</a></li>
                            <li><a href="#">爱珍藏系列</a></li>
                        </ol>
                    </li> -->
                    <li><a href="#" class="navtitle"><img src="/img/star.png" />定制专区</a>
                        <ol>
                            <li><a href="#">定制案例</a></li>
                            <li><a href="#">定制流程</a></li>
                        </ol>
                    </li>
                </ul>
            </div>

<!--            <div class="mb10">-->
<!--                <a href="#"><img src="img/sub_ad_01.jpg" /></a>-->
<!--            </div>-->

            <div class="mb10">
                <img src="/img/contactus.gif" />
            </div>

        </div>

        <div class="rightbox">
            <div class="crumb mb10">
                <a href="/">首页</a> > <a href="/product">产品展示</a> > <a href="#"><?php echo $both['parent_title'];?></a> > <?php echo $both['title'];?>
            </div>

            <div class="rbmain">
 <?php if($control == 'index'):?>
                <ul>
                    <?php if($arr):foreach($arr as $v):?>
                    <li><a href="/product/view/<?php echo $v['id'];?>"><img src="<?php echo $v['thumb'];?>" /></a></li>
                    <?php endforeach; endif;?>
                </ul>

                <div class="clear"></div>
                <?php if($arr):?>
                <div class="pager">
                    <?php if($prev):?><a class="pleft" href="<?php echo $prev;?>">上一页</a><?php endif;?>
                    <?php if($next):?><a class="pright" href="<?php echo $next;?>">下一页</a><?php endif;?>
                </div>
                <?php else:?>
                    暂无数据
                <?php endif;?>

 <?php elseif($control == 'view'):?>

                <div style="text-align: center;padding:15px 0 30px;"><img src="<?php echo $product->picture;?>" /></div>

     <div class="sp_box">
         <a class="prevPage leftBtn"></a>
         <div class="scrollable">
             <div id="thumds">
                <?php foreach($arr as $v):?>
                 <div class="inner">
                     <a href='/product/view/<?php echo $v['id'];?>'>
                         <img src='<?php echo $v['thumb']; ?>' width="134" height="134" /></a></div>
                <?php endforeach;?>


             </div>
         </div>
         <a class="nextPage rightBtn"></a>
     </div>


 <?php endif;?>

                <div class="clear"></div>
            </div>

        </div>


        <div class="clear"></div>

    </div>

<script type="text/javascript" src="<?php echo site_url('js/jquery.tools.min.js');?>"></script>
<script type="text/javascript">

    $(function(){
        $("div.scrollable").scrollable({
            size: 5,
            items: '#thumds' ,
            loop: true,interval:2000,speed:500
        });

    });
</script>
