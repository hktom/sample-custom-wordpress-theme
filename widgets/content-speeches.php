<?php
$_query = new WP_Query(array('p' => 1056, 'post_type'=>'section'));  
$val=[];
if ($_query->have_posts()): 
  while ($_query->have_posts()):
      $_query->the_post();
      $val['speeches_lg']=get_field('shortcode');
      $val['speeches_md']=get_field('shortcode_sm');
      $val['title']=get_the_title();
      $val['content']=get_the_content();
      $val['description']=get_field('description');
      $val['action']=get_field('action');
      $val['action_url']=get_field('action_url');
  endwhile;
?>
<div class="d-none d-lg-block"> <?php display_on_lg($val);?> </div>
<div class="d-lg-none"> <?php display_on_md($val);?> </div>

<?php
endif;
wp_reset_postdata();
function display_on_lg($val){
    ?>
    
<div class="blog-slides">
    <div class="container-fluid main-container">
      <div class="row">
        <div class="col-lg-3 col-12 slider-intro">
          <h2><?php echo $val['title'];?></h2>
          <div><?php echo $val['content'];?></div>

          <div id="carrousel-navigator" class="d-flex justify-content-start">

            <a href="#" class="carrousel-navigator carrousel-navigator-left">
            <span class="iconify" data-icon="gg:arrow-long-left" data-inline="false"></span>
            </a>

            <a href="#" class="carrousel-navigator carrousel-navigator-right">
            <span class="iconify" data-icon="gg:arrow-long-right" data-inline="false"></span>
            </a>

          </div>

                <!-- button -->
      <div class="mt-4">

      <!-- <a class="btn tandem-btn-outline mt-4" 
          href="<?php //echo get_page_link(1768);?>">Toutes les prises de paroles</a> -->

          <a class="link" 
        href="<?php echo get_page_link(1810);?>">
        Toutes les prises de paroles <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>

      </div>
          
          <?php if($val['action_url']!=''):;?>
          <a class="link" href="<?php echo $val['action_url'];?>">
          <?php echo $val['action'];?> <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
          </a>
         <?php endif;?>

        </div>
    
         <div class="col-lg-9" id="speeches">
          <!-- Slide here -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 carroussel px-0">
                <div class="speeches-caroussel">
                        <?php do_shortcode('[wp_list_post post_type="parole_d_entrepreneu"  per_page=10]');?>
                </div>
              </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
}


// display on md
function display_on_md($val){
    ?>

<div class="blog-slides">
   <div class="container" id="speeches-md">
      <div class="row">

                <div class="col-12 py-5 text-center slides-intro-md">
                        <h2><?php echo $val['title'];?></h2>
                        <div><?php echo $val['content'];?></div>
                        <!-- <a class="link" href="<?php //echo $val['action_url'];?>">
                        <?php //echo $val['action'];?> <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a> -->
                </div>

                <!-- mobile screen -->
                <?php do_shortcode('[wp_list_post  post_type="parole_d_entrepreneu" per_page=3 screen=md]');?>
                <!-- mobile screen -->
        </div>
    </div>

          <!-- button -->
          <div class="d-flex justify-content-center mt-lg-5 mb-5 mt-2 mb-lg-0">
         <!-- <a class="btn tandem-btn-outline mt-4" 
          href="<?php //echo get_page_link(1768);?>">Toutes les prises de paroles</a> -->

          <a class="link" 
        href="<?php echo get_page_link(1810);?>">
        Toutes les prises de paroles <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
      </div>

</div>

<?php
}