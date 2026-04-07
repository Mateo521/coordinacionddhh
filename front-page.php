<?php
// front-page.php
get_header(); ?>

<main>
    <section id="inicio" class="min-h-screen bg-[var(--color-base)] relative overflow-hidden flex items-center">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 right-0 w-[700px] h-[700px] rounded-full bg-[var(--color-primary)] translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full bg-[var(--color-primary)] -translate-x-1/3 translate-y-1/3"></div>
        </div>

        <div class="absolute inset-0 opacity-[0.04]">
            <div class="absolute top-1/4 left-0 right-0 h-px bg-white"></div>
            <div class="absolute top-2/4 left-0 right-0 h-px bg-white"></div>
            <div class="absolute top-3/4 left-0 right-0 h-px bg-white"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 pt-24 pb-16 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center min-h-[85vh]">


            
                <div class="flex flex-col justify-center">
                    <div class="inline-flex items-center gap-2 mb-8"></div>

                    <blockquote class="mb-8">
                        <div class="text-[var(--color-primary)] text-4xl font-300 leading-none mb-4 select-none">&ldquo;</div>
                        <p class="text-white text-2xl lg:text-3xl font-300 leading-relaxed tracking-wide">
                            <?php

                            $cita = get_field('cita_hero');
                            if ($cita) {
                                echo wp_kses_post($cita);
                            } else {
                                echo 'Nuestra universidad dejará de ser una isla extraña en el pueblo donde se haya inserta, para convertirse en <span class="font-700 text-[var(--color-primary)]">alma y nervio</span> de su comunidad.';
                            }
                            ?>
                        </p>
                        <div class="text-[var(--color-primary)] text-4xl font-300 leading-none mt-4 text-right select-none">&rdquo;</div>
                    </blockquote>

                    <div class="flex items-center gap-4 mb-12">
                        <div>
                            <div class="text-white font-600 text-base">
                                <?php echo get_field('autor_hero') ?: 'Mauricio Amilcar López'; ?>
                            </div>
                            <div class="text-white/50 text-sm font-300">
                                <?php echo get_field('descripcion_autor_hero') ?: 'Primer rector de la UNSL · Defensor de los derechos humanos'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a href="#institucional" class="bg-[var(--color-primary)] hover:bg-[#B8923A] text-[var(--color-base)] px-6 py-3  font-600 text-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg">Conocer más</a>
                        <a href="#lineas" class="border border-white/30 hover:border-[var(--color-primary)] text-white hover:text-[var(--color-primary)] px-6 py-3  font-400 text-sm transition-all duration-200">Líneas de acción</a>
                    </div>
                </div>

                <div class="relative flex justify-center lg:justify-end">
                    <div class="absolute -top-4 -right-4 w-full max-w-sm h-full border border-[var(--color-primary)]/20 "></div>
                    <div class="relative w-full max-w-md  overflow-hidden shadow-2xl aspect-[3/4] bg-gradient-to-br from-[#1a2f54] to-[#0a1628] flex flex-col items-center justify-center border border-white/10">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Mauricio-Amilcar-Lopez.jpg" class="size-full absolute top-0 left-0" alt="Mauricio Amilcar López">
                        <div class="text-white/30 text-sm font-300 text-center px-8 leading-relaxed">
                            Foto de<br />Mauricio Amilcar López
                        </div>
                        <div class="absolute bottom-6 left-6 right-6 bg-white/5 backdrop-blur border border-white/10  px-4 py-3">
                            <div class="text-white text-xs font-600 tracking-widest uppercase mb-0.5">Primer Rector</div>
                            <div class="text-white text-sm font-400">Universidad Nacional de San Luis</div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-[var(--color-primary)]  px-4 py-3 shadow-xl">
                        <div class="text-[var(--color-base)] text-xs font-700 tracking-widest uppercase">DDHH UNSL</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border-b border-stone-200">
    </section>

    <section id="institucional" class="py-24 bg-[#F5F3EE]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12 mb-16">
                <div class="lg:col-span-1">
                    <div class="inline-flex items-center gap-2 mb-4">
                        <span class="text-[var(--color-primary)] text-xs font-600  uppercase">Institucional</span>
                    </div>
                    <h2 class="text-4xl font-800 text-[var(--color-base)] leading-tight">Quiénes<br />Somos</h2>
                </div>
                <div class="lg:col-span-2 flex items-center">
                    <p class="text-lg font-300 text-[#3D3F52] leading-relaxed">
                        <?php echo get_field('texto_principal_institucional') ?: 'La Coordinación General de Derechos Humanos de la UNSL es un espacio institucional transversal, participativo y permanente orientado a fortalecer el compromiso de la universidad pública con la promoción, defensa y garantía de los derechos humanos en la vida universitaria y su proyección social.'; ?>
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white  p-8 border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <h3 class="text-lg font-700 text-[var(--color-base)] mb-3">Presentación</h3>
                    <p class="text-sm font-400 text-[#555770] leading-relaxed">
                        <?php echo get_field('texto_presentacion') ?: 'La Coordinación General se constituye como un espacio que reafirma el compromiso histórico de la universidad pública argentina con la democracia, la memoria, la verdad y la justicia.'; ?>
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 mt-4 text-[var(--color-primary)] text-sm font-600 hover:gap-2 transition-all">Leer más <span>→</span></a>
                </div>

                <div class="bg-white  p-8 border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <h3 class="text-lg font-700 text-[var(--color-base)] mb-3">Fundamentación</h3>
                    <p class="text-sm font-400 text-[#555770] leading-relaxed">
                        <?php echo get_field('texto_fundamentacion') ?: 'La creación de la Coordinación se inscribe en la tradición de la universidad pública argentina que asume un rol activo frente a los desafíos democráticos de cada época histórica.'; ?>
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 mt-4 text-[var(--color-primary)] text-sm font-600 hover:gap-2 transition-all">Leer más <span>→</span></a>
                </div>

                <div class="bg-white  p-8 border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <h3 class="text-lg font-700 text-[var(--color-base)] mb-3">Misión</h3>
                    <p class="text-sm font-400 text-[#555770] leading-relaxed">
                        <?php echo get_field('texto_mision') ?: 'Promover la construcción de un saber y un hacer institucional que garantice la vigencia de los Derechos Humanos, articulando acciones con actores del medio local, regional, nacional e internacional.'; ?>
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 mt-4 text-[var(--color-primary)] text-sm font-600 hover:gap-2 transition-all">Leer más <span>→</span></a>
                </div>
            </div>
        </div>
    </section>


    <section id="lineas" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="text-[var(--color-primary)] text-xs font-600  uppercase">
                        <?php echo get_field('lineas_subtitulo') ?: 'Nuestro trabajo'; ?>
                    </span>
                </div>
                <h2 class="text-4xl font-800 text-[var(--color-base)]">
                    <?php echo get_field('lineas_titulo') ?: 'Líneas de acción'; ?>
                </h2>
                <p class="mt-4 text-[#555770] font-300 max-w-2xl mx-auto">
                    <?php echo get_field('lineas_descripcion') ?: 'Tres ejes estratégicos que articulan el trabajo de la Coordinación General en el ámbito universitario y su proyección social.'; ?>
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <div class="relative overflow-hidden group">
                    <div class="bg-[var(--color-base)] p-8 h-full border border-[var(--color-base)]/10 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-xl font-700 text-white mb-4">Memoria de la Historia Reciente</h3>
                        <div class="space-y-3 text-sm text-white/60 font-300">
                            <?php echo get_field('lineas_c1_contenido') ?: '<ul><li>Restitución de legajos</li><li>Agenda colectiva a 50 años de la dictadura</li></ul>'; ?>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden group">
                    <div class="bg-[var(--color-primary)] p-8 h-full hover:shadow-xl transition-all duration-300">
                        <h3 class="text-xl font-700 text-[var(--color-base)] mb-4">DDHH en el Presente Histórico</h3>
                        <div class="space-y-3 text-sm text-[var(--color-base)]/70 font-300">
                            <?php echo get_field('lineas_c2_contenido') ?: '<ul><li>Género y diversidades</li><li>Contexto de encierro</li></ul>'; ?>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden group">
                    <div class="bg-[#F5F3EE] p-8 h-full border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-xl font-700 text-[var(--color-base)] mb-4">Curricularización de los DDHH</h3>
                        <div class="space-y-3 text-sm text-[#555770] font-300">
                            <?php echo get_field('lineas_c3_contenido') ?: '<ul><li>Implementación del Acuerdo Plenario 1169/22</li><li>Espacios de formación</li></ul>'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-[#F5F3EE]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 mb-4">
                        <span class="text-[var(--color-primary)] text-xs font-600  uppercase">Propósitos</span>
                    </div>
                    <h2 class="text-3xl font-800 text-[var(--color-base)] leading-tight mb-8">
                        <?php echo get_field('propositos_titulo') ?: 'Nuestros compromisos<br />con la comunidad'; ?>
                    </h2>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8  bg-[var(--color-primary)] flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-[var(--color-base)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <p class="text-sm font-400 text-[#555770] leading-relaxed">
                                <?php echo get_field('propositos_item_1') ?: 'Contribuir a la construcción colectiva de la memoria del pasado reciente...'; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--color-base)]  p-10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[var(--color-primary)]/5 rounded-full translate-x-1/2 -translate-y-1/2"></div>
                    <div class="relative z-10">
                        <div class="text-[var(--color-primary)] text-5xl font-300 leading-none mb-4">&ldquo;</div>
                        <p class="text-white/80 text-base font-300 leading-relaxed mb-6">
                            <?php echo get_field('propositos_cita_texto') ?: 'Sostener hoy una Coordinación General de Derechos Humanos implica honrar el legado de Mauricio López y proyectarlo hacia el presente.'; ?>
                        </p>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-px bg-[var(--color-primary)]"></div>
                            <span class="text-[var(--color-primary)] text-xs font-500 tracking-widest uppercase">Fundamentación institucional</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="integrantes" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 mb-4">
                        <span class="text-[var(--color-primary)] text-xs font-600  uppercase">Comisión 2025–2028</span>
                    </div>
                    <h2 class="text-4xl font-800 text-[var(--color-base)]">Integrantes</h2>
                </div>

                <div class="bg-[#F5F3EE]  px-6 py-4 border border-stone-200">
                    <div class="text-xs text-[#555770] font-400 mb-1">Coordinación General</div>
                    <div class="text-[var(--color-base)] font-700">
                        <?php echo get_field('integrantes_coord_nombre') ?: 'Paola Figueroa'; ?>
                    </div>
                    <div class="text-[var(--color-primary)] text-xs font-400">
                        <?php echo get_field('integrantes_coord_cargo') ?: 'Coordinadora General de DDHH UNSL'; ?>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-[#F5F3EE] p-6 border border-stone-200 hover:border-[var(--color-primary)]/40 transition-colors">
                    <div class="text-[var(--color-primary)] text-xs font-600 tracking-widest uppercase mb-3">Escuela Normal Juan Pascual Pringles</div>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[var(--color-base)]"></span>
                            <span class="text-sm font-500 text-[var(--color-base)]">Comelli Celi, Laura Valentina</span>
                            <span class="ml-auto text-xs text-[#888] bg-white px-2 py-0.5 rounded-full border">Titular</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="novedades" class="py-24 bg-[#F5F3EE]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 mb-4">
                        <span class="text-[var(--color-primary)] text-xs font-600  uppercase">Agenda y Noticias</span>
                    </div>
                    <h2 class="text-4xl font-800 text-[var(--color-base)]">Novedades y Actividades</h2>
                </div>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="inline-flex items-center gap-2 text-[var(--color-base)] border-b border-[var(--color-primary)] pb-0.5 text-sm font-600 hover:text-[var(--color-primary)] transition-colors">
                    Ver todas <span>→</span>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php

                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                );
                $novedades = new WP_Query($args);

                if ($novedades->have_posts()) :
                    while ($novedades->have_posts()) : $novedades->the_post(); ?>

                        <article class="bg-white overflow-hidden border border-stone-200 hover:border-[var(--color-primary)]/40 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group flex flex-col">

                            <div class="bg-[var(--color-base)] h-44 relative overflow-hidden flex-shrink-0">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large', array('class' => 'absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-screen transition-transform duration-500 group-hover:scale-105')); ?>
                                <?php else : ?>
                                    <div class="absolute inset-0 bg-gradient-to-br from-[#1a2f54] to-[#0a1628] flex items-center justify-center">
                                        <span class="text-white/10 text-7xl font-800">DDHH</span>
                                    </div>
                                <?php endif; ?>

                                <?php $categories = get_the_category();
                                if (! empty($categories)) { ?>
                                    <div class="absolute top-4 left-4 bg-[var(--color-primary)] text-[var(--color-base)] text-xs font-700 px-3 py-1 rounded-full">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-[#888] text-xs font-400 mb-2"><?php echo get_the_date(); ?></div>
                                <h4 class="text-base font-700 text-[var(--color-base)] mb-2 group-hover:text-[var(--color-primary)] transition-colors leading-snug">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="text-sm text-[#555770] font-300 leading-relaxed mb-4 flex-grow">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="text-[var(--color-primary)] text-sm font-600 inline-flex items-center gap-1 hover:gap-2 transition-all mt-auto">
                                    Leer más <span>→</span>
                                </a>
                            </div>
                        </article>

                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-[#555770] col-span-3">Aún no hay novedades publicadas.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>



    <section id="agenda-actividades" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="mb-10 border-b border-stone-200 pb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <div class="inline-flex items-center gap-2 mb-2">
                        <span class="text-[var(--color-primary)] text-xs font-600 uppercase tracking-wide">Próximas Actividades</span>
                    </div>
                    <h2 class="text-3xl font-800 text-[var(--color-base)]">Agenda destacada</h2>
                </div>
                <div class="flex flex-col md:items-end gap-2">
                    <p class="text-[#555770] text-sm md:text-right max-w-sm">
                        Cronograma de actividades institucionales y eventos conmemorativos.
                    </p>
                    <a href="<?php echo site_url('/agenda'); ?>" class="text-[var(--color-primary)] text-sm font-600 hover:text-[var(--color-base)] transition-colors inline-flex items-center gap-1">
                        Ver agenda completa <span>→</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-4">

                <?php

                $hoy = current_time('Ymd');


                $args_agenda = array(
                    'post_type'      => 'evento',
                    'posts_per_page' => 6,
                    'meta_key'       => 'fecha_del_evento',
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        array(
                            'key'     => 'fecha_del_evento',
                            'value'   => $hoy,
                            'compare' => '>=',
                            'type'    => 'NUMERIC'
                        )
                    )
                );
                $agenda_front = new WP_Query($args_agenda);

                if ($agenda_front->have_posts()) :
                    while ($agenda_front->have_posts()) : $agenda_front->the_post();


                        $fecha_cruda = get_field('fecha_del_evento');
                        $hora = get_field('hora_evento');
                        $lugar = get_field('lugar_evento');
                        $organizador = get_field('organizador_evento');


                        if ($fecha_cruda) {
                            $timestamp = strtotime($fecha_cruda);
                            $dia_numero = date_i18n('d', $timestamp);
                            $mes_corto = date_i18n('M', $timestamp);
                        } else {
                            $dia_numero = '--';
                            $mes_corto = '---';
                        }


                        $terms = get_the_terms(get_the_ID(), 'categoria_evento');
                        $bg_fecha = 'bg-[var(--color-base)]';
                        $hover_bg = 'group-hover:bg-[#1a2f54]';

                        if ($terms && ! is_wp_error($terms)) {
                            $cat_slug = $terms[0]->slug;
                            if ($cat_slug == 'genero') {
                                $bg_fecha = 'bg-[#831843]';
                                $hover_bg = 'group-hover:bg-[#9D174D]';
                            } elseif ($cat_slug == 'memoria') {
                                $bg_fecha = 'bg-[#1E3A5F]';
                                $hover_bg = 'group-hover:bg-[#2C5282]';
                            } elseif ($cat_slug == 'cultura') {
                                $bg_fecha = 'bg-[#1A5C3A]';
                                $hover_bg = 'group-hover:bg-[#227A4D]';
                            }
                        }
                ?>

                        <article class="flex flex-col md:flex-row bg-[#F5F3EE] border border-stone-200 hover:border-[var(--color-primary)]/60 transition-all duration-300 group">

                            <div class="<?php echo $bg_fecha; ?> <?php echo $hover_bg; ?> text-white p-6 md:w-40 flex flex-col justify-center items-center shrink-0 transition-colors">
                                <span class="text-4xl font-800 leading-none mb-1"><?php echo $dia_numero; ?></span>
                                <span class="text-xs uppercase tracking-widest font-600"><?php echo $mes_corto; ?></span>
                            </div>

                            <div class="p-6 flex-1 flex flex-col justify-center">
                                <h3 class="text-lg font-700 text-[var(--color-base)] mb-2 leading-snug group-hover:text-[var(--color-primary)] transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <p class="text-sm text-[#555770] font-300 mb-4 line-clamp-2">
                                    <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 20, '...'); ?>
                                </p>

                                <div class="flex flex-wrap gap-x-6 gap-y-2 text-xs font-600 text-[#666]">

                                    <?php if ($hora): ?>
                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <?php echo esc_html($hora); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($lugar): ?>
                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <?php echo esc_html($lugar); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if ($organizador): ?>
                                        <span class="flex items-center gap-1.5 text-[var(--color-base)]">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            <?php echo esc_html($organizador); ?>
                                        </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </article>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                else: ?>
                    <div class="bg-[#FEF9EC] border border-[#C8A84B]/30 p-6 flex items-start gap-4">
                        <p class="text-sm text-[#555770] font-300">Actualmente no hay actividades próximas programadas. Revisa más tarde para nuevas actualizaciones.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>


</main>

<?php get_footer(); ?>