<div id="header-wrapper" class="bg-white">

    <!-- Menu Nav -->
    <header id="navbar" class="blog-header">
        <div class="container">
            <nav class="navbar navbar-expand-xl navbar-light p-0">
                <a class="navbar-brand d-none d-lg-block" href="<?php echo get_permalink(819); ?>">
                    <img src="<?php echo get_template_directory_uri() . '/images/instant-t.svg'; ?>"
                        style="width:180px" />

                    <?php if (is_page(819)): ?>
                    <br />
                    <span class="logo-legend d-block mt-2">
                        Tout ce que vous avez toujours voulu savoir</span>

                    <span class="logo-legend d-block"> sur la communication
                        <strong> par l’actualité, sans jamais oser le demander </strong>
                    </span>
                    <?php endif;?>
                </a>

                <a class="navbar-brand d-lg-none text-center header-newsroom-mobile"
                    href="<?php echo get_permalink(819); ?>">
                    <img src="<?php echo get_template_directory_uri() . '/images/instant-t.svg'; ?>"
                        style="width:180px" />
                </a>

                <button onclick="openNav()" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="null" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <img src="<?php echo get_template_directory_uri() . '/images/menu-icon.png'; ?>" />
                </button>

                <?php if (is_page(819)): ?>
                <a class="text-center navbar-brand d-block d-lg-none w-100" href="<?php echo get_permalink(819); ?>">
                    <span class="logo-legend d-block mt-2 text-center">
                        Tout ce que vous avez toujours voulu savoir</span>

                    <span class="logo-legend d-block text-center"> sur la communication
                        sur <strong> par l’actualité, sans jamais oser le demander </strong>
                    </span>
                </a>
                <?php endif;?>

                <div class="collapse navbar-collapse order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link btn" href="<?php echo get_permalink(819); ?>">
                                <span class="custom-link"> <span class="iconify" data-icon="ant-design:home-filled"
                                        data-inline="false"></span> </span>
                            </a>
                        </li>
                        <?php theme_nav_menu('Tandem news');?>
                    </ul>

                    <div>
                        <a class="navbar-brand" href="/">
                            <img class="logo"
                                src="<?php echo get_template_directory_uri() . '/images/Logo-tamdem.png'; ?>" />
                        </a>
                        <button class="btn burger" onclick="openNav()"> <img
                                src="<?php echo get_template_directory_uri() . '/images/menu-icon.png'; ?>" /></button>
                    </div>
                </div>
            </nav>
        </div>

    </header>

</div>