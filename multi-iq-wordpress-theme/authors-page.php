<?php
/*
 * Template Name: Authors Page
 * Description: A page template for Multi IQ theme to display Author info.
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="col-lg-6 col-lg-push-3 col-md-4 col-md-push-4" role="main">
		<h1 class="page-title"><?php echo get_the_title(); ?></h1>	

<?php
// This dispays author info

$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");

$i=0;

foreach($authors as $author) { ?>

<?php 
if ($i % 2 === 0) { ?>
<div class="row">
<?php } ?>


	<div class='col-lg-6'>
		<div class='author-box'>
		
			<?php echo "<div class='gravatar'><a href=\"".home_url()."/?author=";
						echo $author->ID;
						echo "\">";
						echo get_avatar($author->ID);
						echo "</a></div>"; 
			?>

			<header class='author-info'>
				<h2 class="author-name">
					<a href="<?php echo home_url() . '/?author=' . $author->ID ?>"><?php the_author_meta('display_name', $author->ID); ?></a>
				</h2>
				<span class="author-library"><a href="<?php echo home_url() . '/?author=' . $author->ID ?>"><?php the_author_meta('display_name', $author->ID); ?>'s Content Library</a></span>
			</header>

			<div class='author-bio'><?php the_author_meta('description', $author->ID); ?></div>
							
				<?php 

				$user_url = get_the_author_meta( 'user_url', $author->ID);

				if ($user_url !== ''){ ?>
				
					<div class='author-url'>Website: <a href="<?php echo $user_url; ?>"><?php echo $user_url; ?></a></div>

				<?php }?>
					
			<div class='author-email'>Email: <a href="mailto:<?php echo the_author_meta('user_email', $author->ID) ?>"><?php the_author_meta('user_email', $author->ID); ?></a></div>

		</div> <!-- .author-box -->
	</div> <!-- .col-lg-6 -->


<?php $i++;
if ($i % 2 === 0) { ?>
<div class="clearfix"></div>
</div>
<?php } } ?> 

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
