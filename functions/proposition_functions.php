<?php
// list proposition
function list_propositions()
{
    $_query = new WP_Query(array('post_type' => 'services'));
    echo '<div id="propositions">';

        if ($_query->have_posts()) {
          while ($_query->have_posts()) {
              $_query->the_post();
              $icon = get_field('icon');
              ;?>
              <div class="propostion-list d-flex justify-content-start">
                <img src="<?php echo $icon['url'];?>"/>
              <div>
                <h3 class="t2"><?php echo the_title();?></h3>
                <div><?php the_content();?> </div>
                <p> <?php echo the_field('description');?> </p>
                <p> <?php echo do_shortcode(get_field('citation'));?> </p>
              </div>
              </div>
              <?php
          }
        }

    wp_reset_postdata();
    echo '</div>';
    // echo $content_html;
}
add_shortcode('wp_list_propositions', 'list_propositions' );