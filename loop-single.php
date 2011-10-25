<?php /* Start loop */ ?>

<?php while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<time class="updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><?php echo sprintf(__('Posted on %s at %s.', 'basics'), get_the_time('l, F jS, Y'), get_the_time()); ?></time>
				<p class="byline author vcard"><?php echo __('Written by', 'basics') ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('id')) ?>" rel="author" class="fn"><?php echo get_the_author() ?></a></p>
			</header>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'basics'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			
			<?php comments_template(); ?>
			
		</article>
	
<?php endwhile; // End the loop ?>