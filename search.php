<?php get_header(); ?>

		<div id="content" class="row">
		
			<div id="main" class="span14" role="main">
				<div class="container">
					<h1><?php _e('Search Results for', 'basics'); ?> <?php echo get_search_query(); ?></h1>
					<?php roots_loop_before(); ?>
					<?php get_template_part('loop', 'search'); ?>
					<?php roots_loop_after(); ?>
				</div>
			</div><!-- /#main -->
			
			<aside id="sidebar" class="span8 prepend-1" role="complementary">
				<div class="container">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- /#sidebar -->
			
		</div><!-- /#content -->
		
<?php get_footer(); ?>