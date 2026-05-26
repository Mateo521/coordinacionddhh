<?php

function registrar_menus_tema()
{
    register_nav_menus(array(
        'menu-principal' => 'Menú Principal (Escritorio)',
        'menu-movil'     => 'Menú Móvil'
    ));
}
add_action('after_setup_theme', 'registrar_menus_tema');


function clases_enlaces_menu($atts, $item, $args)
{

    if ($args->theme_location == 'menu-principal') {
        $atts['class'] = 'text-white/70 hover:text-[var(--color-primary)] px-3 py-2 text-sm font-400 transition-colors block';
    } elseif ($args->theme_location == 'menu-movil') {
        $atts['class'] = 'text-white/80 py-2 text-sm font-400 block w-full';
    }


    if (in_array('btn-contacto', $item->classes)) {
        if ($args->theme_location == 'menu-principal') {
            $atts['class'] = 'ml-2 bg-[var(--color-primary)] hover:bg-[#B8923A] text-[var(--color-base)] px-4 py-2 text-sm font-600 transition-colors inline-block';
        } else {
            $atts['class'] = 'text-[var(--color-primary)] py-2 text-sm font-600 block w-full';
        }
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'clases_enlaces_menu', 10, 3);


function clases_li_menu($classes, $item, $args)
{
    $classes[] = 'list-none';
    return $classes;
}
add_filter('nav_menu_css_class', 'clases_li_menu', 10, 3);




function ddhh_unsl_configuracion_tema()
{

    add_theme_support('post-thumbnails');


    add_theme_support('title-tag');


    register_nav_menus(array(
        'menu_principal' => 'Menú principal navegación'
    ));
}

add_action('after_setup_theme', 'ddhh_unsl_configuracion_tema');






function registrar_cpt_materiales()
{

    $labels = array(
        'name'               => 'Materiales pedagógicos',
        'singular_name'      => 'Material pedagógico',
        'menu_name'          => 'Materiales',
        'add_new'            => 'Añadir nuevo',
        'add_new_item'       => 'Añadir nuevo material',
        'edit_item'          => 'Editar material',
        'new_item'           => 'Nuevo material',
        'view_item'          => 'Ver material',
        'search_items'       => 'Buscar materiales',
        'not_found'          => 'No se encontraron materiales',
        'not_found_in_trash' => 'No hay materiales en la papelera',
    );


    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'materiales-pedagogicos'),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-book-alt',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true,
    );

    register_post_type('materiales', $args);


    $tax_labels = array(
        'name'              => 'Categorías de material',
        'singular_name'     => 'Categoría de material',
        'search_items'      => 'Buscar categorías',
        'all_items'         => 'Todas las categorías',
        'edit_item'         => 'Editar categoría',
        'update_item'       => 'Actualizar categoría',
        'add_new_item'      => 'Añadir Nueva categoría',
        'new_item_name'     => 'Nuevo Nombre de categoría',
        'menu_name'         => 'Categorías',
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-material'),
        'show_in_rest'      => true,
    );

    register_taxonomy('categoria_material', array('materiales'), $tax_args);
}
add_action('init', 'registrar_cpt_materiales');



function registrar_cpt_ciclos() {
    $labels = array(
        'name'               => 'Ciclos y entrevistas',
        'singular_name'      => 'Entrevista / Contenido',
        'menu_name'          => 'Ciclos',
        'add_new'            => 'Añadir nueva',
        'add_new_item'       => 'Añadir nueva entrevista',
        'edit_item'          => 'Editar entrevista',
        'new_item'           => 'Nueva entrevista',
        'view_item'          => 'Ver entrevista',
        'search_items'       => 'Buscar en ciclos',
        'not_found'          => 'No se encontraron entrevistas',
        'not_found_in_trash' => 'No hay entrevistas en la papelera',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'ciclos'),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-video-alt3', 
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true, 
    );

    register_post_type('ciclos', $args);


    $tax_labels = array(
        'name'              => 'Tipos de ciclo',
        'singular_name'     => 'Tipo de ciclo',
        'search_items'      => 'Buscar ciclos',
        'all_items'         => 'Todos los ciclos',
        'edit_item'         => 'Editar ciclo',
        'update_item'       => 'Actualizar ciclo',
        'add_new_item'      => 'Añadir nuevo ciclo',
        'new_item_name'     => 'Nombre del nuevo ciclo',
        'menu_name'         => 'Tipos de ciclo',
    );

    $tax_args = array(
        'hierarchical'      => true, 
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'ciclo'),
        'show_in_rest'      => true,
    );

    register_taxonomy('tipo_ciclo', array('ciclos'), $tax_args);
}
add_action('init', 'registrar_cpt_ciclos');



function registrar_cpt_documentos() {
    $labels = array(
        'name'               => 'Documentos normativos',
        'singular_name'      => 'Documento',
        'menu_name'          => 'Documentos',
        'add_new'            => 'Añadir nuevo',
        'add_new_item'       => 'Añadir nuevo documento',
        'edit_item'          => 'Editar documento',
        'search_items'       => 'Buscar documentos',
        'not_found'          => 'No se encontraron documentos',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'documentos-normativos'),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-media-document',
        'supports'            => array('title', 'editor', 'excerpt'),
        'show_in_rest'        => true,
    );

    register_post_type('documentos', $args);

    $tax_labels = array(
        'name'              => 'Tipos de documento',
        'singular_name'     => 'Tipo de documento',
        'all_items'         => 'Todos los tipos',
        'add_new_item'      => 'Añadir nuevo tipo',
        'menu_name'         => 'Tipos de doc.',
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'tipo-documento'),
        'show_in_rest'      => true,
    );

    register_taxonomy('tipo_documento', array('documentos'), $tax_args);
}
add_action('init', 'registrar_cpt_documentos');




function limitar_busqueda_post_types($query) {

    if ($query->is_search && !is_admin() && $query->is_main_query()) {

        $query->set('post_type', array('post', 'materiales', 'ciclos', 'documentos'));
    }
    return $query;
}
add_action('pre_get_posts', 'limitar_busqueda_post_types');