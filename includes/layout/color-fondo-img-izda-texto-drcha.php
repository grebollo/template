<?php

$data = $field[ 's4_color_fondo_imagen_izda_texto_drcha' ];

if ( !wp_is_mobile() ) :

?>

    <div class="section bg-color-img-text" style="background-color: <?= $data[ 's4_color_fondo' ] ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
                    <img src="<?= $data[ 's4_imagen_izda' ] ?>" class="img-fluid" />
                </div>
                <div class="col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
                    <div class="text-container text-center" style="color: <?= $data[ 's4_color_texto' ] ?>">
                        <?php 
                            echo $data[ 's4_texto' ];

                            if ( $data[ 's4_linea_bajo_texto' ] === 'si' ) :
                        ?>
                                <span class="text-line d-block" style="background-color: <?= $data[ 's4_color_linea_post_texto' ] ?>"></span>
                        <?php    
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

else:
    
?>

    <div class="section bg-color-img-text" style="background-color: <?= $data[ 's4_color_fondo' ] ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <img src="<?= $data[ 's4_imagen_izda' ] ?>" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-color-img-text" style="background-color: <?= $data[ 's4_color_fondo' ] ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="text-container text-center" style="color: <?= $data[ 's4_color_texto' ] ?>">
                        <?php 
                            echo $data[ 's4_texto' ];

                            if ( $data[ 's4_linea_bajo_texto' ] === 'si' ) :
                        ?>
                                <span class="text-line d-block" style="background-color: <?= $data[ 's4_color_linea_post_texto' ] ?>"></span>
                        <?php    
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

endif;