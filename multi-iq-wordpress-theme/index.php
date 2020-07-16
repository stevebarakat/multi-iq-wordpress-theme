<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Multi IQ
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="col-lg-6 col-lg-push-3 col-md-4 col-md-push-4" role="main">

		<?php query_posts( 'posts_per_page=10' ); ?>
		<?php if ( have_posts() ) : ?>

		<?php dynamic_sidebar( 'sidebar-3' ); ?>
					
			
<div class="latest-news-wrap">
			
			<h3 class="latest-news-bg"><span class="latest-news"><a href="<?php echo get_site_url() . '/feed'; ?>"><i class="fa fa-rss rss"></i></a>Latest&nbsp;News</span></h3>		
</div>



			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

					</header><!-- .entry-header -->

					<div class="entry-content">
					
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>"><span class="read_more button">Read More</span></a>

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'multi-iq' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<!-- for metadata if needed -->
					</footer><!-- .entry-footer -->
					<hr>
				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="clearfix-md"></div>

<div id="sidebar-left" class="col-lg-3 col-lg-pull-6 col-md-4 col-md-pull-4">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
<div id="sidebar-right" class="col-lg-3 col-md-4">
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>

<div class="clearfix"></div>
</div>
</div>
</div>
<?php get_footer(); ?>
