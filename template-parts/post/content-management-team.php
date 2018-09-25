<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.2
 */

?>

<article id="team_member_<?php the_ID(); ?>" <?php post_class("team-member"); ?>>
	<header class="t-m-header">
		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<div class="t-m-image">
				<?php the_post_thumbnail( 'systemorph-team-member' ); ?>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>
			<div>
		<?php
			the_title( '<h2 class="t-m-name">', '</h2>' );
			echo '<h3 class="t-m-position">' . rwmb_meta( 'team_member_position' ) . '</h3>';
		?>
			</div>
	</header><!-- .entry-header -->

	<div class="t-m-info">
		<?php
		/* translators: %s: Name of current post */
		the_content();

		?>
	</div><!-- .entry-content -->

</article><!-- #team_member_-## -->
