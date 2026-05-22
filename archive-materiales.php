<?php
/* Template Name: Archivo Materiales Pedagógicos */
get_header(); ?>

<section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 mb-5">
            <span class="w-8 h-px bg-[var(--color-primary)]"></span>
            <!--span class="text-[var(--color-primary)] text-xs font-600 tracking-[0.25em] uppercase">Recursos</span-->
        </div>
        <h1 class="text-4xl lg:text-5xl font-900 text-white leading-tight mb-4">
            Materiales pedagógicos
        </h1>
        <p class="text-white/60 font-300 text-base max-w-2xl leading-relaxed">
            Documentos, guías...
        </p>
    </div>
</section>

<main class="bg-[#F5F3EE] py-16 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article class="bg-white overflow-hidden border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 group flex flex-col">

                        <div class="bg-stone-100 h-48 relative overflow-hidden flex-shrink-0">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105')); ?>
                            <?php else : ?>
                                <div class="absolute inset-0 bg-[var(--color-base)] flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            <?php endif; ?>

                            <?php
                            $terms = get_the_terms(get_the_ID(), 'categoria_material');
                            if ($terms && !is_wp_error($terms)) { ?>
                                <div class="absolute top-4 left-4 bg-[var(--color-primary)] text-[var(--color-base)] text-xs font-700 px-3 py-1 rounded-sm">
                                    <?php echo esc_html($terms[0]->name); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-700 text-[var(--color-base)] mb-3 group-hover:text-[var(--color-primary)] transition-colors leading-snug">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-sm text-[#555770] font-300 leading-relaxed mb-6 flex-grow">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-[var(--color-primary)] text-sm font-600 hover:gap-3 transition-all mt-auto border-t border-stone-100 pt-4">
                                Ver material <span>→</span>
                            </a>
                        </div>
                    </article>

                <?php endwhile;
            else : ?>
                <div class="col-span-3 bg-white p-8 border border-stone-200 text-center">
                    <p class="text-[#555770] font-300">Actualmente no hay materiales pedagógicos disponibles.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php
            echo paginate_links(array(
                'prev_text' => '← Anterior',
                'next_text' => 'Siguiente →',
                'class'     => 'flex gap-2'
            ));
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>