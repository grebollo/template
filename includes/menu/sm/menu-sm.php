<div id="header-sm-left" class="position-fixed">
    <a href="" class="toggle-menu menu-item menu-item-effect" data-class="menu-projects">
        <span class="hover hover-item d-inline-block position-relative">Menu</span>
    </a>
</div>

<div id="header-sm-right" class="position-fixed text-right">
    <a id="site-title" href="<?= home_url() ?>" class="menu-item-effect d-inline-flex align-items-center">
        <span class="hover hover-item d-inline-block position-relative text-center"><?= get_bloginfo( 'name' ) ?></span>
    </a>
</div>

<div id="sm-menu" class="position-fixed h-100 w-100 d-lg-none">
    <div id="sm-menu-heading" class="position-fixed w-100">
<?php
        foreach ($smMenuItems as $smItem) :
?>
            <a href="<?= $smItem[ 'url' ] ?>" 
               class="menu-item menu-item-effect d-inline-flex align-items-center <?= $smItem[ 'classes' ] ?>"
               data-class="<?= $smItem[ 'classes' ] ?>">
                <span class="hover hover-item d-inline-block position-relative text-center"><?= $smItem[ 'title' ] ?></span>
            </a>
<?php

        endforeach;

        do_action( 'wpml_add_language_selector' );
?>
        <svg class="close-menu toggle-menu position-absolute" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                <g stroke="#0F0F0F" stroke-width="1.5">
                    <g transform="translate(1.000000, 1.000000)">
                        <path d="M0.458333333,0.458333333 L21.5416667,21.5416667" id="Line"></path>
                        <path d="M21.5416667,0.458333333 L0.458333333,21.5416667" id="Line-2"></path>
                    </g>
                </g>
            </g>
        </svg>
    </div>
    <div id="sm-tabs-container">
        <div class="tabcontent menu-projects text-center d-none">
<?php
            foreach( $projects as $project ) :
?>
                <div class="menu-project-sm">
                    <a href="<?= $project[ 'link' ] ?>">
                        <img src="<?= $project[ 'image' ] ?>" class="img-fluid d-block" />
                    </a>
                    <a class="menu-project-link menu-item-effect d-block text-left" href="<?= $project[ 'link' ] ?>">
                        <span class="hover hover-item d-inline-block position-relative text-center">
                            <?= $project[ 'title' ] ?>
                        </span>
                    </a>
                </div>
<?php
            endforeach;
?>
        </div>
        <div class="tabcontent menu-info text-center d-none">
            <div id="contact"><?= $contact ?></div>
            <div id="about-us">
                <a class="menu-item-effect d-inline-flex accordion" data-type="info" data-target="about-us">
                    <span class="hover hover-item d-inline-block position-relative text-center">
                        <?= $team[ 'texto_identificativo' ] ?>
                        <img class="arrow-down d-inline-block" src="<?= get_stylesheet_directory_uri() . '/img/arrow-down.svg' ?>" />
                    </span>
                </a>
                <span id="load-more-about-us" class="panel">
                    <span id="about-us-content" class="d-block accordion-info-content" >
                        <?= $team[ 'descripcion' ] ?>
                    </span>
                    <a href="" class="close-more" data-target="about-us">
                        <img class="arrow-up d-block" src="<?= get_stylesheet_directory_uri() . '/img/arrow-up.svg' ?>" />
                    </a>
                </span>
                <a class="menu-item-effect d-inline-flex accordion" data-type="info" data-target="caps">
                    <span class="hover hover-item d-inline-block position-relative text-center">
                        <?= $caps[ 'texto_identificativo' ] ?>
                        <img class="arrow-down d-inline-block" src="<?= get_stylesheet_directory_uri() . '/img/arrow-down.svg' ?>" />
                    </span>
                </a>
                <span id="load-more-caps" class="panel">
                    <span id="caps-content" class="d-block accordion-info-content" >
                        <p>
<?php
                            foreach ( $capsContents as $cap ) :
?>
                                <span><?= $cap[ 'capacidad' ] ?></span>
                                <br/>
<?php
                        endforeach;
?>
                        </p>
                    </span>
                    <a href="" class="close-more" data-target="caps">
                        <img class="arrow-up d-block" src="<?= get_stylesheet_directory_uri() . '/img/arrow-up.svg' ?>" />
                    </a>
                </span>
                <a class="menu-item-effect d-inline-flex accordion" data-type="info" data-target="clients">
                    <span class="hover hover-item d-inline-block position-relative text-center">
                        <?= $clients[ 'texto_identificativo' ] ?>
                        <img class="arrow-down d-inline-block" src="<?= get_stylesheet_directory_uri() . '/img/arrow-down.svg' ?>" />
                    </span>
                </a>
                <span id="load-more-clients" class="panel">
                    <span id="clients-content" class="d-block accordion-info-content" >
                        <p>
<?php
                            foreach ( $clientsContents as $client ) :
?>
                                <span><?= $client[ 'cliente' ] ?></span>
                                <br/>
<?php
                        endforeach;
?>
                        </p>
                    </span>
                    <a href="" class="close-more" data-target="clients">
                        <img class="arrow-up d-block" src="<?= get_stylesheet_directory_uri() . '/img/arrow-up.svg' ?>" />
                    </a>
                </span>
            </div>
        </div> 
    </div>
</div>