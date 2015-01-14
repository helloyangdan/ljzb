
<script type="text/javascript">
    $(function(){
        $(".about a").click(function(){
            $(".about a").removeClass("hover");
            $(this).addClass("hover");
        });
    });
</script>
<div class="mb10"><a href="#"><img src="img/banner_product.jpg" /></a></div>

<div class="mb10">
    <h1 class="subtitle">ABOUT US<span>关于我们<span></h1>
</div>

<div class="mb10">
    <div class="leftbox">
        <div class="leftnav mb10">
            <ul class="about">
                <li><a href="/about#jj" <?php if(!empty($about)): echo 'class="hover"';endif?>>公司简介</a></li>
                <li><a href="/about#ry">公司荣誉</a></li>
                <li><a href="/about#wh">龙嘉文化</a></li>
                <li class="last" href="/sale"><a href="/sale" <?php if(!empty($sale)): echo 'class="hover"';endif?>>营销网络</a></li>
            </ul>
        </div>

        <div class="mb10">
            <a href="#"><img src="img/sub_ad_01.jpg" /></a>
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
            <a href="#">首页</a> > 关于我们
        </div>

        <div class="clear"></div>


        <div class="rbmain about_pt">

            <?php if(!empty($sale)):?>
                <div class="title-t">
                    <div class="title_w">
                        <div class="title_i">
                            <h2 class="ti">
                                营销网络</h2>
                            <img src="/img/bg/mar.gif"></div>
                    </div>
                    <div class="clean">
                    </div>
                </div>

                <div class="mar">
                </div>
            <?php else:?>
            <div class="title-t">
                <div class="title_w">
                    <div class="title_i">
                        <h2 class="ti">
                            公司简介</h2>
                        <img src="/img/bg/in.gif"></div>
                </div>

                <div class="clean"></div>
            </div>

            <div class="fst_box">
                <a name="jj" id="jj"></a>
                <img src="/img/bg/pic_1.jpg">
                <p>
                    深圳市龙嘉珠宝实业有限公司成立于1997年（深圳市龙嘉首饰有限公司成立于2006年），是集珠宝首饰产品设计开发、生产加工、批发销售为一体的独立法人企业。公司总部位于深圳市盐田区沙头角，东傍美丽的海滨旅游休闲胜地大小梅沙，南临举世闻名的中英街，西通深圳市政中心、深圳机场，北依风光旖旎的梧桐山麓，仿如嵌在东海湾畔一颗璀璨夺目的明珠。</p>
                <p>
                    公司自成立以来，凭借十多年的发展经验，有着坚实的创业基础，雄厚的经济实力。先后引进了意大利、德国、日本等世界最先进的首饰生产加工设备和精湛的工艺技术，经营范围已经扩大到黄金、铂金、钯金的生产销售一条龙系列首饰品。龙嘉拥有大批技术精湛的专业人才和一支优秀的现代化管理团队，并拥有现代化大型工业厂房两幢，面积达18600平米，配套了约9000平米的员工宿舍，是中国大型珠宝首饰企业代表之一。而作为珠宝首饰文化传播的使者，龙嘉公司坚持以市场为导向，以客户需求为目标，全心致力打造中国首饰行业的名牌企业。</p>
            </div>

            <div class="title_w">
                <div class="title_i">
                    <h2 class="ti">
                        公司荣誉</h2>
                    <img src="/img/bg/ho.gif"></div>
            </div>

            <div class="scd_box">
                <a name="ry" id="ry"></a>
                <p>
                    公司于2005年成为ISO9000质量管理体系认证单位，并以ISO质量管理体系正常运行，持续改进对产品质量的要求。自成立以来，先后取得以下荣誉：<br>
                    成为中国宝玉石协会常务理事会“单位会员”；<br>
                    被中国宝玉石协会评为“中国珠宝首饰业驰名品牌”；<br>
                    成为国家金银制品质量监督检验中心“定点单位”；<br>
                    获得国际标准质量委员会颁发“采用国际标准产品标志证书”；<br>
                    获得广东省质量技术监督局授予“采用国际标准产品认可证书”；<br>
                    成为深圳市珠宝首饰行业协会“常务理事单位”；<br>
                    成为深圳市盐田区安全生产协会“会员单位”；<br>
                    成为上海黄金交易所会员；<br>
                    2003年被深圳市工商行政管理局市私营企业协会评为“诚信守法经营优秀私营企业”；<br>
                    2005年被深圳市劳动和社会保障局、深圳市总工会、市企业家协会评为“深圳市百家和谐劳动关系先进企业”；<br>
                    2006年被深圳市劳动和社会保障局、深圳市总工会、市企业家协会、深圳特区报评为“深圳市首届遵守劳动法模范企业”；<br>
                    2009年被中共深圳市委办公厅深圳市人民政府办公厅评为第四届深圳市外地来深“建设者之家”先进企业单位</p>
            </div>

            <div class="title_w">
                <div class="title_i">
                    <h2 class="ti">
                        龙嘉文化</h2>
                    <img src="/img/bg/cu.gif"></div>
            </div>

            <div class="trd_box">
                <a name="wh" id="wh"></a>
                <img src="/img/bg/pic_2.jpg">
                <p>
                    公司坚持以“诚信求实，客户为尊，精益求精，勇于创新”为公司一直以来的发展方针，公司产品以时尚潮流，精湛新颖，富有时代感的高雅风格首饰款式，赢得了业界的肯定和广大消费者的青睐。</p>
                <h3>
                    真诚服务、客户至上、品质第一、诚信的宗旨</h3>
            </div>
            <?php endif;?>
            <div class="clear"></div>
        </div>

    </div>


    <div class="clear"></div>

</div>

