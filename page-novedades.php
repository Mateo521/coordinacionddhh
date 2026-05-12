<?php

get_header(); ?>

<section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[var(--color-primary)]/5 rounded-full translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/3 w-64 h-64 bg-[var(--color-primary)]/3 rounded-full translate-y-1/2 pointer-events-none"></div>

    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
        style="background-image: radial-gradient(var(--color-primary) 1px, transparent 1px); background-size: 28px 28px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
            <div>
                <div class="inline-flex items-center gap-2 mb-5">
                    <!--span class="w-8 h-px bg-[var(--color-primary)]"></span-->
                    <span class="text-[var(--color-primary)] text-sm font-600  uppercase">Comunicación Institucional</span>
                </div>
                <h1 class="text-4xl lg:text-5xl font-900 text-white leading-none mb-3">
                    Noticias, <span class="text-[var(--color-primary)] font-300">novedades y comunicados</span>
                </h1>
                <p class="text-white/60 font-300 text-base max-w-xl leading-relaxed mt-4">
                    Información actualizada sobre programas, convocatorias, reflexiones y acciones de la Coordinación General de Derechos Humanos.
                </p>
            </div>

            <div class="flex gap-4 mb-2">
                <div class="bg-white/5 border border-white/10 px-5 py-4 min-w-[120px]">
                    <div class="text-3xl font-800 text-[var(--color-primary)]">
                        <?php
                        $count_posts = wp_count_posts('post');
                        echo $count_posts->publish;
                        ?>
                    </div>
                    <div class="text-white/40 text-sm font-400 mt-0.5">Publicaciones</div>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-6 py-16 min-h-[50vh]">

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 9,
            'post_status'    => 'publish',
            'paged'          => $paged
        );

        $novedades = new WP_Query($args);

        if ($novedades->have_posts()) :
            while ($novedades->have_posts()) : $novedades->the_post(); ?>

                <article class="bg-white overflow-hidden border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group flex flex-col">

                    <div class="bg-[var(--color-base)] h-44 relative overflow-hidden flex-shrink-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', array('class' => 'absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-screen transition-transform duration-500 group-hover:scale-105')); ?>
                        <?php else : ?>
                            <div class="absolute inset-0 bg-gradient-to-br from-[#1a2f54] to-[#0a1628] flex items-center justify-center">
                                <span class="text-white/10 text-7xl font-800">DDHH</span>
                            </div>
                        <?php endif; ?>

                        <?php $categories = get_the_category();
                        if (! empty($categories)) { ?>
                            <div class="absolute top-4 left-4 bg-[var(--color-primary)] text-[var(--color-base)] text-sm font-700 px-3 py-1 rounded-full">
                                <?php echo esc_html($categories[0]->name); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="text-[#888] text-sm font-400 mb-2"><?php echo get_the_date(); ?></div>

                        <h4 class="text-base font-700 text-[var(--color-base)] mb-2 group-hover:text-[var(--color-primary)] transition-colors leading-snug">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                        <div class="text-sm text-[#555770] font-300 leading-relaxed mb-4 flex-grow">
                            <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="text-[var(--color-primary)] text-sm font-600 inline-flex items-center gap-1 hover:gap-2 transition-all mt-auto">
                            Leer más <span>→</span>
                        </a>
                    </div>
                </article>

            <?php endwhile; ?>
    </div>

    <div class="mt-16 pt-8 border-t border-stone-200 flex justify-center">
        <div class="flex flex-wrap items-center gap-2
                    [&>.page-numbers]:px-4 [&>.page-numbers]:py-2 [&>.page-numbers]:border [&>.page-numbers]:border-stone-200 [&>.page-numbers]:text-sm [&>.page-numbers]:font-500 [&>.page-numbers]:text-[#555770] hover:[&>a.page-numbers]:border-[var(--color-primary)] hover:[&>a.page-numbers]:text-[var(--color-primary)] [&>.page-numbers]:transition-colors
                    [&>.current]:bg-[var(--color-primary)] [&>.current]:border-[var(--color-primary)] [&>.current]:text-[var(--color-base)] [&>.current]:font-700">
            <?php

            echo paginate_links(array(
                'total'     => $novedades->max_num_pages,
                'current'   => $paged,
                'prev_text' => '← Anterior',
                'next_text' => 'Siguiente →',
                'end_size'  => 2,
                'mid_size'  => 2
            ));
            ?>
        </div>
    </div>

<?php
            wp_reset_postdata();
        else : ?>
    <div class="bg-[#FEF9EC] border border-[var(--color-primary)]/30 p-8 flex items-start gap-4 max-w-2xl mx-auto rounded-sm">
        <p class="text-base text-[#555770] font-300">Aún no se han publicado noticias o novedades institucionales.</p>
    </div>
<?php endif; ?>

</main>

<?php get_footer(); ?>