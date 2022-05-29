<?php

//list CPT Strategies
function list_strategies()
{
    $_query = new WP_Query(array('post_type' => 'strategies'));
    $i = 1;
    if ($_query->have_posts()) {
        while ($_query->have_posts()) {
            $_query->the_post();
            $icon = get_field('icon');
            ?>

     <div class="col-lg-6 col-md-12 col-sm-12 strategie d-flex align-items-start">
     <img src="<?php echo $icon['url']; ?>"/>
     <div>
     <h4><?php the_title();?></h4>
      <p> <?php the_field('description');?> </p>
      <a></a>
      <!-- <a href="<?php //echo get_permalink(10).'/#'.'brand-strategique-'.$i ; ?>" class="d-none"> En savoir plus<span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span> </a> -->
     </div>

    </div>
        <?php
$i++;
     }
     wp_reset_postdata();
        
      }
}
add_shortcode('wp_list_strategies', 'list_strategies');

// List home blogs
function home_blog()
{
    $_query = new WP_Query(array('post_type' => 'post'));
    $i = 1;
    $k= 0;
    $is_even = 'is-even';
    $is_large='';
    if ($_query->have_posts()) {
        while ($_query->have_posts()) {
          $_query->the_post();
          if($i % 2 == 0) $is_even ='is-not-even';
          if($k==0 || $k==3){
            
            if($k==0)
              $is_large="is-large is-large-first";
            else
              $is_large='is-large';
            
            $k=0;
          };
          //if($i % 3 == 0 || $i==1) $is_large='is-large';
          $categorie=get_the_category()[0]->term_id;
          ?>

      <div class="carousel-cell">

      <div class="card <?php echo $is_even.' '.$is_large;?>">
            <div class="card-img-top">
            <img src="<?php echo the_post_thumbnail_url('large');?>" />
            </div>

            <div class="card-body">
              <img class="card-favicon" src="<?php echo get_template_directory_uri() . '/images/favicon.png'; ?>"/>
                <h4 class="card-title">
                <?php
                if($categorie==51):
                echo '<a target="_blank" href="'.get_field('lien_externe').'">';
                the_title();
                echo '</a>';
                else:
                echo '<a href="'.get_permalink().'">';
                the_title();
                echo '</a>';
                endif;
                ?>
                </h4>
                <div class="card-text">
                  <?php 
                  echo sub_word(strip_tags(get_field('description', false, false)), 18);
                  // if(strlen(get_field('description', false, false)) > 300) echo "";?>
                </div>

                <?php
                if($categorie==51):
                echo '<a target="_blank" href="'.get_field('lien_externe').'">';
                echo 'En Savoir plus <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>';
                echo '</a>';
                else:
                echo '<a href="'.get_permalink().'">';
                echo 'Lire la suite <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>';
                echo '</a>';
                endif;
                ?>

                <!-- <a href="<?php //echo get_permalink(); ?>">
                En Savoir plus <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span> -->
                </a>
            </div>
        </div>

      </div>
      
  <?php
  $i++;
  $k++;
  $is_even = 'is-even';
  $is_large='';
        }
        wp_reset_postdata();
      }
}
add_shortcode('wp_home_blog', 'home_blog');

//blog mobile
function home_blog_mobile()
{
    $_query = new WP_Query(array('post_type' => 'post'));
    $i = 1;

    if ($_query->have_posts()) {
        while ($_query->have_posts()) {
            $_query->the_post();
            $categorie=get_the_category()[0]->term_id;
            ?>
    <div class="carousel-cell">
    <div class="card">
  <div class="card-img">
  
  <?php
      if($categorie==51):
      echo '<a target="_blank" href="'.get_field('lien_externe').'">';
      the_post_thumbnail(array(900, 495));
      echo '</a>';
      else:
      echo '<a href="'.get_permalink().'">';
      the_post_thumbnail(array(900, 495));
      echo '</a>';
      endif;
      ?>

  <!-- <a href="<?php //echo get_permalink(); ?>">
  <?php //the_post_thumbnail(array(900, 495));?>
  </a> -->
  
  </div>
  <div class="card-body">
  <img class="card-favicon" src="<?php echo get_template_directory_uri() . '/images/favicon.png'; ?>"/>
    <h4 class="card-title">
    <!-- <a href="<?php //echo get_permalink(); ?>">
    <?php //the_title();?>
    </a> -->
    <?php
      if($categorie==51):
      echo '<a target="_blank" href="'.get_field('lien_externe').'">';
      the_title();
      echo '</a>';
      else:
      echo '<a href="'.get_permalink().'">';
      the_title();
      echo '</a>';
      endif;
      ?>
    </h4>
    <p class="card-text">
    <?php echo sub_word(strip_tags(get_field('description', false, false)), 18);?>
    <?php //if(strlen(get_field('description'))>300) echo "...";?>
    </p>

    <?php
      if($categorie==51):
      echo '<a target="_blank" href="'.get_field('lien_externe').'">';
      echo 'Lire la suite <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>';
      echo '</a>';
      else:
      echo '<a href="'.get_permalink().'">';
      echo 'En Savoir plus <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>';
      echo '</a>';
      endif;
      ?>
    <!-- <a href="<?php //echo get_permalink(); ?>"> En Savoir plus <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
    </a> -->
  </div>
</div>
    </div>

    <?php
$i++;
        }
        wp_reset_postdata();
    }
}

add_shortcode('wp_home_blog_mobile', 'home_blog_mobile');

// List Points
function list_points()
{
    $query = new WP_Query(array('post_type' => 'points'));
    $total=$query->found_posts;
    $medium=$total % 2 == 0? $total /2 :round($total /2);
    if ($query->have_posts()) {
      $i = 1;
        echo '<div class="col-lg-6 col-md-12 col-sm-12 list-point-point">';
        while ($query->have_posts()) {
            $query->the_post();
            $mb=$i>$medium-1?" mb-0":"";
            ?>

           <div class="d-flex flex-row align-items-start list-point-point-items <?php echo $mb ?>">
               <div class='list-point-order'><?php the_field('order');?></div>
               <div class='list-point-content pt-1 paragraph'>
                 <strong><?php the_title();?></strong> <?php the_field('description');?>
                </div>
           </div>
           <?php
$i++;
            if ($i > $medium) {
                break;
            }

        }
        echo '</div>';

        // second row
        echo '<div class="col-lg-6 col-md-12 col-sm-12 list-point-point">';
        while ($query->have_posts()) {
            $query->the_post();

            ?>

         <div class="d-flex flex-row align-items-start list-point-point-items">
             <div class='list-point-order'><?php the_field('order');?></div>
             <div class='list-point-content pt-1 paragraph'>
               <strong><?php the_title();?></strong> <?php the_field('description');?>
              </div>
         </div>
         <?php

        }
        echo '</div>';

    }
    wp_reset_postdata();
}
add_shortcode('wp_list_points', 'list_points');

// newsletters_home
function newsletters_home(){

  ?>

     <form>
        <div class="input-group mt-4 mb-4">
          <!-- Contact Form ShortCode -->
          <input type="text" class="form-control" placeholder="Entrez votre adresse email…" aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary py-0" type="submit" id="button-addon2"><?php echo "Je teste"; ?></button>
          </div>
        </div>
      </form>

  <?php
}

add_shortcode('wp_newsletters_home', 'newsletters_home');