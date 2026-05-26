<?php
/* Plantilla para la vista individual de un Documento */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php 
    $archivo_url = get_field('archivo_adjunto'); 
    $terminos = get_the_terms(get_the_ID(), 'tipo_documento');
    $tipo_doc = ($terminos && !is_wp_error($terminos)) ? $terminos[0]->name : 'Documento';
    ?>

    <main class="bg-[#F5F3EE] pt-32 pb-24 min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            
            <a href="<?php echo get_post_type_archive_link('documentos'); ?>" class="inline-flex items-center gap-2 text-[#555770] hover:text-[var(--color-primary)] text-sm font-500 transition-colors mb-8">
                <span>←</span> Volver a Documentos Normativos
            </a>

            <div class="bg-white border border-stone-200 shadow-sm overflow-hidden">
                
                <header class="p-8 md:p-12 border-b border-stone-200 bg-stone-50/50">
                    <span class="inline-block bg-[var(--color-base)] text-white text-xs font-600 tracking-widest uppercase px-3 py-1 mb-4">
                        <?php echo esc_html($tipo_doc); ?>
                    </span>
                    <h1 class="text-2xl md:text-4xl font-800 text-[var(--color-base)] leading-tight">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <div class="p-8 md:p-12">
                    
                    <?php if ($archivo_url) : ?>
                        <div class="border border-stone-200 bg-stone-50 p-6 flex flex-col md:flex-row items-center justify-between gap-6 mb-8">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-red-50 text-red-700 flex items-center justify-center shrink-0 border border-red-100 rounded-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-700 text-[var(--color-base)]">Documento Oficial Adjunto</h4>
                                    <p class="text-xs text-[#555770] font-300">Formato disponible: PDF de alta resolución.</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-3 w-full md:w-auto">
                                <a href="<?php echo esc_url($archivo_url); ?>" target="_blank" rel="noopener noreferrer" class="w-full md:w-auto text-center bg-[var(--color-base)] hover:bg-[#1a2f54] text-white px-5 py-2.5 text-xs font-600 transition-colors">
                                    Abrir Documento
                                </a>
                            </div>
                        </div>

                        <div class="hidden md:block border border-stone-200 aspect-[4/3] w-full">
                            <iframe src="<?php echo esc_url($archivo_url); ?>" class="w-full h-full" frameborder="0"></iframe>
                        </div>

                    <?php else : ?>
                        <div class="border border-amber-200 bg-amber-50 p-6 text-center text-amber-900 text-sm font-400">
                            Este registro normativo no tiene un archivo digital asociado actualmente. Por favor, póngase en contacto con la Coordinación si requiere una copia física.
                        </div>
                    <?php endif; ?>

                    <?php if (get_the_content()) : ?>
                        <div class="mt-8 pt-8 border-t border-stone-200 prose prose-stone max-w-none text-sm text-[#3D3F52] leading-relaxed">
                            <h3 class="text-base font-700 text-[var(--color-base)] mb-3">Descripción / Extracto</h3>
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>