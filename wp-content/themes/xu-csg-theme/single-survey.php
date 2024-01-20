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
  <!-- <img class="feat-img" href="<?php the_post_thumbnail(); ?>" -->
  <div id='survey-featured-image'>
  </div>
  <div class="survey-title">
    <strong>
      <h1><?php the_title(); ?></h1>
    </strong>
  </div>
  <div class="survey-body">
    <?php if (function_exists('the_views')) {
      the_views();
    } ?>
    <h3>You can participate in this survey by clicking <a target="_blank" href="<?php echo get_field('link_to_survey') ?>">this link</a>.</h3><br>
    <div class="survey-file-content">
      <object data="<?php echo get_field('survey-file')['url']; ?>" style='height:100vh; width:100vw; margin-bottom:25px;'>
        <embed src=`<?php echo get_field('survey-file')['url']; ?>` />
      </object>
    </div>
    <?php the_content(); ?>
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