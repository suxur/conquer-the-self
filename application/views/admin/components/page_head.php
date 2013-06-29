<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo $meta_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="<?php echo site_url('css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo site_url('css/bootstrap-wysihtml5.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo site_url('css/datepicker.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo site_url('css/jcrop.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo site_url('css/normalize.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo site_url('css/admin.min.css'); ?>">
		
		<script src="<?php echo site_url('js/vendor/modernizr-2.6.2.min.js'); ?>"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script>window.jQuery || document.write("<script src=\"<?php echo site_url('js/vendor/jquery-1.9.1.min.js'); ?>\"><\/script>")</script>
		<script src="<?php echo site_url('js/vendor/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo site_url('js/vendor/jasny-bootstrap.min.js'); ?>"></script>
		<script src="<?php echo site_url('js/vendor/wysihtml5-0.3.0.min.js'); ?>"></script>
		<script src="<?php echo site_url('js/vendor/bootstrap-wysihtml5.min.js'); ?>"></script>
		<script src="<?php echo site_url('js/vendor/datepicker.min.js'); ?>"></script>
		<script src="<?php echo site_url('js/vendor/validation.min.js'); ?>"></script>
		<script src="<?php echo site_url('js/vendor/jcrop.min.js'); ?>"></script>

		<script src="<?php echo site_url('js/plugins.js'); ?>"></script>

		<?php if (isset($sortable) && $sortable === TRUE) : ?>
			<script src="<?php echo site_url('js/vendor/jquery-ui-1.10.1.custom.min.js'); ?>"></script>
			<script src="<?php echo site_url('js/vendor/sortable.min.js'); ?>"></script>			
		<?php endif; ?>
	</head>