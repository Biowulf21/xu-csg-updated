<?php
get_header();
?>


<div class="archive-main-div" style=" width:100%;" id="content-row">
<header class="custom-banner" style="margin-bottom: 1em;">
 <img src="https://xu-csg.org/wp-content/uploads/2023/05/CSG-WEBSITE-BANNER-TRANSPARENCY-1.png" alt="Banner image" style="width: 100%; height: auto;">
</header>
  <div id="form-div" style="width: 100% !important; align-items: center;">
  </div>
  <strong>
    <h1>Liquidation Reports</h1>
  </strong>
  <hr />
  <table class="resolution-table">
    <thead>
      <th>Resoliution Title</th>
      <th>Publication Date</th>
      <th>Views</th>
    </thead>
    <?php if (have_posts()) {
      while (have_posts()) {
        the_post(); ?>

        <tr>
          <td><strong><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></strong></a></td>
          <!--- Title --->
          <td><?php echo get_the_date(); ?></td>
          <!--- Date --->
          <td><?php echo do_shortcode("[views id='$id']"); ?></td>
          <!--- Views --->
        </tr>
    <?php
      }
    } ?>
  </table>

  <div style="margin-bottom: 50px;" id="navigation-div" style="width100%; margin:auto;"><?php the_posts_pagination(); ?></div>
  <hr />
</div>
<?php get_footer(); ?>
