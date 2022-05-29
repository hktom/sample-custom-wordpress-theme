<?php

function list_case_study()
{
    $_query = new WP_Query(
      array(
        'post_type' => 'case_studies', 
        "posts_per_page" => '10', 
        "posts_page" => '1', 
        )
    );
  
        if ($_query->have_posts()) {
          while ($_query->have_posts()) {
              $_query->the_post();
              ?>
              
              <div class="casestudy-post d-flex justify-content-start">
				<div class="img-container p-5 d-none d-lg-block">
					<a href="<?php echo get_permalink();?>"> <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>" alt=""> </a>
				</div>
				<div class="p-5">
					<h6 class="d-flex justify-content-start align-items-center">
          <a href="<?php echo get_permalink();?>">
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>" alt="" class="d-lg-none">
          </a>  
          <?php //the_field('organisation');?>
          </h6>
					<h3 class="case-title">
            <a href="<?php echo get_permalink();?>"><?php the_title();?></a>
          </h3>
					<div><?php the_field('chapeau');?></div>
					<a class="link" href="<?php echo get_permalink();?> ">Lire la suite <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
				</div>
            </div>
            
        <?php
          }
          wp_reset_postdata();
        }
}



add_shortcode( 'wp_display_case_study', 'list_case_study' );

//post query random
function next_case_study($current_post_id){
  $_query = new WP_Query( 
    array( 
      'post_type' => 'case_studies', 
      'post__not_in' => array($current_post_id), 
      //'post__in' => array(rand( 0, 100)),
      //'showposts' => 1,
      'posts_per_page'=> -1,
      'orderby' => 'random',
      'post_status' => 'publish',
      'order' => 'DESC',
      )
    );
    $total_post=0;
    $rand=0;
    $post=[];

  if ($_query->have_posts()) {
    while ($_query->have_posts()) {
      $_query->the_post();
      $total_post=$_query->found_posts;
      $post[]='
          <div>
          <h3>'.get_the_title().'</h3>
          <p>'.get_field('chapeau').'</p>
          <a class="link" href="'.get_permalink().'">Lire la suite 
          <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
          </a>
        </div> ';   
    }
    wp_reset_postdata();

    //show post
    echo $post[rand( 0, $total_post-1)];
  }

}