<?php

$data = $field[ 's6_color_fondo_dos_imagenes' ];

if ( !wp_is_mobile() ) :
?>
    <div class="section two-images" style="background-color: <?= $data[ 's6_color_fondo' ] ?>">
        <div class="table">
            <div class="table-row">
                <div class="table-cell">
                    <img src="<?= $data[ 's6_imagen_izda' ] ?>" class="img-fluid two-images-img" />
                </div>
                <div class="table-cell">
                    <img src="<?= $data[ 's6_imagen_drcha' ] ?>" class="img-fluid two-images-img" />
                </div>
            </div>
        </div>
    </div>
<?php

else:

?>
    <div class="section two-images" style="background-color: <?= $data[ 's6_color_fondo' ] ?>">
        <img src="<?= $data[ 's6_imagen_izda' ] ?>" class="img-fluid two-images-img" />
    </div>
    <div class="section two-images d-lg-none" style="background-color: <?= $data[ 's6_color_fondo' ] ?>">
        <img src="<?= $data[ 's6_imagen_drcha' ] ?>" class="img-fluid two-images-img" />
    </div>

<?php

endif;