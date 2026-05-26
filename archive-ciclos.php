<?php
/* Template Name: Archivo General de Ciclos */
get_header(); ?>

<section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[var(--color-primary)]/5 rounded-full translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 mb-5">
            <span class="w-8 h-px bg-[var(--color-primary)]"></span>
            <span class="text-[var(--color-primary)] text-xs font-600 tracking-[0.25em] uppercase">Archivo</span>
        </div>
        <h1 class="text-4xl lg:text-5xl font-900 text-white leading-tight mb-4">
            Todos los Ciclos y entrevistas
        </h1>
        <p class="text-white/60 font-300 text-base max-w-2xl leading-relaxed">
            Ciclos, entrevistas y producciones multimedia de la coordinación.
        </p>
    </div>
</section>

<main class="bg-[#F5F3EE] py-16 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="bg-white overflow-hidden border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 group flex flex-col">
                    <div class="bg-stone-100 h-48 relative overflow-hidden flex-shrink-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105')); ?>
                        <?php else : ?>
                            <div class="absolute inset-0 bg-[var(--color-base)] flex items-center justify-center">
                                <svg class="w-12 h-12 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <?php 
                        $terms = get_the_terms(get_the_ID(), 'tipo_ciclo');
                        if ($terms && !is_wp_error($terms)) { ?>
                            <div class="text-[var(--color-primary)] text-xs font-600 tracking-widest uppercase mb-2">
                                <?php echo esc_html($terms[0]->name); ?>
                            </div>
                        <?php } ?>

                        <h3 class="text-lg font-700 text-[var(--color-base)] mb-3 group-hover:text-[var(--color-primary)] transition-colors leading-snug">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="text-sm text-[#555770] font-300 leading-relaxed mb-6 flex-grow">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-[var(--color-primary)] text-sm font-600 hover:gap-3 transition-all mt-auto border-t border-stone-100 pt-4">
                            Ver más <span>→</span>
                        </a>
                    </div>
                </article>

            <?php endwhile; else : ?>
                <div class="col-span-3 bg-white p-8 border border-stone-200 text-center">
                    <p class="text-[#555770] font-300">No se encontraron entrevistas o ciclos publicados actualmente.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>