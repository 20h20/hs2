<?php
    $uptitle	= get_field('events_uptitle');
    $title  = get_field('events_title');
    $chapo  = get_field('events_chapo');
?>

<section class="cbo-events events--relationship">
    <div class="events-inner cbo-container">

        <div class="list-el el--intro">
            <?php if($uptitle): ?>
                <div class="events-uptitle cbo-uptitle slide-up">
                    <?php echo esc_html($uptitle); ?>
                </div>
            <?php endif; ?>

            <?php if($title): ?>
                <div class="events-title cbo-title-2 slide-up">
                    <?php echo wp_kses_post($title); ?>
                </div>
            <?php endif; ?>

            <?php if($chapo): ?>
                <div class="events-content slide-up">
                    <?php echo wp_kses_post($chapo); ?>
                </div>
            <?php endif; ?>

            <?php get_template_part('templates/parts/button/template', null, array()); ?>
        </div>

        <div class="events-list">
            <?php
                $current_page = get_query_var('paged');
                $current_page = max(1, $current_page);
                $per_page = 3;
                $args = array(
                    'post_type' => 'post',
                    'meta_key' => 'event_start',
                    'meta_value' => date('Ymd'),
                    'meta_compare' => '>=',
                    'posts_per_page' => $per_page,
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_part('templates/parts/blocevent/template');
                    }
                } else {
                    echo '<p>Aucun événement à venir.</p>';
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>