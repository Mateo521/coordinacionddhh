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




function ddhh_unsl_configuracion_tema() {
    
    add_theme_support( 'post-thumbnails' );
    

    add_theme_support( 'title-tag' );
    

    register_nav_menus( array(
        'menu_principal' => 'Menú principal navegación'
    ) );
    
}

add_action( 'after_setup_theme', 'ddhh_unsl_configuracion_tema' );