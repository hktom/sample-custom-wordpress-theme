<?php

// Declaration of theme supported features
function theme_support()
{
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('post-thumbnails'); // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size(125, 125, true); // default thumb size
    add_theme_support('automatic-feed-links'); // rss thingy
    add_theme_support('custom-background', array(
        'default-color' => '#f0f0f0',
        'default-repeat' => 'no-repeat',
        'default-position-x' => 'center',
        'default-attachment' => 'fixed',
    ));
    add_theme_support('custom-header', [
        'flex-width' => true,
        'width' => 1366,
        'flex-height' => true,
        'height' => 350,
        'header-text' => true,
        'default-text-color' => 'ffffff',
        'default-image' => get_template_directory_uri() . '/default_header.jpg',
    ]);
    add_theme_support('title-tag');
    register_nav_menus( // wp3+ menus
        array(
            'main_nav' => __('Main Menu', 'simple-bootstrap'), // main nav in header
        )
    );
    add_image_size('simple_boostrap_featured', 1140, 1140 * (9 / 21), true);
    load_theme_textdomain('simple-bootstrap', get_template_directory() . '/languages');

    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'theme_support');

function my_init()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }

}
add_action('init', 'my_init');

/** * Completely Remove jQuery From WordPress Admin Dashboard */
//add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery()
{
    wp_deregister_script('jquery');
}

function load_style_script()
{

    wp_register_style('wpbs-main-style', get_stylesheet_directory_uri() . '/scss/main.css', array(), null, 'all');
    wp_enqueue_style('wpbs-main-style');

    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array(), null, 'all');

}
add_action('wp_enqueue_scripts', 'load_style_script');

function infinite_scroll_script()
{

    wp_enqueue_script('infinite_scroll_js', get_template_directory_uri() . '/js/infinite_scroll.js', array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'infinite_scroll_script');

// Flicky Caroussel
function flicky_scripts()
{

    wp_enqueue_style('news_slider_css', get_template_directory_uri() . '/scss/news_slider.css', array(), null, 'all');

    wp_enqueue_style('speeches_slider_css', get_template_directory_uri() . '/scss/speeches_slider.css', array(), null, 'all');

    wp_enqueue_style('speeches_slider_home_css', get_template_directory_uri() . '/scss/speeches_slider_home.css', array(), null, 'all');

}
add_action('wp_enqueue_scripts', 'flicky_scripts');

// Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
// This code based on wp_nav_menu's code to get Menu ID from menu slug
function theme_nav_menu($menu_name)
{
    $menu_name = $menu_name;

    if ($menu = wp_get_nav_menu_object($menu_name)) {

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $current_menu = null;

        // Current menu item
        $this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));
        if (isset($this_item->title)) {
            $current_menu = $this_item->title;
        }

        $menu_list = '';

        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $active = "";
            // check if is current menu set active
            if ($title == $current_menu) {
                $active = "active";
            }

            if (is_singular('case_studies') && $title == "Case Studies") {
                $active = "active";
            }

            $menu_list .= '<li class="nav-item ' . $active . '">';
            $menu_list .= '<a class="nav-link" href="' . $url . '">' . $title . '</a>';
            $menu_list .= '</li>';
        }
    } else {
        $menu_list = '<li class="nav-item">
        <a class="nav-link" href="#">Not defined</a> </li>';
    }

    echo $menu_list;

}
// $menu_list now ready to output

// blockquote in brand
function blockquote($atts, $content = null)
{

    extract(shortcode_atts(array(
        "title" => '',
        "italic" => true,
    ), $atts));
    $content_html = '<div class="blockquote">';
    if ($title != '') {
        $content_html .= "<h4> $title </h4>";
    }

    $content_html .= '<p> ';
    if ($italic) {
        $content_html .= '<i> ';
    }

    $content_html .= $content;
    if ($italic) {
        $content_html .= '</i> ';
    }

    $content_html .= '</p> ';
    $content_html .= '</div>';
    return $content_html;

}
add_shortcode('wp_blockquote', 'blockquote');

//list taxonomy from a post
function list_tags($atts, $content = null)
{
    extract(shortcode_atts(array(
        "id" => '',
        'tag' => '',
    ), $atts));

    $terms_name = "";
    $terms = wp_get_post_terms($id, $tag);
    if ($terms) {
        foreach ($terms as $term) {
            $terms_name .= '<span class="tandem-badge my-2">' . $term->name . '</span>';
        }
    }

    return $terms_name;
}
add_shortcode('wp_list_tags', 'list_tags');

//sidebar menu
function sidebar_menu($menu_name)
{
    $menu_name = $menu_name;

    if ($menu = wp_get_nav_menu_object($menu_name)) {

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $current_menu = null;

        // Current menu item
        $this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));
        if (isset($this_item->title)) {
            $current_menu = $this_item->title;
        }

        $menu_list = '';

        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            // check if is current menu set active
            $title == $current_menu ? $menu_list .= '<li class="nav-item active">' : $menu_list .= '<li class="nav-item">';
            $menu_list .= '<a class="nav-link" href="' . $url . '">' . $title . '</a>';
        }
        $menu_list .= '</li>';
    } else {
        $menu_list = '<li class="nav-item">
        <a class="nav-link" href="#">Not defined</a> </li>';
    }

    echo $menu_list;

}

function footer_menu($menu_name)
{
    $menu_name = $menu_name;

    if ($menu = wp_get_nav_menu_object($menu_name)) {

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $current_menu = null;

        // Current menu item
        $this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));
        if (isset($this_item->title)) {
            $current_menu = $this_item->title;
        }

        $menu_list = '';

        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            // check if is current menu set active
            $menu_list .= '<li>';
            $menu_list .= '<a class="menu-footer-link" href="' . $url . '">' . $title . '</a>';
            $menu_list .= '</li>';
        }
    } else {
        $menu_list = '<li class="nav-item">
        <a class="nav-link" href="#">Not defined</a> </li>';
    }

    echo $menu_list;

}

//inner page header
function inner_page_header($attr)
{
    ?>
    <div class="container inner-page-container">
	<div class="row ">
	      <div class="col-sm-12">
	        <?php breadcump();?>
	        <h1><?php echo $attr['title']; ?> </h1>
	        <p class="sub-heading"><?php echo $attr['sub_title']; ?> </p>
	      </div>
	    </div>
  </div>
  <div class="spacer"></div>
    <?php
}

function inner_page_header_proposition($attr)
{
    ?>
    <div class="container inner-page-container">
	<div class="row ">
	      <div class="col-sm-12">
	        <?php breadcump();?>
            </div>
            <div class="col-12 col-md-8">
	        <h1><?php echo $attr['title']; ?> </h1>
	        <p class="sub-heading"><?php echo $attr['sub_title']; ?> </p>
	      </div>
	    </div>
  </div>
  <div class="spacer"></div>
    <?php
}

//inner page single case study
function inner_page_header_case_study($attr)
{
    ?>
    <div class="container inner-page-container">
	<div class="row">
	      <div class="col-md-9 col-sm-12">
          <?php breadcump();?>
	        <h1><?php echo $attr['title']; ?> </h1>
            <!-- <p class="sub-heading"><?php //echo $attr['sub_title'] ;?> </p> -->
        <div class="col-md-9 col-sm-12">
            <div class="description">
                <div class="line"></div>
                <div class="spacer"></div>
                <br>
                <h4><?php echo $attr['description']; ?></h4>
            </div>
        </div>

	      </div>
	    </div>
  </div>
  <div class="spacer"></div>

    <?php
}

/**
 * Add Invisible reCaptcha v3 script
 */
function add_recaptcha()
{
    if (!is_single('new')) {
        // if the page is not where we have the form, returns early
        return;
    }
    // actually adds the reCaptcha
    do_action('google_invre_render_widget_action');
}

/**
 * Validate with Invisible reCaptcha
 * Returns bool
 */
function recaptcha_validate()
{
    $is_valid = apply_filters('google_invre_is_valid_request_filter', true);
    return $is_valid;
}

// newsletter_v2
function form_newsletter()
{
    ?>
       <form action="" method="post">
        <input required type="email" name="email" placeholder="Entrez votre adresse email…">
        <?php echo wp_nonce_field('register-user', '_mynonce'); ?>
        <!-- <input type="hidden" name="form_newsletter" value="submit"/> -->
        <button type="submit" name="submit">Je m'abonne</button>
        <?php do_action('google_invre_render_widget_action');?>
        </form>
    <?php
}
add_shortcode('wp_form_newsletter', 'form_newsletter');

// form newsletter action
function wp_form_newsletter_process()
{
    if (isset($_POST['_mynonce']) && wp_verify_nonce($_POST['_mynonce'], 'register-user')) {

        if (!recaptcha_validate()) {
            http_response_code(400);
            echo "Spam check fails. Please contact us.";
            exit;
        } else {
            $my_post = array(
                'post_title' => wp_strip_all_tags($_POST['email']),
                'post_status' => 'draft',
                'post_type' => 'emails',
            );
            // Insert the post into the database
            wp_insert_post($my_post);
            wp_redirect('/remerciement');
        }
    }
}
add_action('template_redirect', 'wp_form_newsletter_process');
remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts');

// breadcumps
function breadcump()
{

    if (is_singular('case_studies')) {
        ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('
						<p id="breadcrumbs">','</p>');
					}
				?>
            </li>
  
        </ol>
    </nav>

    <?php
} else {
        ?>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('
						<p id="breadcrumbs">','</p>');
					}
				?>
            </li>

        </ol>
    </nav>
    <?php
}
}
add_shortcode('wp_breadcump', 'breadcump');

// Counter view article
function wpb_set_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function getValue($params, $value, $return = 0)
{
    if ($return == 0) {
        return isset($params[$value]) ? $params[$value] : '';
    } else {
        return isset($params[$value]) ? $return : '';
    }

}

function get_pagination($params)
{
    $data = [];
    $_query = new WP_Query(array(
        'post_type' => getValue($params, 'post_type'),
        'posts_per_page' => getvalue($params, 'per_page'),
        'offset' => getvalue($params, 'offset'),
        'cat' => getvalue($params, 'category'),
    ));

    if ($_query->have_posts()) {
        // while ($_query->have_posts()) {
        //     $_query->the_post();
        // }
        $data = paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'total' => $_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'format' => '?paged=%#%',
            'show_all' => false,
            'type' => 'plain',
            'end_size' => 1,
            'mid_size' => 3,
            'prev_next' => true,
            'prev_text' => sprintf('<i></i> %1$s', __('« Précédent ', 'text-domain')),
            'next_text' => sprintf('%1$s <i></i>', __('Suivant »', 'text-domain')),
            'add_args' => false,
            'add_fragment' => '',
        ));
        wp_reset_postdata();

    }

    return $data;
}

function get_data($params)
{
    $data = [];
    $_query = new WP_Query(array(
        'post_type' => getValue($params, 'post_type'),
        //'paged' => $paged,
        'p' => getValue($params, 'post_id'),
        'posts_per_page' => getvalue($params, 'per_page'),
        'offset' => getvalue($params, 'offset'),
        'order' => getvalue($params, 'order'),
        'cat' => getvalue($params, 'category'),
        'post__not_in' => getvalue($params, 'not_post'),
        'tag__not_in' => getvalue($params, 'not_tag'),
        'meta_key' => getvalue($params, 'popular', 'wpb_post_views_count'),
        'orderby' => getvalue($params, 'popular', 'meta_value_num'),
        //'tag' => getvalue($params, 'tag'),
    ));

    if ($_query->have_posts()) {
        while ($_query->have_posts()) {
            $_query->the_post();
            $data[] = array(
                'id' => get_the_ID(),
                'img' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'title' => get_the_title(),
                'content' => get_the_content(),
                'date' => isset($params['tag']) && $params['tag'] == 'edito' ? '' : get_the_date('j M Y'),
                'categories' => get_the_category(),
                'post_tag' => get_the_tags(),
                // 'description' => strip_tags(get_field('description', false, false)),
                'description' => get_field('description'),
                'description_testimony' => get_field('description_testimony'),
                'card_description' => strip_tags(get_field('description', false, false)),
                'chapeau' => get_field('chapeau'),
                'entreprise' => get_field('entreprise'),
                'organisation' => get_field('organisation'),
                'commentaire' => get_field('commentaire'),
                'fonction' => get_field('fonction'),
                'on_board' => get_field('on_board'),
                'banner_image' => get_field('banner_image'),
                'url' => get_field('url'),
                'lien_externe' => get_field('lien_externe'),
                'link' => get_permalink(),
                'nom' => get_field('nom'),
                'photo' => get_field('photo'),
            );
        }
        wp_reset_postdata();

    }

    return $data;
}
//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

include get_template_directory() . "/functions/home_functions.php";
include get_template_directory() . "/functions/brand_functions.php";
include get_template_directory() . "/functions/about_functions.php";
include get_template_directory() . "/functions/client_functions.php";
include get_template_directory() . "/functions/proposition_functions.php";
include get_template_directory() . "/functions/casestudy_functions.php";
include get_template_directory() . "/functions/function_component.php";
include get_template_directory() . "/functions/blog_functions.php";

// disable guntenberg style
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

function endpoint_post($request)
{
    $post_type = (string) $request['post_type'];
    $per_page = (string) $request['per_page'];
    $offset = (string) $request['offset'];
    $category = (string) $request['category'];
    if (isset($post_type)) {
        $data = get_data(['post_type' => $post_type,
            'offset' => isset($offset) ? $offset : 0,
            'category' => $category == 0 ? '' : $category,
            'per_page' => $per_page,
        ]);
        if (sizeof($data) > 0) {
            return rest_ensure_response($data);
        } else {
            return new WP_Error('no_data_found', 'data doesnt exist', array('status' => 404));
        }

    }

    return rest_ensure_response([]);
}

function endpoint_post_routes()
{

    register_rest_route('infinite/v1', '/api/(?P<post_type>[\w]+)', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'endpoint_post',
    ));
}
add_action('rest_api_init', 'endpoint_post_routes');

function sub_word($string, $words)
{
    if (empty($string) || $words == 'all') {
        return $string;
    }
    $arr = explode(' ', $string);
    $string_sub = '';
    //$limit=$words >= sizeof($arr)?sizeof($arr):$words;

    if ($words >= sizeof($arr)) {
        return str_replace('.', '', $string) . '...';
    }

    for ($i = 0; $i < $words; $i++) {
        $string_sub .= ' ' . $arr[$i];
    }

    return $string_sub . '...';
}

///(?P<category>[\d]+)/(?P<page>[\d]+)/(?P<offset>[\d]+)



// Shortcode savoir plus proposition

function item_page_proposition($atts) {
	extract(shortcode_atts(array(
        'id' => '',
    ), $atts));
    
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $id,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
);

// $parents = get_children($args);
$parents = new WP_Query($args);
$output .= "";
$output = "<div id='sidebar-savoir-plus'><div class='line-top'></div><h3>EN SAVOIR PLUS</h3>";

if ( $parents->have_posts() ) : 
$output .= "<ul>";
while ( $parents->have_posts() ) : $parents->the_post();
$output .= "<li>
<a href='".get_the_permalink()."' title='".get_the_title()."'>
".get_the_title('')." <span class='iconify' data-icon='fe:arrow-right' data-inline='false'></span>
</a>
</li>";
endwhile;
$output .= "</ul>";
$output .= "<div class='line-bottom'></div>
    <h3>Nous contacter</h3>
    <a href='".get_site_url()."/contact'><button type='button' class='btn btn-danger button'><span class='iconify pen' data-icon='mdi-light:pencil' data-inline='false'></span>Nous écrire</button></a>
    <a href='tel:022 320 20 32'><button type='button' class='btn btn-dark second-button'><span class='iconify phone' data-icon='feather:phone' data-inline='false'></span>022 320 20 32</button></a>
</div>";

else :
$output = "";

 endif;
wp_reset_postdata();
return $output;   
}
add_shortcode('wp_item_page_proposition', 'item_page_proposition');


// Shortcode savoir plus sous_proposition

function item_sous_proposition($atts) {
	extract(shortcode_atts(array(
			'id' => '',
		), $atts));
		
    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => $id,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
    );
	
	// $parents = get_children($args);
	$parents = new WP_Query($args);
    $output .= "";
	$output = "<div id='sidebar-savoir-plus'><div class='line-top'></div><h3>EN SAVOIR PLUS</h3>";
   
	if ( $parents->have_posts() ) : 
	$output .= "<ul>";
	while ( $parents->have_posts() ) : $parents->the_post();
    $output .= "<li>
    <a href='".get_the_permalink()."' title='".get_the_title()."'>
    ".get_the_title('')." <span class='iconify' data-icon='fe:arrow-right' data-inline='false'></span>
    </a>
    </li>";
    endwhile;
	$output .= "</ul>";
    $output .= "<div class='line-bottom'></div>
        <h3>Nous contacter</h3>
        <a href='".get_site_url()."/contact'><button type='button' class='btn btn-danger button'><span class='iconify pen' data-icon='mdi-light:pencil' data-inline='false'></span>Nous écrire</button></a>
        <a href='tel:022 320 20 32'><button type='button' class='btn btn-dark second-button'><span class='iconify phone' data-icon='feather:phone' data-inline='false'></span>022 320 20 32</button></a>
    </div>";

	else :
	$output = "";
 
 	endif;
	wp_reset_postdata();
	return $output;   
}
add_shortcode('wp_item_sous_proposition', 'item_sous_proposition');