<?php
/* Template Name: Fundamentos */
get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <section class="bg-[var(--color-base)] pt-32 pb-16 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[var(--color-primary)]/5 rounded-full translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-64 h-64 bg-[var(--color-primary)]/3 rounded-full translate-y-1/2 pointer-events-none"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 ">
                <!--div class="inline-flex items-center justify-center gap-2 mb-5">
            <span class="text-[var(--color-primary)] text-sm font-600  uppercase">Documento</span>
        </div-->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-900 text-white leading-tight mb-4">
                    <?php the_title(); ?>
                </h1>
                <p class="text-white/60 font-400 text-base md:text-lg max-w-2xl  leading-relaxed">
                    <?php echo get_field('fundamentos_subtitulo') ?: 'Agenda Anual Común y Colectiva hacia los 50 años de la dictadura cívico militar eclesiástico empresarial.'; ?>
                </p>
            </div>
        </section>
        <main class="bg-[#F5F3EE] py-20 min-h-screen">
            <div class="max-w-7xl mx-auto px-6">
                <div class="mb-12  py-2 ">
                    <p class="text-xl font-500 text-[var(--color-base)] leading-relaxed">
                        <?php echo get_field('fundamentos_destacado') ?: 'La Agenda Anual Común y Colectiva a 50 años de la dictadura... (Texto de respaldo)'; ?>
                    </p>
                </div>
                <div class="text-[#3D3F52] text-base font-400 leading-relaxed space-y-6 
                    [&_p]:mb-6 [&_strong]:font-700 [&_strong]:text-[var(--color-base)]
                    [&_a]:text-[var(--color-primary)] [&_a]:underline hover:[&_a]:text-[var(--color-base)] transition-colors">
                    <?php the_content(); ?>
                </div>
                <div class="mt-16 bg-white border border-stone-200 p-8 shadow-sm">
                    <h3 class="text-xl font-700 text-[var(--color-base)] mb-4 flex items-center gap-3">
                        <span class="w-4 h-4 bg-[var(--color-primary)] block"></span>
                        Espacios y organizaciones participantes
                    </h3>
                    <p class="text-sm text-[#555770] font-300 leading-relaxed mb-4">
                        <?php echo get_field('fundamentos_organizaciones') ?: 'Cátedra Libre Mauricio López, Jubilados autoconvocados San Luis, Suena el Bajo...'; ?>
                    </p>
                    <div class="inline-flex items-start md:items-center gap-2 bg-[#F5F3EE] px-4 py-3 border border-stone-100">
                        <svg class="w-5 h-5 text-[var(--color-primary)] shrink-0 mt-0.5 md:mt-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

                        </svg>
                        <span class="text-sm font-500 text-[var(--color-base)] uppercase leading-snug">
                            <?php echo get_field('fundamentos_nota') ?: 'Esta nómina se irá actualizando a medida que avance el año y se sumen nuevos espacios.'; ?>
                        </span>
                    </div>
                </div>

            </div>
        </main>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>