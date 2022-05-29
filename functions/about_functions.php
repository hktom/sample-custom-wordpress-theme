<?php

//affiche banner bureau
function display_image()
{
    //$_query = new WP_Query(array('post_type' => 'equipe'));
    $data=get_data(['post_type'=>'equipe']);
    $content_html='<div class="card-group" id="equipe">';
    $content_html.='ddd<img src='.$data[0]['banner_image'].' alt="Bureau Tandem" />';
    $content_html.='<h1>hello wordl</h1></div>';
    return $content_html;
}
add_shortcode( 'wp_display_image', 'display_image' );



function display_board_team()
{
   $data=get_data(['post_type'=>'equipe']);
   $content_html='<div id="board" class="row text-center">';
   foreach ($data as $key => $value) {
    if($value['on_board']==true) $content_html.=card_on_board($value['img'], $value['title'], $value['fonction']);
   }

   $content_html.='</div>';
   echo $content_html;
}
add_shortcode('wp_display_board_team', 'display_board_team' );


function card_on_board($image, $title, $fonction){
  return '
  <div class="col-md-6 col-lg-3">
  <img src="'.$image.'" alt="Photo de '.$title.'" class="team_picture"/>
  <h3>'.$title.'</h3>
  <p>'.$fonction.'</p>
    </div>
';
}

function retrieve_team_title_function($data){
  $titles=[];
  foreach ($data as $key => $value) {
    if($value['on_board']!=1){
      if(!in_array($value['fonction'], $titles)){
        $titles[]=$value['fonction'];
      }
    }
  }

  return  $titles;
}

function display_teams()
{
    $content_html="";
    $data=get_data(['post_type'=>'equipe', 'per_page'=>100]);
    $title_section=retrieve_team_title_function($data);

    foreach ($title_section as $title) {
        $content_html.='<div class="col-md-3">';
        $content_html.='<h5>'.$title.'</h5>';
        foreach ($data as $agent) {
          if($agent['fonction']==$title) $content_html.='<p>'.$agent['title'].'</p>';
        }
        $content_html.="</div>";
    }

    echo $content_html;
}
add_shortcode('wp_display_teams', 'display_teams' );

function team_call_to_action($atts, $content=null){
      extract(shortcode_atts(array(
        "title" => '',
        "link" => get_permalink(17),
        "label"=>"Nos clients témoignent"
    ), $atts));
  ?>
  
  <div class="row pt-5 d-flex justify-content-center team-call-to-action">
    <div class="col-md-8">
    <h3 class="title"><?php echo $title;?></h3>
    <p class="description"><?php echo $content;?></p>
    <div class="text-center">
    <a class="link" href="<?php echo $link.'#list-avis'; ?>"> <?php echo $label;?>  <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span> </a>
    </div>
    </div>
  </div>

  <?php
}

add_shortcode('wp_display_team_call_to_action', 'team_call_to_action' );