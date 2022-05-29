<?php
// list top article
function list_post($atts)
{
    extract(shortcode_atts(array(
        "per_page" => '1',
        "offset" => '0',
        "post_type" => 'post',
        "popular" => 0,
        "screen" => "lg",
        "category" => "",
        "tag"=>"",
        "not_tag"=>"",
        "not_post"=>"",
        "post_id"=>"",
        'post_id' => '',
    ), $atts));

    $data=get_data([
        'post_type' => $post_type,
        'post_id' => $post_id,
        'per_page' => $per_page,
        'offset' => $offset,
        'order' => 'DESC',
        'category' => $category,
        'tag' => $tag,
        'not_post' => array($not_post),
        'not_tag' => array($not_tag),
        'meta_key' => $popular==1?'wpb_post_views_count':'',
        'orderby' => $popular==1?'meta_value_num':'',
        ]);

    if($post_type=="post"){
        foreach ($data as $value) {
            if($popular==0) card($value, $per_page);
            if($popular==1) inline($value);
        }

        //pagination($data['pagination']);
    }

    if($post_type=="videos") {
        foreach ($data as $value) {
            video($data, $per_page);
        }
    } 

    if($post_type=="parole_d_entrepreneu") {
        foreach ($data as $value) {
            if($screen=="single") card_paroles_entrepreneurs($value, $per_page);
            if($screen=="home") slides_home($value);
            if($screen=="lg") slides($value);
            if($screen=="md") md_slides($value);
            if($screen=="all") edito($value, 2);
        }
    };
    

    if($post_type=="case_studies") {
        foreach ($data as $value) {
            if($per_page==1) jumbotron($value);
            if($per_page>1) inline($value);
        }
    }

}
add_shortcode('wp_list_post', 'list_post');
function list_post_edi($atts)
{
    extract(shortcode_atts(array(
        "per_page" => '1',
        "offset" => '0',
        "post_type" => 'post',
        "popular" => 0,
        "screen" => "lg",
        "category" => "",
        "tag"=>"",
        "not_tag"=>"",
        "not_post"=>"",
        "post_id"=>"",
        'post_id' => '',
    ), $atts));

    $data=get_data([
        'post_type' => $post_type,
        'post_id' => $post_id,
        'per_page' => $per_page,
        'offset' => $offset,
        'order' => 'DESC',
        'category' => $category,
        'tag' => $tag,
        'not_post' => array($not_post),
        'not_tag' => array($not_tag),
        'meta_key' => $popular==1?'wpb_post_views_count':'',
        'orderby' => $popular==1?'meta_value_num':'',
        ]);

    if($post_type=="post"){
        foreach ($data as $value) {
            if($popular==0) card_simples($value, $per_page);
            if($popular==1) inline($value);
        }

        //pagination($data['pagination']);
    }

    if($post_type=="videos") {
        foreach ($data as $value) {
            video($data, $per_page);
        }
    } 

    if($post_type=="parole_d_entrepreneu") {
        foreach ($data as $value) {
            if($screen=="single") card_paroles_entrepreneurs($value, $per_page);
            if($screen=="home") slides_home($value);
            if($screen=="lg") slides($value);
            if($screen=="md") md_slides($value);
            if($screen=="all") edito($value, 2);
        }
    };
    

    if($post_type=="case_studies") {
        foreach ($data as $value) {
            if($per_page==1) jumbotron($value);
            if($per_page>1) inline($value);
        }
    }

}
add_shortcode('wp_list_post_edi', 'list_post_edi');


function list_post_edito($atts)
{
    extract(shortcode_atts(array(
        "per_page" => '1',
        "offset" => '0',
        "post_type" => 'post',
        "popular" => 0,
        "screen" => "lg",
        "category" => "",
        "tag"=>"",
        "not_tag"=>"",
        "not_post"=>"",
        "post_id"=>"",
        'post_id' => '',
    ), $atts));

    $data=get_data([
        'post_type' => $post_type,
        'post_id' => $post_id,
        'per_page' => $per_page,
        'offset' => $offset,
        'order' => 'DESC',
        'category' => $category,
        'tag' => $tag,
        'not_post' => array($not_post),
        'not_tag' => array($not_tag),
        'meta_key' => $popular==1?'wpb_post_views_count':'',
        'orderby' => $popular==1?'meta_value_num':'',
        ]);

    if($post_type=="post"){
        foreach ($data as $value) {
            if($popular==0) card_editos($value, $per_page);
            if($popular==1) inline($value);
        }

        //pagination($data['pagination']);
    }

    if($post_type=="videos") {
        foreach ($data as $value) {
            video($data, $per_page);
        }
    } 

    if($post_type=="parole_d_entrepreneu") {
        foreach ($data as $value) {
            if($screen=="single") card_paroles_entrepreneurs($value, $per_page);
            if($screen=="home") slides_home($value);
            if($screen=="lg") slides($value);
            if($screen=="md") md_slides($value);
            if($screen=="all") edito($value, 2);
        }
    };
    

    if($post_type=="case_studies") {
        foreach ($data as $value) {
            if($per_page==1) jumbotron($value);
            if($per_page>1) inline($value);
        }
    }

}
add_shortcode('wp_list_post_edito', 'list_post_edito');


function edito_slide($atts)
{
    extract(shortcode_atts(array(
        "per_page" => '1',
        "offset" => '0',
        "post_type" => 'post',
        "popular" => 0,
        "screen" => "lg",
        "category" => "",
        "tag"=>"",
        "not_tag"=>"",
        "not_post"=>"",
        "post_id"=>"",
        "words"=>0,
    ), $atts));

    $data=get_data([
        'post_id' => $post_id,
        'post_type' => $post_type,
        'per_page' => $per_page,
        'offset' => $offset,
        'order' => 'DESC',
        'category' => $category,
        'tag' => $tag,
        'not_post' => array($not_post),
        'not_tag' => array($not_tag),
        'meta_key' => $popular==1?'wpb_post_views_count':'',
        'orderby' => $popular==1?'meta_value_num':'',
        ]);

        foreach ($data as $value) {
            card_edito($value, $words);
        }

}
add_shortcode('wp_edito_slide', 'edito_slide');


function list_post_pagination($atts)
{
    extract(shortcode_atts(array(
        "per_page" => '1',
        "offset" => '0',
        "post_type" => 'post',
        "popular" => 0,
        "screen" => "lg",
        "category" => "",
        "tag"=>"",
        "not_tag"=>"",
        "not_post"=>"",
        "post_id"=>"",
        'post_id' => '',
    ), $atts));

    $data=get_pagination([
        'post_type' => $post_type,
        'post_id' => $post_id,
        'per_page' => $per_page,
        'offset' => $offset,
        'order' => 'DESC',
        'category' => $category,
        'tag' => $tag,
        'not_post' => array($not_post),
        'not_tag' => array($not_tag),
        'meta_key' => $popular==1?'wpb_post_views_count':'',
        'orderby' => $popular==1?'meta_value_num':'',
        ]);

        return $data;

}
add_shortcode('wp_list_post_pagination', 'list_post_pagination');