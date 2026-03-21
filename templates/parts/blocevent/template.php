<?php
    global $post;
    $eventype	= get_field('type_devenement', $post->ID);
    $evenstart	= get_field('event_start', $post->ID);
?>
<article class="list-el" itemscope itemtype="https://schema.org/Event">
    <a class="el-inner slide-up" href="<?php the_permalink(); ?>" itemprop="url">
        <?php if($eventype){ ?>
            <span class="el-type" itemprop="eventAttendanceMode">
                <?php echo $eventype ?>
            </span>
        <?php } else{ ?>
            <span class="el-type" itemprop="eventAttendanceMode">
                Événements
            </span>
        <?php } ?>

        <span class="inner-content">
            <h3 class="content-title cbo-title-3 slide-up" itemprop="name">
                <?php the_title(); ?>
            </h3>
            <span class="content-date slide-up">
                <i class="icon icon--calendar" aria-hidden="true"></i>
                <time itemprop="startDate" datetime="<?php echo $evenstart ?>">
                    <?php echo $evenstart ?>
                </time>
            </span>
            <span class="content-text slide-up" itemprop="description">
                <?php the_excerpt(); ?>
            </span>
        </span>
    </a>
</article>