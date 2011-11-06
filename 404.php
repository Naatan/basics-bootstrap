<?php get_header(); ?>

		<div id="content" class="span24">
		
			<div id="main" class="span14" role="main">
				<div class="container">
				
					<h1><?php _e('File Not Found', 'basics'); ?></h1>
					<div class="error">
						<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'basics'); ?></p>
					</div>
					
					<p><?php _e('Please try the following:', 'basics'); ?></p>
					
					<ul> 
						<li><?php _e('Check your spelling', 'basics'); ?> </li>
						<li><?php printf(__('Return to the <a href="%s">home page</a>', 'basics'), home_url()); ?></li>
						<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'basics'); ?></li>
					</ul>
					
				</div>
			</div><!-- /#main -->
			
		</div><!-- /#content -->
<?php get_footer(); ?>