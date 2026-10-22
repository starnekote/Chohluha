<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$product_img_id = $product->get_image_id();
$product_gallery_ids = $product->get_gallery_image_ids();
array_unshift($product_gallery_ids, (int) $product_img_id);
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<section class="chehluha-product-gallery">
			<div class="product-gallery-main-swiper">
				<ul class="swiper-wrapper">
					<?php foreach ($product_gallery_ids as $product_gallery_id): ?>
						<li class="swiper-slide">
							<div class="img-wrapper">
								<img src="<?php echo wp_get_attachment_url($product_gallery_id); ?>" alt="">
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
								<!-- Кнопки навігації (Prev / Next) -->
				<button type="button" class="swiper-button-prev" aria-label="Попередній слайд"></button>
				<button type="button" class="swiper-button-next" aria-label="Наступний слайд"></button>

				<!-- Лічильник кадрів (Низ праворуч) -->
				<div class="product-gallery-counter">
				<span class="cam-label">CAM</span> <span class="current-slide">1</span>/<span class="total-slides">4</span>
				</div>
				<?php if ( $product->is_in_stock() ) {
					$status_html = '<span class="stock-status in-stock">В наявності</span>';
					echo $status_html;
				} else {
					$status_html = '<span class="stock-status on-backorder">Під замовлення</span>';
					echo $status_html;
				}
				if ( $product->is_on_sale() ) {
					$status_html = '<span class="sale-status sale">Знижка</span>';
					echo $status_html;
				} ?>
			</div>
			<div class="product-gallery-thumb-swiper">
				<ul class="swiper-wrapper">
					<?php foreach ($product_gallery_ids as $product_gallery_id): ?>
						<li class="swiper-slide">
							<div class="img-wrapper">
								<img src="<?php echo wp_get_attachment_url($product_gallery_id); ?>" alt="">
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

	</section>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * 
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
