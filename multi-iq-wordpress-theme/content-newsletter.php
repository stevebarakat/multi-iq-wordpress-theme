<?php
/**
 * @package Multi IQ
 */
?>
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
				echo "<a class='subscribe-button' title='Subscribe to the newsletter' href=" . $subscribe_url . ">Subscribe</a>";
			}
	 ?>
	<div class="clearfix"></div>
	
	<footer class="entry-footer">
		<?php multi_iq_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

