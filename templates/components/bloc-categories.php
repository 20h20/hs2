<?php
	$bgcolor	= get_sub_field('categories_bgcolor');
    $uptitle	= get_sub_field('categories_uptitle');
    $title	= get_sub_field('categories_title');
?>
<section class="cbo-categories <?php if($bgcolor == 'grey'): ?>hs-grey-section<?php endif; ?> <?php if($bgcolor == 'blue'): ?>hs-blue-section<?php endif; ?>">
    <div class="categories-inner cbo-container">

        <h2 class="categories-title hs-main-title" data-aos="fade-up">
            <?php if($uptitle): ?>
                <small>
                    <?php echo $uptitle; ?>
                </small>
            <?php endif; ?>

            <?php if($title): ?>
                <?php echo $title; ?>
            <?php endif; ?>
        </h2>

        <div class="categories-list">
            <?php
                if( have_rows('categories_list') ):
                while( have_rows('categories_list') ): the_row();
                $icon	= get_sub_field('icon');
                $title	= get_sub_field('title');
                $content	= get_sub_field('content');
                $link	= get_sub_field('link');
                $color	= get_sub_field('color');
            ?>
                <a class="list-el" href=" <?php echo $link; ?>" data-aos="fade-up">
                    <span class="el-inner">
                        <?php if($icon): ?>
                            <span class="el-picture cbo-picture-contain">
                                <img
                                    decoding="async"
                                    src="<?php echo $icon['sizes']['small']; ?>"
                                    srcset="<?php echo $icon['sizes']['small']; ?> 320w, <?php echo $icon['sizes']['medium']; ?> 768w, <?php echo $icon['sizes']['medium']; ?> 1024w"
                                    alt="<?php echo $icon['alt']; ?>" sizes="100vw"
                                    loading="lazy"
                                    width="89" height="97"
                                >
                            </span>
                        <?php endif; ?>

                        <?php if($title): ?>
                            <h3 class="el-title">
                                <?php echo $title; ?>
                            </h3>
                        <?php endif; ?>

                        <?php if($content): ?>
                            <p>
                                <?php echo $content; ?>
                            </p>
                        <?php endif; ?>

                        <span class="el-border" style="background:<?php echo $color; ?>"></span>
                    </span>
                </a>
            <?php
                endwhile;
                endif;
            ?>
        </div>
    </div>
</section>