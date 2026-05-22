<?php 
// Archivo: taxonomy-tipo_ciclo.php
get_header(); 

$term = get_queried_object();
?>

<section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 mb-5">
            <span class="w-8 h-px bg-[var(--color-primary)]"></span>
            <span class="text-[var(--color-primary)] text-xs font-600 tracking-[0.25em] uppercase">Ciclos Audiovisuales</span>
        </div>
        <h1 class="text-4xl lg:text-5xl font-900 text-white leading-tight mb-4">
            <?php echo esc_html($term->name); ?>
        </h1>
        <?php if (!empty($term->description)) : ?>
            <p class="text-white/60 font-300 text-base max-w-2xl leading-relaxed">
                <?php echo esc_html($term->description); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<main class="bg-[#F5F3EE] py-16 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="bg-white overflow-hidden border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 group flex flex-col">
                    
                    <div class="bg-stone-100 h-56 relative overflow-hidden flex-shrink-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105')); ?>
                            
                            <div class="absolute inset-0 bg-[var(--color-base)]/20 group-hover:bg-transparent transition-colors flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[var(--color-primary)] flex items-center justify-center text-[var(--color-base)] shadow-lg transform group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="absolute inset-0 bg-[var(--color-base)] flex items-center justify-center">
                                <span class="text-white/10 text-5xl font-800">CICLO</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-700 text-[var(--color-base)] mb-3 group-hover:text-[var(--color-primary)] transition-colors leading-snug">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="text-sm text-[#555770] font-300 leading-relaxed mb-6 flex-grow">
                            <?php echo wp_trim_words(get_the_excerpt(), 22, '...'); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-[var(--color-primary)] text-sm font-600 hover:gap-3 transition-all mt-auto border-t border-stone-100 pt-4">
                            Ver entrevista <span>→</span>
                        </a>
                    </div>
                </article>

            <?php endwhile; else : ?>
                <div class="col-span-3 bg-white p-8 border border-stone-200 text-center">
                    <p class="text-[#555770] font-300">Aún no hay contenido publicado en este ciclo.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>