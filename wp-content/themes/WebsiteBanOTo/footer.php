<?php
/**
 * The template for displaying the footer
 *
 */

?>

	</div><!-- #content -->
	<a id="top" class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1 active" id="top-link">
		<span class="icon-angle-up">^</span>
	</a>
	<footer id="colophon" class="site-footer">
		<div id="footer-top" class="hidden-sm hidden-xs">
			<div class="footer-top-philosophy">
				<img src="https://hyundai-mienbac.net/wp-content/uploads/2019/12/Hyundai-PH-by-TC-motor.png" />
				<i>Chúng tôi luôn nỗ lực mang đến cho khách hàng những sản phẩm chất lượng
và dịch vụ cskh sau bán hàng tốt nhất tạo cho cộng đồng một tương lai tốt đẹp</i>
			</div>
		</div>
		<div id="footer-middle">
			<div id="footer-middle-top">


				<?php
				if ( ! is_active_sidebar( 'sidebar-2' ) ) {
					return;
				}
				?>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>

			<div id="footer-middle-bottom" class="inner">
				<?php
				if ( ! is_active_sidebar( 'sidebar-3' ) ) {
					return;
				}
				?>
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		</div>
		<div class="site-info" id="footer-bottom">
			<p>Thời gian làm viêc: Bộ phận kinh doanh Thứ 2 - Chủ nhật : 8h - 18h  </p>
			<a href="<?php // echo esc_url( __( 'facebook.com/jerrytung.11', '_s' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				// printf( esc_html__( 'Proudly powered by %s', '_s' ), 'Hoang Hieu' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				// printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), ' create ', '<a href="#">Jerry</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<div class="pop_tuvan">
	<?php
				if ( ! is_active_sidebar( 'hotline-4' ) ) {
					return;
				}
				?>
				<?php dynamic_sidebar( 'hotline-4' ); ?>
</div>	
<a style="position: fixed; bottom: 10px; right: 20px; width: 80px; cursor: pointer;
		  z-index: 99999;" href="https://zalo.me/<?php
								$show_all = '032312312';
							    $options = get_option('stheme_options');
							    if($options) 
									if($options['zalo'])
							            $show_all = $options['zalo'];
							    echo $show_all;
							 ?>" class="zalo-popup" target="_blank">
<img src="https://hyundai-mienbac.net/wp-content/uploads/2019/12/kisspng-gif-logo-clip-art-animation-smile-zalo.png" alt="zalo" /></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>