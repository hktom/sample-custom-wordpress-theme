<?php

function card($data, $per_page)
{
    if ($data['categories'][0]->term_id == 51){
        card_veille($data, $per_page);
    }
    else{
        card_simple($data, $per_page);

    }
}
function card_editos($data, $per_page)
{
    if ($data['categories'][0]->term_id == 51){
        card_veille($data, $per_page);
    }
    else{
        card_editorial($data, $per_page);

    }
}


function card_simple($data, $per_page){
    $col = "post ";
    $sub = 'all';
    if ($per_page > 1) {
        $col .= "col-lg-6 col-12 card-img";
        $sub = 20;
    }
    
    echo '<div class="'. $col.'">
     <div class="card">
     <a id="img-box" href="'. $data['link'].'">
     <img src="'. $data['img'].'"/>
     </a>
    <div class="card-body">
            <div class="post-tag">'.$data['date'].'</div>
            <h3 class="card-title">
                <a href="'. $data['link'].'">'.$data['title'].'</a>
            </h3>
            <div class="d-flex align-items-end">
              <div class="card-text"> <p class="words"> '.sub_word($data['card_description'], $sub).'</p> </div>
                <a class="link" href="'.$data['link'].'">
                <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
                </a>
            </div>
        </div>
        </div>
</div>';
    
}

function card_editorial($data, $per_page){
    $col = "post ";
    $sub = 'all';
    if ($per_page > 1) {
        $col .= "col-lg-6 col-12 card-img";
        $sub = 20;
    }
    
    echo '<div class="'. $col.'">
     <div class="card">
     <a id="img-box" href="'. $data['link'].'">
     <img src="'. $data['img'].'"/>
     </a>
    <div class="card-body">

            <h3 class="card-title">
                <a href="'. $data['link'].'">'.$data['title'].'</a>
            </h3>
            <div class="d-flex align-items-end">
              <div class="card-text"> <div class="words"> '.html_entity_decode($data['description']).'</div> </div>
                <a class="link" href="'.$data['link'].'">
                <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
                </a>
            </div>
        </div>
        </div>
</div>';
    
}
function card_simples($data, $per_page){
    $col = "post ";
    $sub = 'all';
    if ($per_page > 1) {
        $col .= "col-lg-6 col-12 card-img";
        $sub = 20;
    }
    
    echo '<div class="'. $col.'">
     <div class="card">
     <a id="img-box" href="'. $data['link'].'">
     <img src="'. $data['img'].'"/>
     </a>
    <div class="card-body">

            <h3 class="card-title">
                <a href="'. $data['link'].'">'.$data['title'].'</a>
            </h3>
            <div class="d-flex align-items-end">
              <div class="card-text"> <p class="words"> '.subword($data['card_description'], $sub).'</p> </div>
                <a class="link" href="'.$data['link'].'">
                <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
                </a>
            </div>
        </div>
        </div>
</div>';
    
}

function card_veille($data, $per_page){
    $col = "post ";
    $sub = -1;
    if ($per_page > 1) {
        $col .= "col-lg-6 col-12 card-img";
        $sub = 20;
    }
    
    echo '<div class="'. $col.'">
     <div class="card card-veille">
     
     <a id="img-box" target="_blank" href="'.$data['lien_externe'].'">
     <img src="'.$data['img'].'"/>
     </a>
    <div class="card-body">
            <div class="post-tag">'.$data['date'].'</div>
            <h3 class="card-title">
                <a target="_blank"  href="'.$data['lien_externe'].'">'. $data['title'].'</a>
            </h3>
            <div class="d-flex align-items-end">
              <div class="card-text"><p>'.sub_word($data['card_description'],$sub).'</p></div>

        <a class="link" target="_blank" href="'.$data['lien_externe'].'">
        <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
        </a>
            </div>
        </div>
        </div>
</div>';

?>

<style type="text/css">
.card-veille::before {
    content: '';
    width: 40px;
    height: 40px;
    position: absolute;
    left: 0;
    top: 8px;
    z-index:9;
    background-image: url('<?php echo get_template_directory_uri();?>/images/Fichier 9.svg');
    background-size: 40px 40px;
    background-position: left top;
    background-repeat: no-repeat;

}
</style>

<?php
}

function jumbotron($data)
{
    ?>
<div>
    <div><?php echo $data['date']; ?></div>
    <h3><?php echo $data['title']; ?></h3>
    <?php if ($data['chapeau'] != ''): ?>
    <div class="d-flex justify-content-start">
        <div><?php echo $data['chapeau']; ?></div>
    </div>
    <?php endif;?>
    <a class="link" href="<?php echo $data['link']; ?>">Découvrir <span class="iconify" data-icon="fe:arrow-right"
            data-inline="false"></span></a>

</div>
<?php
}

function inline($data)
{
    $categorie = sizeof($data['categories']) > 0 ? $data['categories'][0]->term_id : 0;
    ?>
<!-- Mission Post -->
<div class="mission-post">
    <div class="post-tag mt-4"><?php //echo get_the_date( 'M Y' );?></div>
    <?php if ($categorie == 51): ?>
    <a target="_blank" href="<?php echo $data['lien_externe']; ?>">
        <?php else: ?>
        <a href="<?php echo $data['link']; ?>">
            <?php endif?>

            <h4><?php echo $data['title']; ?></h4>
        </a>
</div>
<?php
}

function video($data, $per_page)
{
    $col = "post ";
    $sub = 200;
    if ($per_page > 1) {
        $col .= "col-lg-6 col-12 card-img";
        $sub = 80;
    }
    $data['img'] = $data['img'];
    ?>
<div class="<?php echo $col; ?>">
    <div class="card">
        <a href="<?php echo $data['link']; ?>">
            <img src="<?php echo $data['img']; ?>" />
        </a>
        <div class="card-body">
            <h3 class="card-title">
                <a href="<?php echo $data['link']; ?>">
                    <span class="iconify" data-icon="bi:play-fill" data-inline="false"></span>
                    <?php echo $data['title']; ?>
                </a>
            </h3>
            <div class="post-tag"><?php echo $data['date']; ?></div>
        </div>
    </div>
</div>
<?php
}

function slides_home($data)
{

    echo ' 
           <div class="speeches-slide-item">
             <div>
                <a href="' . $data['url'] . '" target="_blank">
                <img src="' . $data['img'] . '" />
                </a>
             </div>
             <h5>
                <a href="' . $data['url'] . '" target="_blank">
                ' . $data['title'] . '
                </a>
              </h5>
            <div class="card-text d-none">'.$data['description']. '</div>
         </div>
    ';
}

// Card paroles d'entrepreneurs
function card_paroles_entrepreneurs($data, $per_page)
{
    $col = "post ";
    $sub = -1;
    if ($per_page > 1) {
        $col .= "col-lg-6 col-12 card-img";
        $sub = 80;
    }
    ?>
<div class="<?php echo $col; ?>">
    <div class="card">
        <a id="img-box" target="_blank" href="<?php echo $data['url']; ?>">
            <img src="<?php echo $data['img']; ?>" />
        </a>
        <div class="card-body">
            <div class="post-tag"><?php echo $data['date']; ?></div>
            <h3 class="card-title">
                <a target="_blank" href="<?php echo $data['url']; ?>">
                    <?php echo $data['title']; ?>
                </a>
            </h3>
            <div class="d-flex align-items-end">
                <div class="card-text"><?php echo $data['description']; ?></div>
                <a class="link" target="_blank" href="<?php echo $data['url']; ?>"> <span class="iconify"
                        data-icon="fe:arrow-right" data-inline="false"></span></a>
            </div>
        </div>
    </div>
</div>
<?php
}

function slides($data)
{

    echo '           <div class="speeches-caroussel-cell">
                <div class="card">
                <div class="d-flex justify-content-start speeches">
                    <div class="speeches-img">
                      <a href="' . $data['url'] . '" target="_blank">
                      <img src="' . $data['img'] . '" />
                      </a>
                    </div>
                    <div class="speeches-body">
                    <div class="post-tag">
                        <div>' . $data['date'] . '</div>
                        <div>' . the_field('entreprise') . '</div>
                    </div>
                    <h5 class="card-title">
                        <a href="' . $data['url'] . '" target="_blank">
                        ' . $data['title'] . '
                        </a>
                    </h5>
                    <div class="d-flex align-items-end">
                      <div class="card-text">
                      ' . $data['description'] . '</div>
                      <a class="link" target="_blank" href="' . $data['url'] . '">
                    <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
                    </a>
                    </div>
                    </div>
                </div>
          </div>
          </div>
';
}

function md_slides($data)
{
    //$data['img']=$data['img'];
    ?>
<div class="col-12 speeches-md py-5">
    <div class="d-flex justify-content-start">
        <a class="link-none" target="_blank" href="<?php echo $data['url']; ?>">
            <img src="<?php echo $data['img']; ?>" />
        </a>
        <div class="speeches-body">
            <div class="post-tag">
                <?php echo $data['date']; ?>
                <?php echo get_field('entreprise'); ?>
            </div>
            <h5 class="card-title">
                <a class="link-none" target="_blank" href="<?php echo $data['url']; ?>">
                    <?php echo $data['title']; ?>
                </a>
            </h5>
            <p class="card-text"><?php echo $data['description']; ?></p>
            <a class="link" target="_blank" href="<?php echo $data['url']; ?>">
                <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span>
            </a>
        </div>
    </div>

</div>
<?php
}

function card_edito($data, $words=0)
{
    //$categorie = $data['categories'][0]->term_id;
    $description=$data['description'];
    if($words>0){
        $description=sub_word($description, $words);
    }
    echo '
    <div class="post card-edito col-12 card-img px-0 mt-n2">
     <div class="card">

        <div class="card-body">
        <h3 class="card-title">
        <a href="'. $data['link'].'">'. $data['title'].'</a>
        </h3>
            
            <div class="card-text mt-2"> '.$description.' </div>
            
            <div class="d-flex align-items-center justify-content-between mt-3">
              <div class="author"> <img src="'. $data['photo'].'" class="mr-2"/> Par '. $data['nom'].'</div>

                <a class="link" href="'. $data['link'].'">
                    <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
            </div>
        </div>
        </div>
    </div>';
    
}