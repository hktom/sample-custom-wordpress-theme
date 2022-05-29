
               <!-- Editorial -->
              <div id="sidebar-mission">
                <!-- <h4>Editorial</h4> -->
                <?php
                if(!is_single('844')){
                  echo '<div class="line"></div>';
                  do_shortcode('[wp_edito_slide="post" category="50" per_page=1 words=24]');
                }
               ?>
               </div>

               
                <!-- A lire -->
               <div id="sidebar-a-lire">
                 <div class="line"></div>
                 <h4>A lire aussi</h4>
                 <!-- a lire Post -->
                 <?php 
               do_shortcode('[wp_list_post post_type="post" per_page=5 popular=1 not_tag=49 not_post='.$current_id.']');?>
                </div>

               <div class="spacer"></div>
               <!-- Newsletter -->
               <?php get_template_part( 'widgets/content', 'newsletter' );?>


               <!-- <div class="spacer"></div> -->
               
              <!-- Mission -->
              <!-- <div id="sidebar-mission">
                <div class="line"></div>
                <h4>Les missions Tandem</h4>
                <?php 
               //do_shortcode('[wp_list_post post_type="case_studies" per_page=5 offset=1]');?>
               </div> -->