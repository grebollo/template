<?php

$src = substr( $field[ 's7_video_fondo' ], 0, 1 ) === '/' ? ( site_url() . $field[ 's7_video_fondo' ] )
                                                          : ( site_url() . '/' . $field[ 's7_video_fondo' ] );
$ext = substr( $field[ 's7_video_fondo' ], ( strpos( $field[ 's7_video_fondo' ], '.' ) + 1 ), strlen( $field[ 's7_video_fondo' ] ) );
?>

<div class="section bg-vid-ct">
    <video class="bg-vid" loop muted data-autoplay>
		<source src="<?= $src ?>" type="video/<?= $ext ?>">
	</video>
</div>