<div id="header-wrapper" class="bg-white">

    <!-- Menu Nav -->
    <header id="navbar" class="blog-header">
        <div class="container">
            <nav class="navbar navbar-expand-xl navbar-light p-0">
                <div class="collapse navbar-collapse order-3 dual-collapse2">
                    <div class='d-flex justify-content-between w-100'>
                        <ul class="navbar-nav">
                            <?php theme_nav_menu('newsroom left');?>
                        </ul>
                        <div class="flex-grow-1 d-flex justify-content-center">
                        <a class="navbar-brand" href="<?php echo get_permalink(819); ?>">
                            <img src="<?php echo get_template_directory_uri() . '/images/instant-t.svg'; ?>" />
                        </a>
                        </div>

                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn" href="<?php echo get_site_url(); ?>">
                                <span class="custom-link"> <span class="iconify" data-icon="ant-design:home-filled"
                                        data-inline="false"></span> </span>
                            </a>
                        </li>
                            <?php theme_nav_menu('newsroom right');?>
                        </ul>
                    </div>

                    <div>
                        <button class="btn burger" onclick="openNav()"> <img
                                src="<?php echo get_template_directory_uri() . '/images/menu-icon.png'; ?>" /></button>
                    </div>
                </div>

                <!-- mobile -->

                <div class="d-lg-none d-xlg-flex"></div>

                <a class="navbar-brand d-xlg-block d-lg-none text-center" href="<?php echo get_permalink(819); ?>">
                    <img src="<?php echo get_template_directory_uri() . '/images/instant-t.svg'; ?>" />
                </a>

                <div class="d-lg-none d-xlg-flex">
                    <button class="btn burger" onclick="openNav()"> <img
                            src="<?php echo get_template_directory_uri() . '/images/menu-icon.png'; ?>" /></button>
                </div>

                <!-- mobile -->

            </nav>

            <?php if (is_page(819)): ?>
            <div class="text-center mt-4 mb-5 logo-legend">
                <span class="logo-legend d-block">
                    Tout ce que vous avez toujours voulu savoir sur <strong>la communication </strong> </span>

                <span class="logo-legend d-block">
                    <strong> par l’actualité</strong>, sans jamais oser le demander
                </span>
            </div>
            <?php endif;?>

        </div>

    </header>

    <style type="text/css">
    .navbar-brand {
        display: block;
        width: 282px;
        /* margin:auto; */
        margin-left: 16px !important;
    }

    .navbar-brand img {
        width: 100% !important;
    }

    header .navbar-nav {
        margin-left: 0px !important;
    }

    @media screen and (max-width:1199px) {
        .navbar-brand {
            width: 206px !important;
        }

        .d-xlg-block {
            display: block !important;
        }

        .d-xlg-flex {
            display: flex !important;
        }
    }

    .resize-logo{
        width: 150px !important;
    }
    </style>

</div>