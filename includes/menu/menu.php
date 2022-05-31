<?php

$siteTitle = get_bloginfo( 'name' );
$isMobile = wp_is_mobile();

if ( !$isMobile ) :
    $lgMenuItems = altm_get_menu_items_by_registered_slug( 'main' );
else :
    $smMenuItems = altm_get_menu_items_by_registered_slug( 'mobile' );
endif;

$query = new WP_Query( array( 'post_type' => 'proyecto', 'post_status' => 'publish', 'order' => 'DESC' ) );
$total = $query->found_posts;
$projects = array();

$contact = get_field( 'nuevos_proyectos', 'option' );
$team = get_field( 'sobre_el_equipo', 'option' );
$caps = get_field( 'lo_que_hacemos', 'option' );
$capsContents = $caps[ 'capacidades' ];
$clients = get_field( 'con_quien_trabajamos', 'option' );
$clientsContents = $clients[ 'clientes' ];

while ( $query->have_posts() ) :
    $query->the_post();
    
    array_push( $projects, array( 
                                'title' => get_the_title(), 
                                'image' => get_the_post_thumbnail_url(),
                                'link'  => get_the_permalink(),
                                'slug'  => get_post_field( 'post_name' ),
                                'color' => get_field( 'color_destacado' )
                            ) 
    );
endwhile;

wp_reset_postdata();

if ( !$isMobile ) :
    include( dirname( __FILE__ ) . '/lg/menu-lg.php' );
else :
    include( dirname( __FILE__ ) . '/sm/menu-sm.php' );
endif;

?>
