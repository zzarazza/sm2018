<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h2 class="page-title">
				<?php post_type_archive_title(); ?>
			</h2>
			<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			$terms = get_terms( 'partnership-type', array(
			    'orderby'    => 'menu_order',
			    'order'      => 'ASC',
			    'hide_empty' => 0
			) );

			foreach( $terms as $term ) {

			    $args = array(
			    	'numberposts' => -1,
			        'post_status' => 'publish',
			        'post_type' => 'partners',
			        'orderby'    => 'menu_order',
				    'order'      => 'ASC',
			        'tax_query' => array(
				        array(
				            'taxonomy' => 'partnership-type',
				            'field' => 'slug',
				            'terms' => $term->slug
				        )
				    )
			    );

			    $query = new WP_Query( $args );

			    echo '<section class="partners">';
			    // output the term name in a heading tag
			    echo '<h2 class="partners-title">' . $term->name . '</h2>';
			    echo '<p class="partners-description">' . $term->description . '</p>';
			    // output the post titles in a list
			    echo '<ul class="partners-grid">';

			        // Start the Loop
			        while ( $query->have_posts() ) : $query->the_post(); ?>

			        <li class="partner-item" id="post-<?php the_ID(); ?>">
			        	<div class="partner-item-inner">
				        	<?php $partnerLogo = rwmb_meta( 'partner_logo' ); ?>
							<?php if ($partnerLogo) : ?>
							<img src="<?php echo $partnerLogo["url"]; ?>" alt="<?php the_title(); ?>">
							<?php endif; ?>
							<?php $partnerURL = rwmb_meta( 'partner_url' ); ?>
							<?php if ($partnerURL) : ?>
							<a rel="nofollow" href="<?= $partnerURL; ?>">
							<?php endif; ?>
				            <?php the_title(); ?>
				            <?php if ($partnerURL) : ?>
				            </a>
			            	<?php endif; ?>
				        </div>
			        </li>

			        <?php endwhile;

			    echo '</ul>';
			    echo '</section>';

			    // use reset postdata to restore orginal query
			    wp_reset_postdata();

			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php
get_footer();
