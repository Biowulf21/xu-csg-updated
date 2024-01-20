<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="archive-main-div" id="content-row">
  <img class="feat-img" href="<?php the_post_thumbnail(); ?>
  <div class="memo-title">
    <strong class="memo-title">
      <h1><?php the_title(); ?></h1>
    </strong>
  </div>
  <div class="memo-body">
    <?php if (function_exists('the_views')) {
      the_views();
    } ?>
<div class="memo-file-content" style="margin-top: 15px;">
  <object style="height: 100vh; width: 100%;" data="<?php echo get_field('memo-file')['url']; ?>">
    <embed src="<?php echo get_field('memo-file')['url']; ?>" />
  </object>
</div>

    <?php the_content(); ?>
    <?php if (get_field('memo-file')['url']) { ?>
      <b>Download this file by clicking <a href="<?php echo get_field('memo-file')['url']; ?>" target="_blank" download>this</a> link.</b>

    <?php } else { ?>
    <?php } ?>
  </div>
  <div id='socials-div' style="margin-bottom: 50px;">
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_facebook_messenger"></a>
    </div>`
  </div>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
  <!-- AddToAny END -->
</div>
</div><!-- #primary -->
<?php get_footer(); ?>
