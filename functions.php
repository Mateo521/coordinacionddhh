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
        'name'               => 'Materiales Pedagógicos',
        'singular_name'      => 'Material Pedagógico',
        'menu_name'          => 'Materiales',
        'add_new'            => 'Añadir Nuevo',
        'add_new_item'       => 'Añadir Nuevo Material',
        'edit_item'          => 'Editar Material',
        'new_item'           => 'Nuevo Material',
        'view_item'          => 'Ver Material',
        'search_items'       => 'Buscar Materiales',
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
        'name'              => 'Categorías de Material',
        'singular_name'     => 'Categoría de Material',
        'search_items'      => 'Buscar Categorías',
        'all_items'         => 'Todas las Categorías',
        'edit_item'         => 'Editar Categoría',
        'update_item'       => 'Actualizar Categoría',
        'add_new_item'      => 'Añadir Nueva Categoría',
        'new_item_name'     => 'Nuevo Nombre de Categoría',
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
        'name'               => 'Ciclos y Entrevistas',
        'singular_name'      => 'Entrevista / Contenido',
        'menu_name'          => 'Ciclos',
        'add_new'            => 'Añadir Nueva',
        'add_new_item'       => 'Añadir Nueva Entrevista',
        'edit_item'          => 'Editar Entrevista',
        'new_item'           => 'Nueva Entrevista',
        'view_item'          => 'Ver Entrevista',
        'search_items'       => 'Buscar en Ciclos',
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
        'name'              => 'Tipos de Ciclo',
        'singular_name'     => 'Tipo de Ciclo',
        'search_items'      => 'Buscar Ciclos',
        'all_items'         => 'Todos los Ciclos',
        'edit_item'         => 'Editar Ciclo',
        'update_item'       => 'Actualizar Ciclo',
        'add_new_item'      => 'Añadir Nuevo Ciclo',
        'new_item_name'     => 'Nombre del Nuevo Ciclo',
        'menu_name'         => 'Tipos de Ciclo',
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