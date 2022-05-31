<?php

$data = $field[ 's9_gif_fondo_texto' ];

if ( !wp_is_mobile() ) :
?>
    <div class="section gifs-text" style="background-image: url('<?= $data[ 's9_gif_dispositivos_grandes' ] ?>')">
<?php
        if ( $data[ 's9_incluir_texto' ] === 'si' ) :
?>
            <div class="gif-text text-center" style="color: <?= $data[ 's9_color_texto' ] ?>">
                <?= $data[ 's9_texto' ] ?>
            </div>
<?php
        endif;
?>
    </div>
<?php

else:

?>
    <div class="section gifs-text" style="background-image: url('<?= $data[ 's9_gif_dispositivos_moviles' ] ?>')">
<?php
        if ( $data[ 's9_incluir_texto' ] === 'si' ) :
?>
            <div class="gif-text text-center" style="color: <?= $data[ 's9_color_texto' ] ?>">
                <?= $data[ 's9_texto' ] ?>
            </div>
<?php
        endif;
?>
    </div>

<?php

endif;