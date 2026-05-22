<?php
// Archivo: single-ciclos.php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <main class="bg-[#F5F3EE] pt-32 pb-24 min-h-screen">
            <div class="max-w-7xl mx-auto px-6">

                <?php
                $terms = get_the_terms(get_the_ID(), 'tipo_ciclo');
                $volver_url = '#';
                $volver_texto = 'Volver al listado';

                if ($terms && !is_wp_error($terms)) {
                    $volver_url = get_term_link($terms[0]);
                    $volver_texto = 'Volver a ' . $terms[0]->name;
                }
                ?>

                <a href="<?php echo esc_url($volver_url); ?>" class="inline-flex items-center gap-2 text-[#555770] hover:text-[var(--color-primary)] text-sm font-500 transition-colors mb-8">
                    <span>←</span> <?php echo esc_html($volver_texto); ?>
                </a>

                <article class="bg-white border border-stone-200 overflow-hidden shadow-sm">

                    <header class="p-8 md:p-12 border-b border-stone-100">
                        <?php if ($terms && !is_wp_error($terms)) : ?>
                            <div class="inline-block bg-[var(--color-base)] text-white text-xs font-600 tracking-widest uppercase px-3 py-1 mb-4">
                                <?php echo esc_html($terms[0]->name); ?>
                            </div>
                        <?php endif; ?>

                        <h1 class="text-3xl md:text-5xl font-800 text-[var(--color-base)] leading-tight">
                            <?php the_title(); ?>
                        </h1>
                    </header>

                    <div class="text-[#3D3F52] font-300 text-lg leading-relaxed p-6
                        
                    
                        [&_p]:mb-6 [&_p]:text-pretty
                        
                   
                        [&_h2]:text-3xl [&_h2]:font-800 [&_h2]:text-[var(--color-base)] [&_h2]:mb-6 [&_h2]:mt-16 [&_h2]:leading-snug
                        [&_h3]:text-2xl [&_h3]:font-700 [&_h3]:text-[var(--color-base)] [&_h3]:mb-4 [&_h3]:mt-12
                        [&_h4]:text-xl [&_h4]:font-600 [&_h4]:text-[var(--color-base)] [&_h4]:mb-3 [&_h4]:mt-8
                        
                     
                        [&_ul]:list-none [&_ul]:space-y-3 [&_ul]:mb-8 [&_ul]:ml-2
                        [&_ul_li]:relative [&_ul_li]:pl-6
                        [&_ul_li::before]:content-[''] [&_ul_li::before]:absolute [&_ul_li::before]:w-1.5 [&_ul_li::before]:h-1.5 [&_ul_li::before]:bg-[var(--color-primary)] [&_ul_li::before]:rounded-full [&_ul_li::before]:left-0 [&_ul_li::before]:top-2.5
                        
                      
                        [&_ol]:list-decimal [&_ol]:ml-6 [&_ol]:mb-8 [&_ol_li]:mb-2 [&_ol_li]:pl-2 [&_ol_li]:marker:text-[var(--color-primary)] [&_ol_li]:marker:font-600
                        
                       
                        [&_blockquote]:border-l-4 [&_blockquote]:border-[var(--color-primary)] [&_blockquote]:pl-6 [&_blockquote]:italic [&_blockquote]:text-2xl [&_blockquote]:my-10 [&_blockquote]:text-[var(--color-base)] [&_blockquote]:bg-stone-50 [&_blockquote]:py-6 [&_blockquote]:pr-6
                        
                     
                        [&_a]:text-[var(--color-primary)] [&_a]:font-600 hover:[&_a]:text-[var(--color-base)] [&_a]:transition-colors [&_a]:underline [&_a]:underline-offset-4
                        
                      
                        [&_figure]:w-full [&_figure]:my-12 [&_figure]:mx-0
                        [&_img]:w-full [&_img]:h-auto [&_img]:object-cover [&_img]:border [&_img]:border-stone-200 [&_img]:shadow-sm
                        
                     
                        [&_figcaption]:text-center [&_figcaption]:text-sm [&_figcaption]:text-[#888] [&_figcaption]:mt-3 [&_figcaption]:italic
                        
                       
                        [&_.wp-block-gallery]:gap-4 [&_.wp-block-gallery]:my-12 [&_.wp-block-gallery_figure]:my-0
                        [&_.wp-block-columns]:my-12 [&_.wp-block-columns]:gap-8
                        
                      
                        [&_pre]:bg-stone-100 [&_pre]:p-4 [&_pre]:rounded-md [&_pre]:overflow-x-auto [&_pre]:text-sm
                    ">

                        <?php the_content(); ?>
                    </div>

                </article>

            </div>
        </main>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>