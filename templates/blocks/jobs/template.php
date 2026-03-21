<?php
    $uptitle	= get_field('jobs_uptitle');
    $title  = get_field('jobs_title');
?>
<section class="cbo-jobs">
    <div class="jobs-inner cbo-container container--padding container--nomargin">

        <?php if($uptitle): ?>
            <div class="jobs-uptitle cbo-uptitle slide-up">
                <?php echo esc_html($uptitle); ?>
            </div>
        <?php endif; ?>

        <?php if($title): ?>
            <div class="jobs-title cbo-title-2 slide-up">
                <?php echo wp_kses_post($title); ?>
            </div>
        <?php endif; ?>

        <div class="metiers-list">
            <?php
                $args = array(
                    'taxonomy' => 'event_type',
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'child_of'   => 53
                );
                $cats = get_categories($args);
                foreach($cats as $cat) {
                    set_query_var('cat', $cat);
                    get_part('templates/parts/blocjob/template');
                }
            ?>
        </div>
    </div>
</section>