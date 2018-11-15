<?php
/**
 * Displays success on contact form registration
 *
 * @package WordPress
 * @subpackage Systemorph_2018
 * @since 1.0
 * @version 1.0
 */

?>
<article>
	<header class="entry-header has-icon">
		<i class="icon icon-check-white icon-bcolor-success"></i>
    	<h1 class="entry-title">Thank you for your interest in the Systemorph white paper.</h1>
  	</header><!-- .entry-header -->
  	<div class="entry-content">
  		<p>You can download it here:</p>
		<?php the_systemorph_page_attachment($post_id); ?>
	</div>
</article>


