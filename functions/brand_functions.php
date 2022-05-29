<?php
//list pilier
function list_piliers()
{
    $_query = new WP_Query(array('post_type' => 'pilier'));
    $i = 1;
    $content_html='<div class="card-group" id="pilier">';

        if ($_query->have_posts()) {
          while ($_query->have_posts()) {
              $_query->the_post();

              $content_html.='<div class="card mt-3 mb-5 mr-4">
                  <div class="card-body">
                    <div class="line"></div>
                    <h5 class="card-title pilier-title">'.get_the_title().'</h5>
                    <p class="card-text pilier-description">'.get_field('description').'</p>
                  </div>
                </div>';
              $i++;
          }
          wp_reset_postdata();
        }

    $content_html.='</div>';
    return $content_html;
}
add_shortcode( 'wp_list_piliers', 'list_piliers' );

//list brand
function list_brands()
{
    $_query = new WP_Query(array('post_type' => 'brand'));
    $i = 1;
    $content_html='';
    if ($_query->have_posts()) {
        while ($_query->have_posts()) {
            $_query->the_post();
            $icon = get_field('icon');
            $content_html.='
      <div id="brand-strategique-'.$i.'" class="brand-strategique"></div>
      <div class="d-flex flex-row brands">
      <img src="'.$icon['url'].'"/>
      <div>
      <h4>'.get_the_title().'</h4>
      <p> '. get_field('description').' </p>
      <div>'.do_shortcode(get_field('citation')).'</div>
      </div>
      </div>
      ';
$i++;
        }
    }
    wp_reset_postdata();
    echo $content_html;
}
add_shortcode( 'wp_list_brands', 'list_brands' );
