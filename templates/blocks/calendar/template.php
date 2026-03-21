<?php
    $color	= get_field('calendar_color');
    $title	= get_field('calendar_title');
    $content	= get_field('calendar_content');
    $shorcode	= get_field('calendar_shortcode');
?>
<section class="cbo-calendar <?php echo ($color === 'grey') ? 'calendar--grey' : ''; ?>">
    <div class="calendar-inner cbo-container <?php echo ($color === 'grey') ? 'container--padding container--nomargin' : ''; ?>">
        <?php if($title): ?>
            <div class="calendar-title cbo-title-2 slide-up">
                <?php echo wp_kses_post($title); ?>
            </div>
        <?php endif; ?>

        <?php if($content): ?>
            <div class="calendar-chapo cbo-cms slide-up">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

        <?php
            echo do_shortcode('['.$shorcode.']');
        ?>
    </div>
</section>