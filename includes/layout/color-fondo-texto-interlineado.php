<?php

$data = $field[ 's8_color_fondo_texto_interlineado' ];

?>

<div class="section bg-color-text-dotted" style="background-color: <?= $data[ 's8_color_fondo' ] ?>">
    <div class="container" style="border-bottom: 5px dotted <?= $data[ 's8_color_interlineado' ] ?>">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="text-container text-center" style="color: <?= $data[ 's8_color_texto' ] ?>">
                    <?= $data[ 's8_texto' ]; ?>
                </div>
            </div>
        </div>
    </div>
</div>