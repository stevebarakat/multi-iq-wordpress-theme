<?php
/**
 * The template for displaying all single posts.
 *
 * @package Multi IQ
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="col-lg-6 col-lg-push-3 col-md-4 col-md-push-4" role="main">


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<div class="clearfix-md"></div>

<div id="widgets-header" class="col-lg-3 col-lg-pull-6 col-md-4 col-md-pull-4">
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
