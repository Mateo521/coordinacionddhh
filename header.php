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
                <img class="h-18 py-2" src="<?php echo get_template_directory_uri(); ?>/images/logo-unsl.svg" alt="<?php bloginfo('name'); ?>">
            </a>
            
            <div class="hidden lg:flex items-center">
                <nav class="flex items-center gap-1">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-principal',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-1 m-0 p-0',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>

                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="ml-6 relative flex items-center">
                    <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Buscar..." 
                        class="bg-white/5 border border-white/20 text-white placeholder-white/40 px-4 py-2 text-sm focus:outline-none focus:border-[var(--color-primary)] focus:bg-white/10 transition-all w-48" required />
                    <button type="submit" class="absolute right-3 text-white/50 hover:text-[var(--color-primary)] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <button id="menuBtn" class="lg:hidden text-white p-2 hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div id="mobileMenu" class="hidden lg:hidden border-t border-white/10 px-6 py-4 flex flex-col gap-1">
            
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-4 relative">
                <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Buscar en el sitio..." 
                    class="w-full bg-white/5 border border-white/20 text-white placeholder-white/40 px-4 py-3 text-sm focus:outline-none focus:border-[var(--color-primary)] transition-colors" required />
                <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-white/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>

            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-movil',
                    'container'      => false,
                    'menu_class'     => 'flex flex-col gap-1 m-0 p-0',
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>
        </div>
    </div>
</header>