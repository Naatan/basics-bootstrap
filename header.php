<!doctype html>
<html class="no-js <?php echo Basics::get_browser(); ?>" <?php echo Basics::language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	
	<!-- ----------------------------------------------------------------------------- SEO INFO -->
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name="title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<!-- ----------------------------------------------------------------------------- MOBILE DEVICES -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<!-- ----------------------------------------------------------------------------- STYLESHEETS -->
	<link	rel="stylesheet/less" 	href="<?php echo site_url(); ?>/less/style.less" 			type="text/css">

	<!-- ----------------------------------------------------------------------------- RSS FEED -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!-- ----------------------------------------------------------------------------- SCRIPT LIBRARIES -->
	<script src="<?php echo site_url(); ?>/js/libs/modernizr-2.0.6.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('/js/libs/jquery-1.6.4.min.js"><\/script>')</script>
	<script src="<?php echo site_url(); ?>/js/libs/less-1.1.4.min.js"></script>

	<!-- ----------------------------------------------------------------------------- WP SCRIPTS -->
	<?php wp_head(); ?>

	<!-- ----------------------------------------------------------------------------- SCRIPTS -->
	<script src="<?php echo site_url(); ?>/js/plugins.js"></script>
	<script src="<?php echo site_url(); ?>/js/script.js"></script>
	
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-alerts.js"></script>-->
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-buttons.js"></script>-->
	<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-dropdown.js"></script>
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-modal.js"></script>-->
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-popover.js"></script>-->
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-scrollspy.js"></script>-->
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-tabs.js"></script>-->
	<!--<script src="<?php echo site_url(); ?>/js/libs/bootstrap/bootstrap-twipsy.js"></script>-->
	
</head>

<body <?php body_class(Basics::body_class()); ?>>

	<div class="topbar">
		<div class="topbar-inner">
			<div class="container">
				<a href="#" class="brand">Genia</a>
				<?php
				wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
				?>
				<?php wp_nav_menu(array('theme_location' => 'utility_navigation', 'menu_class' => 'secondary-nav')); ?>
			</div>
		</div>
    </div>

	<div id="wrap" class="container" role="document">
