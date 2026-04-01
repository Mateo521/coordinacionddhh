<?php
// single.php
get_header(); ?>

<main class="bg-white min-h-screen">
    <?php
    // Iniciamos el "Loop" de WordPress
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="pt-32 pb-16 bg-[#F5F3EE] border-b border-stone-200 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-[400px] h-[400px] rounded-full bg-[var(--color-primary)] opacity-5 translate-x-1/2 -translate-y-1/2"></div>

                    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">

                        <div class="inline-flex items-center justify-center gap-2 mb-6">
                            <span class="bg-[var(--color-primary)] text-[var(--color-base)] text-xs font-700 px-3 py-1 rounded-full uppercase tracking-widest shadow-sm">
                                <?php
                                // Obtenemos la primera categoría asignada al post
                                $categories = get_the_category();
                                if (! empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                } else {
                                    echo 'Novedades';
                                }
                                ?>
                            </span>
                        </div>

                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-800 text-[var(--color-base)] leading-tight mb-8">
                            <?php the_title(); ?>
                        </h1>

                        <div class="flex items-center justify-center gap-3 text-sm text-[#555770] font-400">
                            <span><?php echo get_the_date(); ?></span>
                            <!--span class="w-1.5 h-1.5 rounded-full bg-[var(--color-primary)]"></span-->
                            <!--span>Por <?php the_author(); ?></span-->
                        </div>

                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="max-w-5xl mx-auto px-6 -mt-8 relative z-20">
                        <div class="aspect-[21/9] md:aspect-[21/7] overflow-hidden shadow-2xl border border-white bg-stone-100">
                            <?php
                           
                            the_post_thumbnail('large', array('class' => 'w-full h-full object-cover'));
                            ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="h-12"></div>
                <?php endif; ?>

                <div class="max-w-3xl mx-auto px-6 py-12 md:py-20">

                    <div class="text-[#3D3F52] font-300 text-lg leading-relaxed 
                    [&>p]:mb-6 
                    [&>h2]:text-3xl [&>h2]:font-800 [&>h2]:text-[var(--color-base)] [&>h2]:mb-6 [&>h2]:mt-16 [&>h2]:leading-snug
                    [&>h3]:text-2xl [&>h3]:font-700 [&>h3]:text-[var(--color-base)] [&>h3]:mb-4 [&>h3]:mt-12
                    [&>ul]:list-none [&>ul]:space-y-3 [&>ul]:mb-8 [&>ul>li]:relative [&>ul>li]:pl-6
                    [&>ul>li::before]:content-[''] [&>ul>li::before]:absolute [&>ul>li::before]:w-1.5 [&>ul>li::before]:h-1.5 [&>ul>li::before]:bg-[var(--color-primary)] [&>ul>li::before]:rounded-full [&>ul>li::before]:left-0 [&>ul>li::before]:top-2.5
                    [&>ol]:list-decimal [&>ol]:ml-6 [&>ol]:mb-8 [&>ol>li]:mb-2 [&>ol>li]:pl-2
                    [&>blockquote]:border-l-4 [&>blockquote]:border-[var(--color-primary)] [&>blockquote]:pl-6 [&>blockquote]:italic [&>blockquote]:text-2xl [&>blockquote]:my-10 [&>blockquote]:text-[#1A1C2E]
                    [&>a]:text-[var(--color-primary)] [&>a]:font-600 hover:[&>a]:text-[#B8923A] [&>a]:transition-colors
                    [&>img]:w-full [&>img]:h-auto [&>img]:my-10 [&>img]:border [&>img]:border-stone-200 [&>img]:shadow-sm
                    [&>figure]:my-10 [&>figure>figcaption]:text-center [&>figure>figcaption]:text-sm [&>figure>figcaption]:text-[#888] [&>figure>figcaption]:mt-3">

                        <?php the_content(); ?>

                    </div>

                    <?php $tags = get_the_tags();
                    if ($tags) : ?>
                        <div class="mt-12 pt-8 border-t border-stone-200 flex flex-wrap gap-2">
                            <span class="text-xs font-600 uppercase tracking-widest text-[#888] mr-2 self-center">Etiquetas:</span>
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="bg-[#F5F3EE] hover:bg-[var(--color-primary)] hover:text-[var(--color-base)] text-[#555770] text-xs font-500 px-3 py-1 transition-colors">
                                    <?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </article>

            <div class="bg-[#F5F3EE] border-t border-stone-200 py-12">
                <div class="max-w-4xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-8">

                    <div class="w-full sm:w-1/2">
                        <div class="text-[var(--color-primary)] text-xs font-600 tracking-widest uppercase mb-2">← Post anterior</div>
                        <div class="font-700 text-lg leading-snug">
                            <?php previous_post_link('%link', '<span class="text-[var(--color-base)] hover:text-[var(--color-primary)] transition-colors line-clamp-2">%title</span>'); ?>
                        </div>
                    </div>

                    <div class="hidden sm:block w-px h-16 bg-stone-300"></div>

                    <div class="w-full sm:w-1/2 sm:text-right">
                        <div class="text-[var(--color-primary)] text-xs font-600 tracking-widest uppercase mb-2">Siguiente post →</div>
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