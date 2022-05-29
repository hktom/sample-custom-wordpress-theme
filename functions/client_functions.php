<?php
function list_avis_client()
{
    $_query = new WP_Query(array('post_type' => 'clients', 'posts_per_page' => 10));
    $content_html='';

        if ($_query->have_posts()) {
          while ($_query->have_posts()) {
              $_query->the_post();

              $content_html.='
              <div class="py-3">
              <h3>'.get_the_title().'/'.get_field('organisation').'</h3>
              <p>'.get_field('commentaire').'</p>
              </div>';
          }
          wp_reset_postdata();
        }
    echo $content_html;
}
add_shortcode('wp_list_avis_client', 'list_avis_client' );

function list_organisations()
{
    $_query = new WP_Query(array('post_type' => 'organisation', 'posts_per_page' => 100));
    $content_html='<div class="row list-clients">';

        if ($_query->have_posts()) {
          while ($_query->have_posts()) {
              $_query->the_post();
              $content_html.='
              <div class="col-lg-4 col-6">
              <p>'.get_the_title().'</p>
              </div>';
          }
          wp_reset_postdata();
        }

    $content_html.='</div>';
    return $content_html;
}
add_shortcode('wp_display_organisations', 'list_organisations' );
?>
