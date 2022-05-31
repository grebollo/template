<?php

$data = $field[ 's3_color_fondo_texto' ];

?>

<div class="section bg-color-text" style="background-color: <?= $data[ 's3_color_fondo' ] ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="text-container text-center" style="color: <?= $data[ 's3_color_texto' ] ?>">
                    <?php 
                        echo $data[ 's3_texto' ];

                        if ( $data[ 's3_linea_bajo_texto' ] === 'si' ) :
                    ?>
                            <span class="text-line d-block" style="background-color: <?= $data[ 's3_color_linea_post_texto' ] ?>"></span>
                    <?php    
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>