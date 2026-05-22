<?php
// single.php
get_header(); ?>

<main class="bg-white min-h-screen">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="pt-32 pb-16 bg-[#F5F3EE] border-b border-stone-200 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-[400px] h-[400px] rounded-full bg-[var(--color-primary)] opacity-5 translate-x-1/2 -translate-y-1/2"></div>

                    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">

                        <div class="inline-flex items-center justify-center gap-2 mb-6">
                            <span class="bg-[var(--color-primary)] text-[var(--color-base)] text-sm font-700 px-3 py-1 rounded-full uppercase  shadow-sm">
                                <?php
                                $categories = get_the_category();
                                if (! empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                } else {
                                    echo 'Novedades';
                                }
                                ?>
                            </span>
                        </div>

                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-800 text-[var(--color-base)] leading-tight mb-8">
                            <?php the_title(); ?>
                        </h1>

                        <div class="flex items-center justify-center gap-3 text-sm text-[#555770] font-400">
                            <span><?php echo get_the_date(); ?></span>
                        </div>

                    </div>
                </header>

                <div class="max-w-7xl mx-auto px-6 py-12 md:py-20 text-left">

                    <div class="text-[#3D3F52] font-300 text-lg leading-relaxed 
                        
                    
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

                    <?php $tags = get_the_tags();
                    if ($tags) : ?>
                        <div class="mt-12 pt-8 border-t border-stone-200 flex flex-wrap gap-2">
                            <span class="text-sm font-600 uppercase  text-[#888] mr-2 self-center">Etiquetas:</span>
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="bg-[#F5F3EE] hover:bg-[var(--color-primary)] hover:text-white text-[#555770] text-sm font-500 px-3 py-1 transition-colors rounded-full">
                                    <?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </article>

            <div class="bg-[#F5F3EE] border-t border-stone-200 py-12">
                <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-8 text-center sm:text-left">

                    <div class="w-full sm:w-1/2">
                        <div class="text-[var(--color-primary)] text-sm font-600  uppercase mb-2">← Fecha anterior</div>
                        <div class="font-700 text-lg leading-snug">
                            <?php previous_post_link('%link', '<span class="text-[var(--color-base)] hover:text-[var(--color-primary)] transition-colors line-clamp-2">%title</span>'); ?>
                        </div>
                    </div>

                    <div class="hidden sm:block w-px h-16 bg-stone-300"></div>

                    <div class="w-full sm:w-1/2 sm:text-right text-center">
                        <div class="text-[var(--color-primary)] text-sm font-600  uppercase mb-2">Siguiente fecha →</div>
                        <div class="font-700 text-lg leading-snug">
                            <?php next_post_link('%link', '<span class="text-[var(--color-base)] hover:text-[var(--color-primary)] transition-colors line-clamp-2">%title</span>'); ?>
                        </div>
                    </div>

                </div>
            </div>

    <?php
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>