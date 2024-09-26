<?php	
	$surtitre	= get_sub_field('surtitre_de_la_section');
	$title  = get_sub_field('titre');
?>
<section class="cbo-jobs">
    <div class="jobs-inner cbo-container">
        <?php if( get_sub_field('titre') ): ?>
            <h2 class="hs-main-title" data-aos="fade-up">
                <small><?php echo $surtitre; ?></small>
                <?php echo $title; ?>
            </h2>
        <?php endif; ?>

        <div class="container">
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
                ?>
                    <a class="list-el" href="<?php echo get_category_link( $cat->term_id ) ?>" data-aos="fade-up">
                        <span class="el-inner">
                            <h3 class="el-title">
                                <?php echo $cat->name; ?>
                            </h3>
                        </span>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>