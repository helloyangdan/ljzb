<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $meta_title; ?></title>
	<!-- Bootstrap -->
	<link href="<?php echo site_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('css/admin.css'); ?>" rel="stylesheet">
	<link href="<?php echo site_url('css/datepicker.css'); ?>" rel="stylesheet">
		
	<script src="<?php echo site_url('js/jquery-1.10.2.min.js');?>"></script>
	<script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo site_url('js/bootstrap-datepicker.js'); ?>"></script>
	<?php if(isset($sortable) && $sortable === TRUE): ?>
	<script src="<?php echo site_url('js/jquery-ui-1.9.1.custom.min.js'); ?>"></script>
	<script src="<?php echo site_url('js/jquery.mjs.nestedSortable.js'); ?>"></script>
	<?php endif; ?>

</head>