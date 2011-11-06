<?php get_header(); ?>

		<div id="content" class="row">
		
			<div id="main" class="span14" role="main">
				<div class="container">
				
					<?php get_template_part('loop', 'page'); ?>
					
				</div>
			</div><!-- /#main -->
			
			<aside id="sidebar" class="span8 prepend-1" role="complementary">
				<div class="container">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- /#sidebar -->
			
		</div><!-- /#content -->
		
<?php get_footer(); ?>