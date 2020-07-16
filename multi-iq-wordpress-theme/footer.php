<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Multi IQ
 */
?>
			</div><!-- #content -->
			<footer id="colophon" class="site-footer" role="contentinfo">
				<nav id="footer-nav" class="col-lg-12">
					<?php wp_nav_menu( array( 'menu' => 'footer-menu', 'theme_location' => 'secondary' ) ); ?>
				</nav>
				<div class="clearfix"></div>
				<div class="footer-widget-area container-fluid">
					<div id="footer-left" class="footer-widget col-md-4">
					<?php dynamic_sidebar( 'sidebar-5' ); ?>
					</div>
					<div id="footer-middle" class="footer-widget col-md-4">
					<?php dynamic_sidebar( 'sidebar-6' ); ?>
					</div>
					<div id="footer-right" class="footer-widget col-md-4">
					<?php dynamic_sidebar( 'sidebar-7' ); ?>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="site-info">
					Copyright &copy;<?php echo date('Y'); ?> <a href="<?php echo get_site_url(); ?>"><?php printf( __( 'WoodIQ', 'multi-iq' )); ?></a>
					
					<?php $my_theme = wp_get_theme(); ?>

					<span class="sep"> | </span>
					Theme: Multi IQ by <a href="<?php echo $my_theme->get( 'AuthorURI' ); ?>"><?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Author' ); ?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->
<!-- END Grid -->

<?php wp_footer(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54e9b77a284c6c24" async="async"></script>

</body>
</html>
