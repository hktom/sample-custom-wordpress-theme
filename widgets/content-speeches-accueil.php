<?php
$_query = new WP_Query(array('p' => 1056, 'post_type'=>'section',"per_page" => '2'));  
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

<?php display_on_lg($val);?>

<?php
endif;
wp_reset_postdata();

?>

<?php
function display_on_lg($val){
    ?>
    

<div id="speeches-caroussel-home" class="blog-slides" style="background-color:white!important">
   <div class="container-fluid">
      <div class="row text-center mb-5">
         <div class="col-md-8 mx-auto">
            <h2><i><?php echo $val['title'];?></i></h2>
            <h5 class="mb-3"><?php
            $content= explode(".", $val['content']); 
            echo $content[0].".";
            ?></h5>
         </div>
      </div>

      <div class="row">
         <div class="col-10 mx-auto caroussel">
            <div class="speeches-caroussel-home">
               <?php 
               do_shortcode('[wp_list_post  post_type="parole_d_entrepreneu"  per_page=15 screen="home"]');
               ?>
            </div>
         </div>
      </div>

      <!-- button -->
      <div class="d-flex justify-content-center mt-lg-5 mb-5 mt-2 mb-lg-0">
         <a class="btn tandem-btn-outline mt-4" 
          href="<?php echo get_page_link(1810);?>">Tous les éditos patronaux</a>
      </div>

   </div>
</div>

<div class="d-lg-none" style="margin-bottom:100px"></div>

<?php
}