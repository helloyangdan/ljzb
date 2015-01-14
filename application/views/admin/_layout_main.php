<?php $this->load->view('admin/components/page_head'); ?>
<body>

    <div class="navbar navbar-static-top navbar-inverse">

	    <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
                <ul class="nav">
                    <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">后台首页</a></li>
                    <li><?php echo anchor('admin/ad', '广告管理'); ?></li>
                    <li><?php echo anchor('admin/article', '文章管理'); ?></li>
                    <li><?php echo anchor('admin/product', '产品管理'); ?></li>
                    <li><?php echo anchor('admin/category', '分类管理'); ?></li>
                    <li><?php echo anchor('admin/user', '管理员'); ?></li>
                </ul>
                <!-- Sidebar -->
                <ul class="nav pull-right">
                        <li class="active"><?php echo anchor('admin/user/index',$this->session->userdata("name") )  ; ?></li>
                        <li class="active"><?php echo anchor('admin/user/logout', '<i class="icon-off"></i> 退出'); ?></li>
                </ul>
	        </div>
        </div>
    </div>

	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="span12">
<?php $this->load->view($subview); ?>
			</div>

		</div>
	</div>

<?php $this->load->view('admin/components/page_tail'); ?>