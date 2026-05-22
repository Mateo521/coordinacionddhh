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
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

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

<body style="font-family:'PT Sans',sans-serif;" <?php body_class("bg-[#F5F3EE] text-[#1A1C2E] antialiased"); ?>>

    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="bg-[var(--color-base)]/95 backdrop-blur-md border-b border-white/10">
            <div class="max-w-7xl mx-auto px-6 h-full flex items-center justify-between">


                <a href="<?php echo home_url('#inicio'); ?>" class="flex items-center gap-3 group">
                    <img class="h-20 py-3" src="<?php echo get_template_directory_uri(); ?>/images/logo-unsl.svg" alt="<?php bloginfo('name'); ?>">
                </a>


                <nav class="hidden lg:flex items-center gap-1">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-principal',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-1 m-0 p-0',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>


                <button id="menuBtn" class="lg:hidden text-white p-2 hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>


            <div id="mobileMenu" class="hidden lg:hidden border-t border-white/10 px-6 py-4 flex flex-col gap-1">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-movil',
                    'container'      => false,
                    'menu_class'     => 'flex flex-col gap-1 m-0 p-0',
                    'fallback_cb'    => false,
                ));
                ?>
            </div>
        </div>
    </header>