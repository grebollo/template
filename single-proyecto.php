<?php

get_header();

?>

<div id="slides">

<?php

while ( have_posts() ) : the_post(); 
    $fields = get_field( 'secciones' );

    foreach ( $fields as $field ) :
        $type = $field[ 'tipo_seccion' ];

        switch ( $type ) :
            case 'gif-fondo-texto':
                include( dirname( __FILE__ ) . '/includes/layout/gif-fondo-texto.php' );
                break;
            case 'imagen-fondo':
                include( dirname( __FILE__ ) . '/includes/layout/imagen-fondo.php' );
                break;
            case 'color-fondo':
                include( dirname( __FILE__ ) . '/includes/layout/color-fondo.php' );
                break;     
            case 'color-fondo-texto':
                include( dirname( __FILE__ ) . '/includes/layout/color-fondo-texto.php' );
                break;
            case 'color-fondo-texto-interlineado':
                include( dirname( __FILE__ ) . '/includes/layout/color-fondo-texto-interlineado.php' );
                break;
            case 'color-fondo-img-izda-texto-drcha':
                include( dirname( __FILE__ ) . '/includes/layout/color-fondo-img-izda-texto-drcha.php' );
                break;
            case 'color-fondo-img-drcha-texto-izda':
                include( dirname( __FILE__ ) . '/includes/layout/color-fondo-img-drcha-texto-izda.php' );
                break;
            case 'video-fondo':
                include( dirname( __FILE__ ) . '/includes/layout/video-fondo.php' );
                break;
            case 'color-fondo-dos-imagenes':
                include( dirname( __FILE__ ) . '/includes/layout/color-fondo-dos-imagenes.php' );
                break;
            default:
                break;
        endswitch;
    endforeach; 
endwhile; 

?>

</div><!-- SLIDES -->

<?php

get_footer();