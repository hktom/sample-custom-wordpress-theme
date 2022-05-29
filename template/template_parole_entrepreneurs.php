<?php
/*
Template Name: Paroles d'entrepreneurs
*/
get_header();
if (have_posts()):;
while (have_posts()): the_post();
?>

<?php
;?>

   <div id="blog-section-2">
     <div class="container">

     <div class="row">
       <div class="col-lg-8 col-12">
       <h1 class="px-0"> <?php echo get_the_title();?> </h1>
     <div class="page-description"><?php the_content();?></div>
       </div>
     </div>
       <div class="row mt-5">
        <div class="col-lg-8 mt-3">
        <div class="row mb-5" id="infinite-scroll-container" post="parole_d_entrepreneu">
<?php endwhile;endif;?>
        <?php  do_shortcode('[wp_list_post post_type="parole_d_entrepreneu" not_tag=49 per_page=10 screen=single]');?>
        </div>
        </div>
         <!-- sidebar -->
         <div class="col-lg-3 offset-lg-1 px-lg-0  tandem-sidebar">
         <?php 
         this_page_aside();
        //  get_template_part( 'widgets/aside', 'blog' );
         ?>
          </div><!-- end sidebar-->
         </div> <!-- end row-->
       </div><!-- end container-->
     </div><!-- end section-->

<?php
get_footer();


function this_page_aside(){

  ?>

        <!-- Editorial -->
        <div id="sidebar-mission">
        <div class="line"></div>
        <!-- <h4>Editorial</h4> -->
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