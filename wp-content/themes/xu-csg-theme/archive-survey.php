<?php
get_header();

$colleges = get_terms([
  'taxonomy' => 'survey_college',
  'hide_empty' => true,
]);

$types = get_terms([
  'taxonomy' => 'survey_classification',
  'hide_empty' => true,
]);

$year_levels = get_terms([
  'taxonomy' => 'survey_year_level',
  'hide_empty' => true,
]);

?>

<div class="archive-main-div">
<header class="custom-banner" style="margin-bottom: 1em;">
 <img src="https://xu-csg.org/wp-content/uploads/2023/05/CSG-WEBSITE-BANNER-SURVEY-1.png" alt="Banner image" style="width: 100%; height: auto;">
</header>
  <div id="form-div">
    <form class="filter-form" method=" GET">
      <div class="filter-form-sub-div">
        <select name="orderby" id="orderby">
          <option value="">Order by</option>
          <option value="date" <?php echo selected($_GET['orderby'], 'date'); ?>>Newest to Oldest</option>
          <option value="title" <?php echo selected($_GET['orderby'], 'title'); ?>>Alphabetical</option>
        </select>
      </div>
      <div class="filter-form-sub-div">
        <input id="<?php echo get_post_type() ?>" name="post_type" type="hidden" value="<?php echo get_post_type() ?>"></input>
        <select name="survey_college" id="surve_college">
          <option value="">All Colleges</option>
          <?php foreach ($colleges as $college) :
          ?>
            <option value="<?php echo $college->slug; ?>" <?php echo selected($_GET['survey_college'], $college->slug); ?>>
              <?php echo $college->name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-form-sub-div">
        <select name="survey_classification" id="survey_classification">
          <option value="">All Survey Types</option>
          <?php foreach ($types as $type) : ?>
            <option value="<?php echo $type->slug ?>" <?php echo selected($_GET['survey_classification'], $type->slug); ?>><?php echo $type->name; ?></option>
          <?php endforeach; ?>
        </select>
        <select name="year_level" id="year_level">
          <option value="">All Year Levels </option>
          <?php foreach ($year_levels as $year_level) : ?>
            <option value="<?php echo $year_level->slug; ?>" <?php echo selected($_GET['year_level'], $year_level->slug); ?>><?php echo $year_level->name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-form-sub-div">
        <input type="hidden" id="order" name="order" value="<?php echo (isset($_GET['orderby']))  && $_GET['orderby'] === "ASC" ? 'ASC' : 'DESC'; ?>" />
        <button id="submit-btn" type="submit">Apply Filters</button>
        <a class="clear-filters-link" href="<?php echo get_home_url() . '/' . get_post_type() ?>">Clear Filters</a>
      </div>
    </form>
  </div>

  <strong>
    <h1 id="post-type-title">Surveys</h1>
  </strong>
<section>
<br/>
<h2>Survey Instructions</h2>
<ol>
  <li>Send an email to <a href="mailto:xucsg.oisd@gmail.com">xucsg.oisd@gmail.com</a> with the following template:
    <ol type="a">
      <li>Subject: Survey | Title</li>
      <li>Body:
        <ol type="i">
          <li>Title</li>
          <li>Survey Link</li>
          <li>Survey Description/caption/body</li>
          <li>College (Arts &amp; Sciences, School of Business and Management, Agriculture, Computer Studies, Education, Engineering, Law, Medicine)</li>
          <li>Classification (Thesis, Capstone, Research, Project, Other)</li>
          <li>Your Year Level (1st Year, Second Year, Third Year, 4th Year)</li>
          <li>Featured Image (if applicable)</li>
          <li>End date of the survey (survey will be removed from the website on the day after its end date)</li>
        </ol>
      </li>
    </ol>
  </li>
  <li>Posting of the submitted survey will take 2-3 days. In case of delay, follow up on the existing sent email.</li>
</ol> 
</section>
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
                  <h4><a target="_blank" href="<?php echo get_field("link_to_survey"); ?>"><?php the_title(); ?></a></h4>
                </strong>
                <p style="margin-bottom: 0px;"><strong>Author: </strong><?php echo get_field('survey_author'); ?></p>
              </div>
            </div>

          </div>

        <?php endwhile; ?>
      <?php else : ?>
        <h4>No Surveys to show</h1>
      <?php endif; ?>
    </div>
    <div style="margin-bottom: 50px;" id="navigation-div" style="width100%; margin:auto;"><?php the_posts_pagination(); ?></div>
</div>
<?php get_footer(); ?>
