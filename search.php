<?php
/* Plantilla de Resultados de Búsqueda */
get_header(); ?>

<section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 mb-5">
            <span class="w-8 h-px bg-[var(--color-primary)]"></span>
            <span class="text-[var(--color-primary)] text-xs font-600 tracking-[0.25em] uppercase">Resultados</span>
        </div>
        <h1 class="text-3xl lg:text-5xl font-900 text-white leading-tight mb-4">
            Búsqueda: "<?php echo get_search_query(); ?>"
        </h1>
        <p class="text-white/60 font-300 text-base max-w-2xl leading-relaxed">
            <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
            echo 'Se encontraron ' . $total_results . ' resultados en las distintas secciones del sitio.';
            ?>
        </p>
    </div>
</section>

<main class="bg-[#F5F3EE] py-16 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-6">

        <?php if (have_posts()) : ?>
            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden">
                <div class="divide-y divide-stone-200">

                    <?php while (have_posts()) : the_post();


                        $post_type = get_post_type();
                        $etiqueta = 'Novedad';
                        $color_bg = 'bg-[#1a2f54]';

                        if ($post_type === 'materiales') {
                            $etiqueta = 'Material Pedagógico';
                            $color_bg = 'bg-[#1A5C3A]';
                        } elseif ($post_type === 'ciclos') {
                            $etiqueta = 'Ciclo / Entrevista';
                            $color_bg = 'bg-[#831843]';
                        } elseif ($post_type === 'documentos') {
                            $etiqueta = 'Documento Normativo';
                            $color_bg = 'bg-[var(--color-primary)]';
                        }
                    ?>

                        <article class="p-6 md:p-8 flex flex-col sm:flex-row sm:items-start justify-between gap-6 hover:bg-stone-50 transition-colors">
                            <div class="flex-1">
                                <span class="inline-block text-white text-xs font-600 uppercase tracking-widest px-3 py-1 mb-3 <?php echo $color_bg; ?>">
                                    <?php echo esc_html($etiqueta); ?>
                                </span>

                                <h3 class="text-xl font-700 text-[var(--color-base)] leading-snug mb-2 hover:text-[var(--color-primary)] transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <div class="text-sm text-[#555770] font-300 leading-relaxed">
                                    <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
                                </div>
                            </div>

                            <div class="shrink-0 pt-2">
                                <a href="<?php the_permalink(); ?>" class="border border-stone-300 hover:border-[var(--color-primary)] bg-white hover:bg-[#FBF8F1] text-[var(--color-base)] px-5 py-2.5 text-xs font-600 transition-all inline-flex items-center gap-2">
                                    Ver más <span>→</span>
                                </a>
                            </div>
                        </article>

                    <?php endwhile; ?>
                </div>
            </div>

            <div class="mt-10 flex justify-center">
                <?php
                echo paginate_links(array(
                    'prev_text' => '← Anterior',
                    'next_text' => 'Siguiente →',
                ));
                ?>
            </div>

        <?php else : ?>

            <div class="bg-white border border-stone-200 p-12 text-center">
                <div class="w-16 h-16 bg-stone-100 flex items-center justify-center rounded-full mx-auto mb-4">
                    <svg class="w-8 h-8 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-700 text-[var(--color-base)] mb-2">No se encontraron resultados</h3>
                <p class="text-[#555770] font-300 max-w-md mx-auto">
                    La búsqueda de "<strong><?php echo get_search_query(); ?></strong>" no devolvió ninguna entrada, documento o material pedagógico. Por favor, intente con términos más generales.
                </p>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>