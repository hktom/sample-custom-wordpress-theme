<?php
/*
Template Name: Poids de mots
*/
get_header();
if (have_posts()):;
while (have_posts()): the_post();
?>

<?php
;?>

   <div id="blog-section-2">
     <div class="container">
     <h1 class="px-0"> <?php echo get_the_title();?> </h1>
       <div class="row mt-5">
        <div class="col-lg-8 col-12 mt-3">
        <div class="row mb-5" id="infinite-scroll-container" post="posts" category="52">
<?php endwhile;endif;?>
        <?php  do_shortcode('[wp_list_post post_type="post" category="52" per_page=10]');?>
        </div>
        </div>
         <!-- sidebar -->
         <div class="col-lg-3 px-lg-0 offset-lg-1 tandem-sidebar">
         <?php 
         this_page_aside_actu();
         //get_template_part( 'widgets/aside', 'blog' );
         ?>
          </div><!-- end sidebar-->
         </div> <!-- end row-->
       </div><!-- end container-->
     </div><!-- end section-->

<?php
get_footer();

function this_page_aside_actu(){

  ?>
  
        <!-- Editorial -->
        <div id="sidebar-mission">
        <div class="line"></div>
        <!-- <h4>Éditorial</h4> -->
        <?php 
        do_shortcode('[wp_edito_slide="post" category="50" per_page=1 words=24]');?>
        </div>
  
        <div class="spacer"></div>
  
        <!-- A lire -->
        <div id="sidebar-a-lire">
        <div class="line"></div>
        <h4>A lire aussi</h4>
        <!-- a lire Post -->
        <?php
        do_shortcode('[wp_list_post post_type="post" per_page=5 offset=1 popular=1 category=-50]');?>
      </div>
  
      <div class="spacer"></div>
      <!-- Newsletter -->
      <?php get_template_part('widgets/content', 'newsletter');?>
  
  
      <div class="spacer"></div>
  
  
  <?php
  }
