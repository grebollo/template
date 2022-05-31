<?php

$data = $field[ 's5_color_fondo_imagen_drcha_texto_izda' ];

if ( !wp_is_mobile() ) :

?>

    <div class="section bg-color-img-text" style="background-color: <?= $data[ 's5_color_fondo' ] ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
                    <div class="text-container text-center" style="color: <?= $data[ 's5_color_texto' ] ?>">
                        <?php 
                            echo $data[ 's5_texto' ];

                            if ( $data[ 's5_linea_bajo_texto' ] === 'si' ) :
                        ?>
                                <span class="text-line d-block" style="background-color: <?= $data[ 's5_color_linea_post_texto' ] ?>"></span>
                        <?php    
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
                    <img src="<?= $data[ 's5_imagen_drcha' ] ?>" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>

<?php

else:

?>

    <div class="section bg-color-img-text" style="background-color: <?= $data[ 's5_color_fondo' ] ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="text-container text-center" style="color: <?= $data[ 's5_color_texto' ] ?>">
                        <?php 
                            echo $data[ 's5_texto' ];

                            if ( $data[ 's5_linea_bajo_texto' ] === 'si' ) :
                        ?>
                                <span class="text-line d-block" style="background-color: <?= $data[ 's5_color_linea_post_texto' ] ?>"></span>
                        <?php    
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-color-img-text" style="background-color: <?= $data[ 's5_color_fondo' ] ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <img src="<?= $data[ 's5_imagen_drcha' ] ?>" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>

<?php

endif;