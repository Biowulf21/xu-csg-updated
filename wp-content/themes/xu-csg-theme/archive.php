<?php
get_header();


?>

<div class="archive-main-div">
    <div id="form-div">
        <form class="basic-filters" method=" GET">
            <div></div>
            <label for="orderby">Order by</label>
            <select class="filter-select" style="margin-left:10px;" name="orderby" id="orderby">
                <option value="date" <?php echo selected($_GET['orderby'], 'date'); ?>>Newest to Oldest</option>
                <option value="title" <?php echo selected($_GET['orderby'], 'title'); ?>>Alphabetical</option>
            </select>
            <input id="<?php echo get_post_type() ?>" name="post_type" type="hidden" value="<?php echo get_post_type() ?>"></input>
            <input type="hidden" id="order" name="order" value="<?php echo (isset($_GET['orderby']))  && $_GET['orderby'] === "ASC" ? 'ASC' : 'DESC'; ?>" />
            <button type="submit">Apply</button>
            <a class="clear-filters-link" href="<?php echo get_home_url() . '/' . get_post_type() ?>">Clear Filters</a>
        </form>
    </div>

    <strong>
        <h1 id="post-type-title"><?= ucfirst(get_post_type()) . 's'; ?></h1>
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
                            <div class="grid-title-div">
                                <strong>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </strong>
                            </div>
                        </div>

                    </div>

            <?php endwhile;

            endif; ?>
        </div>
        <div style="margin-bottom: 50px;" id="navigation-div" style="width100%; margin:auto;"><?php the_posts_pagination(); ?></div>
</div>
<?php get_footer(); ?>
