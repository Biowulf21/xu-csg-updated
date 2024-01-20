<?php

/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
?>


<div class="archive-main-div" id="content-row" <?php astra_primary_class(); ?>>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div style="margin-top: 25px;">Found in <strong><?php echo ucfirst(get_post_type()) . 's' ?></strong></div>
			<strong>
				<a style="text-decoration: none;" href="<?php echo the_title(); ?>">
					<h2><?php echo the_title(); ?></h2>
				</a>
			</strong>
			<?php the_excerpt(); ?>
			<hr />
		<?php endwhile; ?>
	<?php else : ?>
		<strong>
			<h3>Nothing to Show</h3>
		</strong>
	<?php endif; ?>

	<div style="margin-bottom: 50px;" id="navigation-div" style="width100%; margin:auto;"><?php the_posts_pagination(); ?></div>
</div><!-- #primary -->


<?php get_footer(); ?>