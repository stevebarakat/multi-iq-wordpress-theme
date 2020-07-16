<?php
/*
Template Name: Search Page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="col-lg-6 col-lg-push-3 col-md-4 col-md-push-4" role="main">

			<h4>Welcome to the WOODIQ.COM Industry Content Library.</h4> 

			<p>Here you will find a keyword searchable reference library of the critical issues facing the woodworking industry. This section includes: news and articles ranging from technical to operations, from technology to human resources, from management to "green" issues.</p>

			<p>You can use the topic list below or if  you are looking for articles, you can place a keyword in the search box at the bottom of the page.  For a complete list of the products, click here for the ProductIQ Buyers Guide.</p>

			<div class="search-box-area">
				<h5>Enter a keyword and search the WoodIQ.com Content Library</h5>
				<?php get_search_form(); ?>
			</div>

			<div class="row">
				<div class="col-md-6">
					<?php 
					    $args = array(
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 1,
								'hide_empty'         => 1,
								'hierarchical'       => 1,
								'title_li'           => __( 'Articles/News', 'multi-iq' ),
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'category',
					    );
					    wp_list_categories( $args ); 
					?>
				</div>

				<div class="col-md-6">
					<li class="products">Products</li>
						<ul>
								<li class="product-item"><a href="http://www.woodiq.com/ProductIQ/SearchResults/tabid/368/SearchValue/design/Vendor/True/Product/True/Category/True/Default.aspx">Design</a>
							</li>
								<li class="product-item"><a href="http://www.productiq.com/SearchResults/tabid/1148/SearchValue/organization/Vendor/True/Product/True/Category/True/Default.aspx">Organized Spaces</a>
							</li>
								<li class="product-item"><a href="http://www.productiq.com/SearchResults/tabid/1148/SearchValue/technology/Vendor/True/Product/True/Category/True/Default.aspx">Technology</a>
							</li>
						</ul>
					</li>
				</div>
			</div>
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
