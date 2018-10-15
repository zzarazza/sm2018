<?php

function sm_shortcode_show_partners($atts) {

	extract(shortcode_atts(array(
		'num' => 10,
		'title' => "Partners"
	), $atts));

	ob_start();
	?>

	<div class="sm-partners">
		<h2 class="block-title"><?php echo $title; ?></h2>
		<?php $partners = new WP_Query(array('posts_per_page' => $num, 'order' => 'ASC', 'post_type' => 'partners')); ?>
		<?php if ($partners->have_posts()) : ?>
		<ul class="partner-list">
			<?php while ($partners->have_posts()) : ?>
			<?php $partners->the_post(); ?>
			<li class="partner-item">
				<?php $partnerLogo = rwmb_meta( 'partner_logo' ); ?>
				<?php if ($partnerLogo) : ?>
				<img src="<?php echo $partnerLogo["url"]; ?>" alt="<?php the_title(); ?>">
				<?php endif; ?>
			</li>
			<?php endwhile;  ?>
		</ul>
		<?php endif; wp_reset_postdata(); ?>
	</div>
	<?php return ob_get_clean(); ?>
<?php }
add_shortcode('sm-partners', 'sm_shortcode_show_partners');

function sm_shortcode_featured($atts) {
	ob_start();
	?>
	<div class="sm-featured"></div>
	<?php return ob_get_clean(); ?>
<?php }
add_shortcode('sm-featured', 'sm_shortcode_featured');