<?php
    $bgcolor	= get_field('categories_bgcolor');
    $uptitle	= get_field('categories_uptitle');
    $title	= get_field('categories_title');
?>
<section class="cbo-categories <?php echo ($bgcolor === 'blue') ? 'categories--blue' : ''; ?>">
    <div class="categories-inner cbo-container container--padding container--nomargin">

        <?php if($uptitle): ?>
            <div class="categories-uptitle cbo-uptitle slide-up">
                <?php echo esc_html($uptitle); ?>
            </div>
        <?php endif; ?>

        <?php if($title): ?>
            <div class="categories-title cbo-title-2 slide-up" itemprop="name">
                <?php echo wp_kses_post($title); ?>
            </div>
        <?php endif; ?>

        <div class="categories-list">
            <?php
                if( have_rows('categories_list') ):
                while( have_rows('categories_list') ): the_row();
                    get_part('templates/parts/category/template');
                endwhile;
                endif;
            ?>
        </div>
    </div>
</section>