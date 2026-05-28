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
                $event_ids = get_transient('hs2_block_upcoming_events');
                if (false === $event_ids) {
                    $ids_query = new WP_Query(array(
                        'post_type'      => 'post',
                        'meta_key'       => 'event_start',
                        'meta_value'     => date('Ymd'),
                        'meta_compare'   => '>=',
                        'posts_per_page' => 3,
                        'orderby'        => 'meta_value_num',
                        'order'          => 'ASC',
                        'no_found_rows'  => true,
                        'fields'         => 'ids',
                    ));
                    $event_ids = $ids_query->posts;
                    set_transient('hs2_block_upcoming_events', $event_ids, HOUR_IN_SECONDS);
                }
                if (!empty($event_ids)) {
                    $query = new WP_Query(array(
                        'post_type'      => 'post',
                        'post__in'       => $event_ids,
                        'orderby'        => 'post__in',
                        'posts_per_page' => count($event_ids),
                        'no_found_rows'  => true,
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_part('templates/parts/blocevent/template');
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>Aucun événement à venir.</p>';
                }
            ?>
        </div>
    </div>
</section>