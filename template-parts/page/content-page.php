<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $icon = get_sm_page_icon( get_the_ID() ); ?>
	<header class="entry-header<?= ($icon) ? ' has-icon' : '' ?>">
		<?php echo $icon; ?>
		<?php
			the_systemorph_page_prefix();
		?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_systemorph_page_subtitle(); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
