<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main inner">
			<section id="content">
				<div id="content-hot-product">
					<div class="content-hot-product-title">
						<span >Sản phẩm nổi bật</span>
					</div>
					<?php
						$args_my_query1 = array(
						   'post_type'      => 'product',
        					'posts_per_page' => '10',
						);
						$my_query1= new WP_Query( $args_my_query1 );
						?>
						<?php if( $my_query1->have_posts() ) : while( $my_query1->have_posts() ) : $my_query1->the_post(); ?>
						
						<div class="content-hot-product-item col-md-15 col-sm-4 col-xs-6">
							<a href="<?php echo the_permalink(); ?>">
								<div class="hot-product-item-image">
									<!-- post thumbnail -->
										<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
												<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
										<?php else: ?>
											<img src="<?php echo bloginfo('template_url'); ?>/layouts/image/default.png" alt="<?php the_title(); ?>" />

										<?php endif; ?>
										<!-- /post thumbnail -->
								</div>
								<div class="hot-product-item-name">
									<p><?php the_title(); ?></p>
								</div>
							</a>
						</div>

						<?php endwhile; ?>

						<?php else: ?>
								<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
						<?php endif; wp_reset_query();?>
					<a class="show-all" href="<?php
								$show_all = '#';
							    if($options) 
							    	if($options['show_all'])
							            $show_all = '<img src='.$options['show_all'].' />';
							    echo $show_all;
							 ?>">Xem tất cả ></a>
				</div>
				<div id="content-news">
					<div class="content-hot-product-title">
						<span >Tin tức sự kiện</span>
					</div>

					<div class="content-news-main">
						<?php
						$args_my_query = array(
						    'post_type'    =>    'post',
						    'posts_per_page'  =>  '4'
						);
						$my_query = new WP_Query( $args_my_query );
						?>
						<?php if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<div class="content-news-item col-lg-3 col-sm-3 col-xs-6">
							<a href="<?php the_permalink(); ?>">
								<div class="content-news-item-image">
									<!-- post thumbnail -->
									<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
											<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
									<?php else: ?>
										<img src="<?php echo bloginfo('template_url'); ?>/layouts/image/default.png" alt="<?php the_title(); ?>" />

									<?php endif; ?>
									<!-- /post thumbnail -->
								</div>
								<div class="content-news-item-info">
									<h5><?php the_title(); ?></h5>
									<p><?php the_excerpt(); ?></p>
								</div>
							</a>
						</div>

						<?php endwhile; wp_reset_query();?>

						<?php else: ?>
								<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
