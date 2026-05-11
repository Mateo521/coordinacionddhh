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
                    <span class="text-[var(--color-primary)] text-xs font-600 tracking-[0.25em] uppercase">Coordinación General de DDHH</span>
                </div>
                <h1 class="text-4xl lg:text-5xl font-900 text-white leading-none mb-3">
                    Agenda <span class="text-[var(--color-primary)] font-300">Institucional</span>
                </h1>
                <p class="text-white/60 font-300 text-base max-w-xl leading-relaxed mt-4">
                    Cronograma oficial de actividades, ciclos de formación, encuentros culturales y jornadas de memoria organizadas o acompañadas por la Universidad.
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
    </div>
</section>

<main class="max-w-7xl mx-auto px-6 py-16 min-h-[50vh]">
    <div class="space-y-6" id="eventos-container">

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


            $mes_actual = '';

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


                    $mes_anio_evento = ucfirst(date_i18n('F Y', $timestamp));
                } else {
                    $dia_numero = '--';
                    $mes_corto = '---';
                    $dia_nombre = '---';
                    $mes_anio_evento = 'Fechas a confirmar';
                }


                if ($mes_anio_evento !== $mes_actual) {
                    echo '<div class="mes-separador pt-10 pb-2 border-b border-stone-200 mb-6">';
                    echo '<h2 class="text-2xl font-800 text-[var(--color-base)] tracking-wide">' . esc_html($mes_anio_evento) . '</h2>';
                    echo '</div>';
                    // Actualizamos la variable
                    $mes_actual = $mes_anio_evento;
                }


                $terms = get_the_terms(get_the_ID(), 'categoria_evento');
                $cat_slug = 'todos';
                $cat_name = 'Evento';


                $border_color = 'hover:border-[var(--color-primary)]';
                $badge_bg = 'bg-stone-100';
                $badge_text = 'text-[#555770]';

                if ($terms && ! is_wp_error($terms)) {
                    $cat_slug = $terms[0]->slug;
                    $cat_name = $terms[0]->name;


                    if ($cat_slug == 'genero') {
                        $badge_bg = 'bg-pink-50';
                        $badge_text = 'text-pink-700';
                        $border_color = 'hover:border-pink-300';
                    } elseif ($cat_slug == 'memoria') {
                        $badge_bg = 'bg-blue-50';
                        $badge_text = 'text-blue-700';
                        $border_color = 'hover:border-blue-300';
                    } elseif ($cat_slug == 'cultura') {
                        $badge_bg = 'bg-green-50';
                        $badge_text = 'text-green-700';
                        $border_color = 'hover:border-green-300';
                    }
                }
        ?>

                <div class="evento-card" data-cat="<?php echo esc_attr($cat_slug); ?>">
                    <div class="bg-white border border-stone-200 <?php echo $border_color; ?> hover:shadow-md transition-all duration-300 overflow-hidden group rounded-sm">
                        <div class="flex flex-col sm:flex-row">

                            <div class="bg-stone-50 sm:w-32 shrink-0 flex flex-row sm:flex-col items-center justify-center py-4 sm:py-6 px-4 border-b sm:border-b-0 sm:border-r border-stone-200 gap-2 sm:gap-0">
                                <div class="text-[#0E1B35] text-3xl sm:text-4xl font-800 leading-none"><?php echo $dia_numero; ?></div>
                                <div class="text-[#888] text-xs font-500 uppercase tracking-widest sm:mt-1"><?php echo $mes_corto; ?></div>
                                <div class="text-[#0E1B35]/40 text-xs font-400 sm:mt-2 hidden sm:block"><?php echo $dia_nombre; ?></div>
                            </div>

                            <div class="flex-1 p-6 lg:p-8">
                                <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                                    <div class="flex flex-wrap gap-2 items-center">
                                        <span class="<?php echo $badge_bg . ' ' . $badge_text; ?> text-xs font-600 px-3 py-1 rounded-full">
                                            <?php echo esc_html($cat_name); ?>
                                        </span>
                                        <?php if ($hora): ?>
                                            <span class="text-[#555770] text-xs font-500 flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <?php echo esc_html($hora); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($lugar): ?>
                                        <span class="text-[#888] text-xs font-400 flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <?php echo esc_html($lugar); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <h3 class="text-xl font-700 text-[#0E1B35] mb-2 leading-snug">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-[var(--color-primary)] transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="text-sm text-[#555770] font-300 leading-relaxed mb-4">
                                    <?php echo wp_trim_words(get_the_content(), 25, '...'); ?>
                                </div>

                                <?php if ($organizador): ?>
                                    <div class="flex items-center gap-1.5 text-xs text-[#888] font-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-stone-300"></span>
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
            <div class="bg-[#F5F3EE] border border-stone-200 p-8 text-center rounded-sm">
                <p class="text-base text-[#555770] font-300">Aún no se han publicado actividades para la agenda.</p>
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