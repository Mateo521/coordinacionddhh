<?php
/* Template Name: Agenda */
get_header(); ?>

<section class="bg-[#0E1B35] pt-32 pb-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[var(--color-primary)]/5 rounded-full translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/3 w-64 h-64 bg-[var(--color-primary)]/3 rounded-full translate-y-1/2 pointer-events-none"></div>

    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
        style="background-image: radial-gradient(var(--color-primary) 1px, transparent 1px); background-size: 28px 28px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
            <div>
                <div class="inline-flex items-center gap-2 mb-5">
                    <span class="w-8 h-px bg-[var(--color-primary)]"></span>
                    <span class="text-[var(--color-primary)] text-xs font-600 tracking-[0.25em] uppercase">Actividades · DDHH UNSL</span>
                </div>
                <h1 class="text-5xl lg:text-6xl font-900 text-white leading-none mb-3">
                    Agenda<br /><span class="text-[var(--color-primary)]">Marzo</span> <span class="text-white/30"><?php echo date('Y'); ?></span>
                </h1>
                <p class="text-white/50 font-300 text-base max-w-xl leading-relaxed mt-4">
                    Esta agenda se irá actualizando semanalmente. Actividades académicas, culturales y de memoria.
                </p>
            </div>

            <div class="flex flex-wrap gap-2" id="filtros">
                <button data-cat="todos" onclick="filtrar(this)"
                    class="filter-btn active px-4 py-2 rounded-full text-xs font-600 bg-[var(--color-primary)] text-[#0E1B35] transition-all">
                    Todos
                </button>
                <button data-cat="memoria" onclick="filtrar(this)"
                    class="filter-btn px-4 py-2 rounded-full text-xs font-600 bg-white/10 text-white/60 hover:bg-white/20 transition-all">
                    Memoria
                </button>
                <button data-cat="genero" onclick="filtrar(this)"
                    class="filter-btn px-4 py-2 rounded-full text-xs font-600 bg-white/10 text-white/60 hover:bg-white/20 transition-all">
                    Género y Diversidad
                </button>
                <button data-cat="cultura" onclick="filtrar(this)"
                    class="filter-btn px-4 py-2 rounded-full text-xs font-600 bg-white/10 text-white/60 hover:bg-white/20 transition-all">
                    Arte y Cultura
                </button>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
            <div class="bg-white/5 border border-white/10  px-5 py-4">
                <div class="text-3xl font-800 text-[var(--color-primary)]">
                    <?php

                    $count_events = wp_count_posts('evento');
                    echo $count_events->publish;
                    ?>
                </div>
                <div class="text-white/40 text-xs font-400 mt-0.5">Actividades cargadas</div>
            </div>
            <div class="bg-white/5 border border-white/10  px-5 py-4">
                <div class="text-3xl font-800 text-[var(--color-primary)]">50°</div>
                <div class="text-white/40 text-xs font-400 mt-0.5">Aniversario del golpe</div>
            </div>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-6 py-16 min-h-[50vh]">
    <div class="space-y-4" id="eventos-container">

        <?php
        $args = array(
            'post_type'      => 'evento',
            'posts_per_page' => -1,
            'meta_key'       => 'fecha_del_evento',
            'orderby'        => 'meta_value',
            'order'          => 'ASC'
        );
        $agenda = new WP_Query($args);

        if ($agenda->have_posts()) :
            while ($agenda->have_posts()) : $agenda->the_post();


                $fecha_cruda = get_field('fecha_del_evento');
                $hora = get_field('hora_evento');
                $lugar = get_field('lugar_evento');
                $organizador = get_field('organizador_evento');


                if ($fecha_cruda) {
                    $timestamp = strtotime($fecha_cruda);
                    $dia_numero = date_i18n('d', $timestamp);
                    $mes_corto = date_i18n('M', $timestamp);
                    $dia_nombre = date_i18n('D', $timestamp);
                } else {
                    $dia_numero = '--';
                    $mes_corto = '---';
                    $dia_nombre = '---';
                }

                $terms = get_the_terms(get_the_ID(), 'categoria_evento');
                $cat_slug = 'todos';
                $cat_name = 'Evento';

                $bg_fecha = 'bg-[#0E1B35]';
                $text_dia = 'text-[var(--color-primary)]';
                $text_mes = 'text-white/50';
                $badge_bg = 'bg-[#EEF2FF]';
                $badge_text = 'text-[#4F46E5]';

                if ($terms && ! is_wp_error($terms)) {
                    $cat_slug = $terms[0]->slug;
                    $cat_name = $terms[0]->name;

                    if ($cat_slug == 'genero') {
                        $bg_fecha = 'bg-[#831843]';
                        $text_dia = 'text-pink-200';
                        $text_mes = 'text-pink-300/50';
                        $badge_bg = 'bg-pink-50';
                        $badge_text = 'text-pink-700';
                    } elseif ($cat_slug == 'memoria') {
                        $bg_fecha = 'bg-[#1E3A5F]';
                        $text_dia = 'text-blue-200';
                        $text_mes = 'text-blue-300/50';
                        $badge_bg = 'bg-blue-50';
                        $badge_text = 'text-blue-700';
                    } elseif ($cat_slug == 'cultura') {
                        $bg_fecha = 'bg-[#1A5C3A]';
                        $text_dia = 'text-green-100';
                        $text_mes = 'text-green-200/50';
                        $badge_bg = 'bg-green-50';
                        $badge_text = 'text-green-700';
                    }
                }
        ?>

                <div class="evento-card" data-cat="<?php echo esc_attr($cat_slug); ?>">
                    <div class="bg-white border border-stone-200 hover:border-[var(--color-primary)]/50 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                        <div class="flex flex-col md:flex-row">

                            <div class="<?php echo $bg_fecha; ?> md:w-24 shrink-0 flex flex-row md:flex-col items-center justify-center py-4 md:py-6 px-4 md:px-3 text-center transition-colors gap-2 md:gap-0">
                                <div class="<?php echo $text_dia; ?> text-3xl font-800 leading-none"><?php echo $dia_numero; ?></div>
                                <div class="<?php echo $text_mes; ?> text-xs font-400 uppercase tracking-wider md:mt-1"><?php echo $mes_corto; ?></div>
                                <div class="text-white/30 text-xs font-300 md:mt-2 hidden md:block"><?php echo $dia_nombre; ?></div>
                            </div>

                            <div class="flex-1 p-6">
                                <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                                    <div class="flex flex-wrap gap-2">
                                        <span class="<?php echo $badge_bg . ' ' . $badge_text; ?> text-xs font-600 px-3 py-1 rounded-full">
                                            <?php echo esc_html($cat_name); ?>
                                        </span>
                                        <?php if ($hora): ?>
                                            <span class="bg-stone-100 text-[#555770] text-xs font-500 px-3 py-1 rounded-full flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <?php echo esc_html($hora); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <span class="text-[#888] text-xs font-400"><?php echo esc_html($lugar); ?></span>
                                </div>

                                <h3 class="text-base font-700 text-[#0E1B35] group-hover:text-[var(--color-primary)] transition-colors mb-2 leading-snug">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <div class="text-sm text-[#555770] font-300 leading-relaxed mb-3">
                                    <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                </div>

                                <?php if ($organizador): ?>
                                    <div class="flex items-center gap-1.5 text-xs text-[#888] font-400 border-t border-stone-100 pt-3 mt-3">
                                        <svg class="w-3.5 h-3.5 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                                        </svg>
                                        <?php echo esc_html($organizador); ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
        else: ?>
            <div class="bg-[#FEF9EC] border border-[var(--color-primary)]/30 p-6 flex items-start gap-4">
                <p class="text-sm text-[#555770] font-300">Aún no se han publicado actividades para la agenda.</p>
            </div>
        <?php endif; ?>

    </div>
</main>

<script>
    function filtrar(btn) {
        const cat = btn.dataset.cat;


        document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('active', 'bg-[var(--color-primary)]', 'text-[#0E1B35]');
            b.classList.add('bg-white/10', 'text-white/60');
        });
        btn.classList.add('active', 'bg-[var(--color-primary)]', 'text-[#0E1B35]');
        btn.classList.remove('bg-white/10', 'text-white/60');


        document.querySelectorAll('.evento-card').forEach(card => {
            if (cat === 'todos' || card.dataset.cat === cat) {
                card.style.display = 'block';
                card.style.animation = 'fadeIn 0.3s ease forwards';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<?php get_footer(); ?>