<?php get_header(); ?>

		<div id="content" class="row">
		
			<div id="main" class="span14" role="main">
				<div class="container">
					<h1><?php _e('Latest Posts', 'basics');?></h1>
					<?php get_template_part('loop', 'index'); ?>
				</div>
			</div><!-- /#main -->
			
			<aside id="sidebar" class="span8 prepend-1" role="complementary">
				<div class="container">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- /#sidebar -->
			
		</div><!-- /#content -->
		
<?php get_footer(); ?>