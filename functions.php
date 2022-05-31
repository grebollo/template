<?php
/**
 * ALTM Theme functions and definitions
 *
 * @author Guiomar Rebollo Allende
 * @link https://guiomarebollo.es/
 */



/**********************************************
 *         DEFINICIÓN DE CONSTANTES
 **********************************************/


define('ALTM_MAX_PROJECTS', 2);


/**********************************************
 *      CONFIGURACIÓN GENERAL DEL TEMA
 **********************************************/



// Encolado CSS / JS
function altm_enqueue() {
	wp_enqueue_style( 'fp_css', get_stylesheet_directory_uri() . '/css/fullpage.min.css' );
	wp_enqueue_style( 'main_css', get_stylesheet_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'fp_js', get_stylesheet_directory_uri() . '/js/fullpage.min.js');
	wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/js/main.js', array('fp_js'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'altm_enqueue', 15 );



// Registro del menú dispositivos grandes
register_nav_menus(
    array( 'main' => 'Menú dispositivos grandes', 'mobile' => 'Menú dispositivos móviles' )
);


// Soporte para thumbnails
add_theme_support( 'post-thumbnails' );


// Permitir archivos SVG 
function altm_mime_types($mimes) {
	$mimes[ 'svg' ] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'altm_mime_types' );


// Página de opciones para el tab "Info" del menú
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Pestaña info. menú',
		'menu_title'	=> 'Pestaña info. menú',
		'menu_slug' 	=> 'tab-info-menu',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'      => 'dashicons-edit',
		'position'      => '6'
	));
}


/**********************************************
 *        PANEL DE ADMINISTRACIÓN WP
 **********************************************/



// Se añade widget bienvenida al área de administración de WordPress
function altm_admin_extra_dashboard_widget() {
	wp_add_dashboard_widget( 'altm_dashboard_bienvenida', 'Bienvenido al panel de control', 'altm_admin_tectum_bienvenida_widget' );
}	


// Contenido widget bienvenida
function altm_admin_tectum_bienvenida_widget() {
?>	
	<p style="text-align:center;padding-top:1rem;">
		<a target="_blank" href="https://alittletoomuch.es/"> 
			<img style="margin:0 auto;max-width:100%;height:auto"src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" />
		</a>
	</p>   
	<h3 style="text-align:center;">Área de administración de ALTM</h3>
<?php 
}
add_action( 'wp_dashboard_setup', 'altm_admin_extra_dashboard_widget' );



// Cambio pié de página y automatizado de año
function altm_footer_admin() {
	date_default_timezone_set( 'Europe/Madrid' );
	setlocale( LC_TIME, 'spanish', 'es_ES@euro', 'es_ES', 'es' );

	$inicio=2021;
	$actual=date( 'Y' );

	if ( $inicio === $actual ) :
		echo '<p>' . $inicio;
	else :
		echo "<p>{$inicio}-{$actual}";
	endif;
	  
	echo '<span>&copy; ALTM | A little too much </span>';  
}  
add_filter('admin_footer_text', 'altm_footer_admin');


/**********************************************
 *          PERSONALIZACIÓN LOGIN
 **********************************************/



// Personalizar url logo acceso
function altm_admin_logo_url() {
    return home_url();//Devuelve la URL del home
}
add_action( 'login_headerurl', 'altm_admin_logo_url' );



// Cambiar texto title del logo de login
function altm_admin_logo_title() {
	return get_bloginfo( 'name' ) ;
}	
add_action( 'login_headertitle', 'altm_admin_logo_title' );



// Encolado CSS / JS login
function altm_login_enqueue(){
	wp_enqueue_style( 'vegascss', get_stylesheet_directory_uri() . '/css/vegas.min.css' );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/login.css' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'vegasjs', get_stylesheet_directory_uri() . '/js/vegas.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'login', get_stylesheet_directory_uri() . '/js/login.js', array('jquery'), '1.0.0', true );
	wp_localize_script('login', 'login_imagenes', array("ruta_plantilla" => get_stylesheet_directory_uri() ));
}
add_action('login_enqueue_scripts', 'altm_login_enqueue', 10);



/**********************************************
 *          CPT Y TAXONOMÍAS DE WP
 **********************************************/


 
// CPT proyecto
function altm_project_cpt() {

	$labels = array(
		'name'                  => _x( 'Proyectos', 'Post Type General Name', 'altm' ),
		'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'altm' ),
		'menu_name'             => __( 'Proyectos', 'altm' ),
		'name_admin_bar'        => __( 'Proyectos', 'altm' ),
		'archives'              => __( 'Archivos del proyecto', 'altm' ),
		'attributes'            => __( 'Atributos del proyecto', 'altm' ),
		'parent_item_colon'     => __( 'Proyecto padre', 'altm' ),
		'all_items'             => __( 'Todos los proyectos', 'altm' ),
		'add_new_item'          => __( 'Añadir nuevo proyecto', 'altm' ),
		'add_new'               => __( 'Añadir nuevo', 'altm' ),
		'new_item'              => __( 'Nuevo proyecto', 'altm' ),
		'edit_item'             => __( 'Editar proyecto', 'altm' ),
		'update_item'           => __( 'Actualizar proyecto', 'altm' ),
		'view_item'             => __( 'Ver proyecto', 'altm' ),
		'view_items'            => __( 'Ver proyectos', 'altm' ),
		'search_items'          => __( 'Buscar proyecto', 'altm' ),
		'not_found'             => __( 'No encontrado', 'altm' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'altm' ),
		'featured_image'        => __( 'Imagen destacada', 'altm' ),
		'set_featured_image'    => __( 'Establecer como imagen destacada', 'altm' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'altm' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'altm' ),
		'insert_into_item'      => __( 'Insertar en el proyecto', 'altm' ),
		'uploaded_to_this_item' => __( 'Subir a este proyecto', 'altm' ),
		'items_list'            => __( 'Listado de proyectos', 'altm' ),
		'items_list_navigation' => __( 'Navegación entre proyectos', 'altm' ),
		'filter_items_list'     => __( 'Filtrar proyectos', 'altm' ),
	);
	$args = array(
		'label'                 => __( 'Proyecto', 'altm' ),
		'description'           => __( 'Custom post type de Proyectos', 'altm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-write-blog',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'proyecto', $args );

}
add_action( 'init', 'altm_project_cpt', 0 );


// Taxonomía categoría proyecto
function altm_project_category() {

	$labels = array(
		'name'                       => _x( 'Categorías de proyecto', 'Taxonomy General Name', 'altm' ),
		'singular_name'              => _x( 'Categoría de proyecto', 'Taxonomy Singular Name', 'altm' ),
		'menu_name'                  => __( 'Categorías de proyecto', 'altm' ),
		'all_items'                  => __( 'Todas las categorías', 'altm' ),
		'parent_item'                => __( 'Categoría padre', 'altm' ),
		'parent_item_colon'          => __( 'Categoría padre:', 'altm' ),
		'new_item_name'              => __( 'Nombre de la nueva categoría', 'altm' ),
		'add_new_item'               => __( 'Añadir nueva categoría', 'altm' ),
		'edit_item'                  => __( 'Editar categoría', 'altm' ),
		'update_item'                => __( 'Actualizar categoría', 'altm' ),
		'view_item'                  => __( 'Ver categoría', 'altm' ),
		'separate_items_with_commas' => __( 'Separadas por comas', 'altm' ),
		'add_or_remove_items'        => __( 'Añadir o quitar categorías', 'altm' ),
		'choose_from_most_used'      => __( 'Elegir entre las más usadas', 'altm' ),
		'popular_items'              => __( 'Categorías populares', 'altm' ),
		'search_items'               => __( 'Buscar categorías', 'altm' ),
		'not_found'                  => __( 'No encontrada', 'altm' ),
		'no_terms'                   => __( 'No existen categorías', 'altm' ),
		'items_list'                 => __( 'Listado de categorías', 'altm' ),
		'items_list_navigation'      => __( 'NAvegación entre categorías', 'altm' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => false,
	);
	register_taxonomy( 'categoria_proyecto', array( 'proyecto' ), $args );

}
add_action( 'init', 'altm_project_category', 0 );



/**********************************************
 *            POSTS POR DEFECTO
 **********************************************/



//Sobreescribe el slug de los posts por defecto de Wordpress
function altm_override_default_posts_url( $args, $post_type ) {
    if ( $post_type === 'post' ) :
        $args[ 'rewrite' ] = array(
          'slug' => '/blog/%category%/'
        );
    endif;
    
	return $args;
}
add_filter( 'register_post_type_args', 'altm_override_default_posts_url', 20, 2 );


//Añade blog delante al blog individual, si el tipo de post es el post pot defecto de WordPress
function altm_override_default_single_posts_url($permalink, $post, $leavename) {   
    if ( get_post_type( $post ) === 'post' ) :     
        return "/blog/%category%/" . $permalink;   
	endif;

    return $permalink; 
}
add_filter( 'pre_post_link', 'altm_override_default_single_posts_url', 10, 3 ); 



// Obtiene los elementos del menu (slug) indicado
function altm_get_menu_items_by_registered_slug( $slug ) {
    $items = $menuItems = array();

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $slug ] ) ) :
        $menu = get_term( $locations[ $slug ] );
        $items = wp_get_nav_menu_items( $menu->term_id );

		if ( $items ) :
			foreach ( $items as $item ) :
				array_push( $menuItems, array( 
												'title'   => $item->title,
												'url'     => $item->url,
												'classes' => implode( ' ', $item->classes )
											 ) 
				);
			endforeach;
		endif;
	endif;

    return $menuItems;
}