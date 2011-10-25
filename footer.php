		<footer id="footer" role="contentinfo">
			<div class="container">
				<?php dynamic_sidebar("Footer"); ?>
				<p class="copy"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></small></p>
			</div>	
		</footer>
	</div><!-- /#wrap -->

	<?php wp_footer(); ?>

	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

</body>
</html>