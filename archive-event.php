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
			<?php
				$postType = get_archive_post_type();
				echo '<h1 class="page-title">' . $postType . '</h1> ';
				echo '<p class="page-description">' . get_the_post_type_description() . '</p> ';
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php


		$limit = 5;
		$terms = get_terms( 'event-timeline', array(
			    'orderby'    => 'name',
			    'order'      => 'DESC',
			    'hide_empty' => 1
			) );

		foreach( $terms as $term ) {

		    $args = array(
		    	'posts_per_page' => $limit,
		        'post_status' => 'publish',
		        'post_type' => 'event',
		        'orderby'    => 'date',
			    'order'      => 'DESC',
		        'tax_query' => array(
			        array(
			            'taxonomy' => $term->taxonomy,
			            'field' => 'slug',
			            'terms' => $term->slug
			        )
			    )
		    );

		    $query = new WP_Query( $args );

			if ( $query->have_posts() ) :
			?>
				<?php

				echo '<section class="term ' . $term->slug . '">';
				echo '<header class="taxonomy-term-title">';
			    	echo '<h2>' . $term->name . '</h2>';

			    	if ($query->found_posts > $limit) {
						echo '<a class="view-all" href="' . get_term_link( $term->term_id ) . '">View all</a>';
					}
				echo '</header>';

				while ( $query->have_posts() ) :
					$query->the_post();

					get_template_part( 'template-parts/post/content', get_post_type() );

				endwhile;

				echo '</section>';

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;

			wp_reset_postdata();
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
