<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <?php wp_head();?>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  

</head>

<body id="body" <?php body_class();?>>

	<?php wp_body_open();?>

  <?php
  if(is_page(959) || is_page(957) || is_singular( 'post' ) || is_singular( 'videos' ) || is_page(1289) || is_page(1810) || is_page(1947) || is_page(819)){
    // get_template_part( 'widgets/header', 'blog' );
    get_template_part( 'widgets/header', 'newsroom');
    get_template_part( 'widgets/sidebar', 'blog' );
  }
  else
  {
    get_template_part( 'widgets/sidebar', 'page' );
    get_template_part( 'widgets/header', 'page' );
  }
  ;?>

	
