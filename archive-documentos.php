<?php
/* Template Name: Archivo de Documentos */
get_header(); ?>

<section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[var(--color-primary)]/5 rounded-full translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 mb-5">
            <span class="w-8 h-px bg-[var(--color-primary)]"></span>
            
        </div>
        <h1 class="text-4xl lg:text-5xl font-900 text-white leading-tight mb-4">
            Documentos
        </h1>
        <p class="text-white/60 font-300 text-base max-w-2xl leading-relaxed">
            Ordenanzas, resoluciones y declaraciones institucionales de la Coordinación General de Derechos Humanos.
        </p>
    </div>
</section>

<main class="bg-[#F5F3EE] py-16 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="bg-white border border-stone-200 shadow-sm overflow-hidden">
            <div class="divide-y divide-stone-200">
                
                <?php if (have_posts()) : $count = 0; while (have_posts()) : the_post(); $count++; ?>
                    <?php 
                    
                    $archivo_url = get_field('archivo_adjunto'); 
                    
                    $terminos = get_the_terms(get_the_ID(), 'tipo_documento');
                    $tipo_doc = ($terminos && !is_wp_error($terminos)) ? $terminos[0]->name : 'Documento';
                    ?>

                    <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-stone-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-[var(--color-base)]/5 flex items-center justify-center shrink-0 border border-stone-200">
                                <svg class="w-5 h-5 text-[var(--color-base)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block text-[var(--color-primary)] text-xs font-600 uppercase tracking-wider mb-1">
                                    <?php echo esc_html($tipo_doc); ?>
                                </span>
                                <h3 class="text-base font-700 text-[var(--color-base)] leading-snug">
                                    <?php the_title(); ?>
                                </h3>
                                <?php if (has_excerpt()) : ?>
                                    <p class="text-xs text-[#555770] font-300 mt-1"><?php echo get_the_excerpt(); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="shrink-0 flex items-center gap-2">
                            <?php if ($archivo_url) : ?>
                                <a href="<?php echo esc_url($archivo_url); ?>" target="_blank" rel="noopener noreferrer" class="border border-stone-300 hover:border-[var(--color-primary)] bg-white hover:bg-[#FBF8F1] text-[var(--color-base)] px-4 py-2 text-xs font-600 transition-all inline-flex items-center gap-1.5">
                                    Ver PDF
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="border border-stone-300 hover:border-[var(--color-primary)] bg-white text-[var(--color-base)] px-4 py-2 text-xs font-600 transition-all inline-flex items-center gap-1.5">
                                    Ver Detalles
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; else : ?>
                    <div class="p-12 text-center text-[#555770] font-300">
                        No se han encontrado documentos normativos cargados en el sistema.
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <?php echo paginate_links(); ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>