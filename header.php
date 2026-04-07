<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title('|', true, 'right');
            bloginfo('name'); ?></title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <style>
        :root {
            --color-primary: #00b1eb;
            --color-base: #232c77;
            --color-primary-dark: #B8923A;
            --color-bg: #F5F3EE;
            --color-text: #1A1C2E;
            --color-text-light: #00b1eb;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body style="font-family:'Outfit',sans-serif;" <?php body_class("bg-[#F5F3EE] text-[#1A1C2E] antialiased"); ?>>

    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="bg-[var(--color-base)]/95 backdrop-blur-md border-b border-white/10">
            <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

                <a href="#inicio" class="flex items-center gap-3 group">
                    <img class="h-11" src="<?php echo get_template_directory_uri(); ?>/images/logo-unsl.svg" alt="<?php bloginfo('name'); ?>">
                </a>
                <nav class="hidden lg:flex items-center gap-1">
                    <?php
                    $menu_items = array(
                        array('label' => 'Inicio', 'url' => home_url('#inicio')),
                        array('label' => 'Institucional', 'url' => home_url('#institucional')),
                        array('label' => 'Líneas de acción', 'url' => home_url('#lineas')),
                        array('label' => 'Integrantes', 'url' => home_url('#integrantes')),
                        array('label' => 'Novedades', 'url' => home_url('#novedades')),
                    );

                    foreach ($menu_items as $item) {
                        echo '<a href="' . esc_url($item['url']) . '" class="text-white/70 hover:text-[var(--color-primary)] px-3 py-2 text-sm font-400 transition-colors">' . esc_html($item['label']) . '</a>';
                    }
                    ?>
                    <a href="<?php echo esc_url(home_url('#contacto')); ?>" class="ml-2 bg-[var(--color-primary)] hover:bg-[#B8923A] text-[var(--color-base)] px-4 py-2 text-sm font-600 transition-colors">Contacto</a>
                </nav>

                <button id="menuBtn" class="lg:hidden text-white p-2  hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div id="mobileMenu" class="hidden lg:hidden border-t border-white/10 px-6 py-4 flex flex-col gap-1">
                <a href="<?php echo esc_url(home_url('#inicio')); ?>" class="text-white/80 py-2 text-sm font-400">Inicio</a>
                <a href="<?php echo esc_url(home_url('#institucional')); ?>" class="text-white/80 py-2 text-sm font-400">Institucional</a>
                <a href="<?php echo esc_url(home_url('#lineas')); ?>" class="text-white/80 py-2 text-sm font-400">Líneas de acción</a>
                <a href="<?php echo esc_url(home_url('#integrantes')); ?>" class="text-white/80 py-2 text-sm font-400">Integrantes</a>
                <a href="<?php echo esc_url(home_url('#novedades')); ?>" class="text-white/80 py-2 text-sm font-400">Novedades</a>
                <a href="<?php echo esc_url(home_url('#contacto')); ?>" class="text-[var(--color-primary)] py-2 text-sm font-600">Contacto</a>
            </div>
        </div>
    </header>