<?php
get_header();

$tags = get_terms([
  'taxonomy' => 'post_tag',
  'hide_empty' => false
])

?>

<div class="archive-main-div">
<header class="custom-banner" style="margin-bottom: 1em;">
 <img src="https://xu-csg.org/wp-content/uploads/2023/05/D-DAY-BANNER.png" alt="Banner image" style="width: 100%; height: auto;">
</header>
  <div id="form-div">
    <form class="filter-form" method="GET">
      <div class="filter-form-sub-div">
      </div>
      <div class="filter-form-sub-div">
        <input id="<?php echo get_post_type() ?>" name="post_type" type="hidden" value="announcement"></input>
        <input type="hidden" id="order" name="order" value="<?php echo (isset($_GET['orderby']))  && $_GET['orderby'] === "ASC" ? 'ASC' : 'DESC'; ?>" />
        <div class="filter-form-sub-div">

        <select class="filter-select" name="orderby" id="orderby">
          <option value="date" <?php echo selected($_GET['orderby'], 'date'); ?>>Newest to Oldest</option>
          <option value="title" <?php echo selected($_GET['orderby'], 'title'); ?>>Alphabetical</option>
        </select>

        <select name="tag">
          <option value="">All Tags</option>
          <?php foreach ($tags as $tag) :
          ?>
            <option value="<?= $tag->slug; ?>" name="tag-value"><?= $tag->name; ?> </option>
          <?php endforeach; ?>
        </select>
          <button type="submit">Apply</button>
          <a class="clear-filters-link" href="<?php echo get_home_url() . '/announcement' ?>">Clear Filters</a>
        </div>

      </div>
    </form>
  </div>

  <strong>
    <h1 id="post-type-title">Announcements</h1>
  </strong>
  <section>
    <div class="grid-container" style="<?php echo $GLOBALS['wp_query']->found_posts > 2 ? "justify-content:center;" : null ?>">
      <?php if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>

          <div class="grid-item">
            <div class="grid-thumbnail-div">
              <img class="post-thumbnail" src="<?= get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : "http://localhost/csg/wp-content/uploads/2022/09/301778185_10159853095819584_1018496936469691171_n.jpg"; ?>" />
            </div>
            <div class="grid-contents">
              <p style="margin-bottom: 0px;">Published on <?php $publish_date = get_the_date("j/n/Y - g:i a");
                                                          echo $publish_date; ?></p>
              <div class="grid-title-div">
                <strong>
                  <h4><a target="blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </strong>
                <p style="margin-bottom: 0px;"><strong>Author: </strong><?php echo get_the_author(); ?></p>
              </div>
            </div>

          </div>

      <?php endwhile;?>
      <?php else : ?>
        <h4>No Announcements to show</h1>
      <?php endif; ?>
    </div>
    <div style="margin-bottom: 50px;" id="navigation-div" style="width100%; margin:auto;"><?php the_posts_pagination(); ?></div>
</div>
<?php get_footer(); ?>
