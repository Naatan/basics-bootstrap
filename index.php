<?php get_header(); ?>

		<div id="content">
		
			<div id="main" role="main">
				<div class="container">
					<h1><?php _e('Latest Posts', 'basics');?></h1>
					<?php get_template_part('loop', 'index'); ?>
				</div>
			</div><!-- /#main -->
			
			<aside id="sidebar" role="complementary">
				<div class="container">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- /#sidebar -->
			
		</div><!-- /#content -->
		
<?php get_footer(); ?>