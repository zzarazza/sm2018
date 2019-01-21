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
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			$terms = get_terms( 'type', array(
			    'orderby'    => 'menu_order',
			    'order'      => 'ASC',
			    'hide_empty' => 0
			) );

			foreach( $terms as $term ) {

			    $args = array(
			    	'numberposts' => -1,
			        'post_status' => 'publish',
			        'post_type' => 'case-studies',
			        'orderby'    => 'menu_order',
				    'order'      => 'ASC',
			        'tax_query' => array(
				        array(
				            'taxonomy' => 'type',
				            'field' => 'slug',
				            'terms' => 'summary'
				        )
				    )
			    );

			    $query = new WP_Query( $args );

		        // Start the Loop
		        while ( $query->have_posts() ) : $query->the_post(); ?>

		        <article id="post-<?php the_ID(); ?>" <?php post_class("case-study-item"); ?>>

					<header class="entry-header">
						<?php
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						?>
					</header><!-- .entry-header -->

					<div class="blog-content">

						<div class="entry-content">
							<?php
								the_excerpt();
							?>
						</div><!-- .entry-content -->
					</div>

				</article><!-- #post-## -->

		        <?php endwhile;

			    // use reset postdata to restore orginal query
			    wp_reset_postdata();

			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php
get_footer();
