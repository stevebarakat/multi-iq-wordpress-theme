<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Multi IQ
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="col-lg-6 col-lg-push-3 col-md-4 col-md-push-4" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header hidden">
				<h1 class="page-title">Newsletters</h1>		
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php 
					    $attachment_id = get_post_meta(get_the_ID(), '_image_id', true); // attachment ID

					    $image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' ); // returns an array
					    if( $image_attributes ) {
					    ?> 
					    
						
					    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>"></a>
					

					<?php } ?> 
					<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php multi_iq_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

	<div class="newsletter-content">

		<div class="newsletter-thumbnail"><?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail();} ?>
		</div>
			<?php the_title( sprintf( '<h2 class="newsletter-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'multi-iq' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'multi-iq' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .newsletter-content -->
		
	<!-- Subscribe Button	 -->
	<?php $subscribe_url= get_post_meta(get_the_ID(), '_subscribe_url', true);
			if ($subscribe_url) {
				echo "<a class='button' title='Subscribe to the newsletter' href=" . $subscribe_url . ">Subscribe</a>";
			}
	 ?>
	<div class="clearfix"></div>
	
	<footer class="entry-footer">
		<?php multi_iq_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

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
