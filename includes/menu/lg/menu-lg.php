<div id="header-lg-left" class="position-fixed">

<?php
    foreach ($lgMenuItems as $lgItem) :
?>
        <a href="" 
           class="menu-item menu-item-effect d-inline-flex align-items-center <?= $lgItem[ 'classes' ] ?>"
           data-class="<?= $lgItem[ 'classes' ] ?>">
            <span class="hover hover-item d-inline-block position-relative text-center"><?= $lgItem[ 'title' ] ?></span>
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

<div id="header-lg-right" class="position-fixed text-right">
    <a id="site-title" href="<?= home_url() ?>" class="menu-item-effect d-inline-flex align-items-center">
        <span class="hover hover-item d-inline-block position-relative text-center"><?= get_bloginfo( 'name' ) ?></span>
    </a>
</div>

<div id="lg-menu" class="position-fixed h-100 w-100 d-md-none">
    <div id="lg-menu-left" class="position-absolute h-100">
        <div class="tabcontent menu-projects text-center d-none">
<?php
            if ( $total > ALTM_MAX_PROJECTS ) :
                $lgItemCount = 0;

                while ( $lgItemCount <  ALTM_MAX_PROJECTS ) :
                    $project = $projects[ $lgItemCount ];
?>
                    <a class="menu-project-link menu-item-effect d-inline-flex" 
                        href="<?= $project[ 'link' ] ?>">
                        <span class="hover hover-item d-inline-block position-relative text-center" 
                              data-target-bg="<?= $project[ 'slug' ] ?>">
                            <?= $project[ 'title' ] ?>
                        </span>
                    </a>
                    <br/>                    
<?php                    
                    $lgItemCount++;
                endwhile;
?>
                <span id="load-more-projects" class="panel">
<?php
                    while ( $lgItemCount < $total ) :
                        $project = $projects[ $lgItemCount ];
?>
                        <a class="menu-project-link panel-link menu-item-effect d-inline-flex" 
                            href="<?= $project[ 'link' ] ?>">
                            <span class="hover hover-item d-inline-block position-relative text-center" 
                                data-target-bg="<?= $project[ 'slug' ] ?>">
                                <?= $project[ 'title' ] ?>
                            </span>
                        </a>
                        <br/>                       
<?php
                        $lgItemCount++;
                    endwhile;
?>
                </span>
                <button class="accordion d-inline-flex align-items-center justify-content-center" data-target="projects" data-type="project">
                    <h2 data-target="projects">
<?php  
                        if ( ICL_LANGUAGE_CODE === 'es' ) :
                            echo 'Ver todo';
                        else :
                            echo 'See all';
                        endif;
?>
                    </h2>
                    <svg data-target="projects" class="arrow-down" width="20px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g fill="#000000">
                                <polygon transform="translate(12.008204, 11.870000) rotate(180) translate(-12.008204, -11.870000) " points="10.6201641 1 10.6201641 18.4910817 2.47937999 10.6359391 0.83694108 12.3854936 11.6511516 22.7399998 12.3295503 22.7399998 23.179466 12.3854936 21.505785 10.6359391 13.3650009 18.4910817 13.3650009 1"></polygon>
                            </g>
                        </g>
                    </svg>          
                </button>
<?php
            else :
                foreach( $projects as $project ) :
?>
                    <a class="menu-project-link menu-item-effect d-inline-flex" 
                       href="<?= $project[ 'link' ] ?>">
                        <span class="hover hover-item d-inline-block position-relative text-center" 
                              data-target-bg="<?= $project[ 'slug' ] ?>">
                            <?= $project[ 'title' ] ?>
                        </span>
                    </a>
                    <br/>
<?php
                endforeach;
            endif;
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
    <div class="lg-menu-right h-100"></div>
<?php
        foreach( $projects as $project ) :
?>
            <div class="lg-menu-right position-absolute h-100"
                 data-id="<?= $project[ 'slug' ] ?>"
                 data-menu-bg="<?= $project[ 'color' ] ?>"
                 style="background-image: url('<?= $project[ 'image' ] ?>')"></div>
<?php
        endforeach;
?>
</div>