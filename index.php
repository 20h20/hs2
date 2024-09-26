<?php
	get_header();
    $herotitle	= get_field('titre_de_la_page');
    $herochapo	= get_field('court_texte');
    $herobtxt	= get_field('home_herobtlibelle');
    $herobturl	= get_field('home_herobturl');
    $video_surtitre	= get_field('video_surtitre');
    $video_title	= get_field('video_title');
    $video	= get_field('video_file');
    $picture	= get_field('video_picture');
    $event_txt	= get_field('event_txt');
?>
	<div class="page-home">
        <section class="cbo-entryhome">
            <div class="entryhome-inner">
                <div class="cbo-picture-cover">
                    <img
                        decoding="async"
                        src="<?php bloginfo('template_directory'); ?>/library/images/home-hero.webp"
                        alt="HS2, centre de formation en cybersécurité" sizes="100vw"
                        loading="lazy"
                        width="2000" height="700"
                        itemprop="logo"
                    >
                </div>
                <div class="entryhome-content">
                    <h1 class="entryhome-title" data-aos="fade-up">
                        <?php echo $herotitle ?>
                    </h1>
                    <span class="entryhome-text" data-aos="fade-up">
                        <?php echo $herochapo ?>
                    </span>
                    <a class="hs-button button-white" href="<?php echo $herobturl ?>" data-aos="fade-up">
                        <?php echo $herobtxt ?> <i class="icon icon--right-arrow"></i>
                    </a>
                    <div class="entryhome-scroll"><a href="#scroll-hero"></a></div>
                </div>
            </div>
        </section>

        <section id="scroll-hero" class="hs-grey-section hs-section cbo-calendar">
            <h2 class="hs-main-title" data-aos="fade-up">
                <small>Nos prochaines</small>Formations
            </h2>
            <div class="container">
                <?php echo do_shortcode('[add_eventon_list number_of_months="3" hide_so="yes" hide_past="yes"]'); ?>
            </div>
        </section>

        <section class="hs-white-section hs-section cbo-homevideo">
            <div class="container">
                <h2 class="hs-main-title" data-aos="fade-up">
                    <small><?php echo $video_surtitre ?></small>
                    <?php echo $video_title ?>
                </h2>
                <div class="video-player cbo-picture-cover" data-aos="fade-up">
                    <img
                        decoding="async"
                        src="<?php echo $picture['sizes']['xlarge']; ?>"
                        srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
                        alt="<?php echo $picture['alt']; ?>" sizes="100vw"
                        loading="lazy"
                        width="1000" height="1000"
                    >
                    <i class="icon icon--player"></i>
                    <video controls preload="none">
                        <source loading="lazy" type="video/mp4" src="<?php echo $video['url'] ?>">
                    </video>
                </div>
            </div>
        </section>

        <section class="hs-blue-section hs-section cbo-homecategories">
            <div class="container">
                <h2 class="hs-main-title" data-aos="fade-up">
                    <small>Nos formations</small>par catégories
                </h2>
                <div class="categories-list">
                    <?php
                        if( have_rows('les_types_de_formation') ):
                        while( have_rows('les_types_de_formation') ): the_row();
                    ?>
                        <a class="list-el" href="<?php the_sub_field('lien_de_la_categorie'); ?>" data-aos="fade-up">
                            <span class="el-inner">
                                <span class="el-picture cbo-picture-contain">
                                    <img
                                        decoding="async"
                                        src="<?php the_sub_field('pictogramme'); ?>"
                                        alt="Formations HS2" sizes="100vw"
                                        loading="lazy"
                                        width="89" height="97"
                                    >
                                </span>
                                <h3 class="el-title">
                                    <?php the_sub_field('titre_de_la_categorie'); ?>
                                </h3>
                                <p>
                                    <?php the_sub_field('court_descriptif'); ?>
                                </p>
                                <span class="el-border" style="background:<?php the_sub_field('color'); ?>"></span>
                            </span>
                        </a>
                    <?php
                        endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </section>

        <section class="hs-grey-section hs-section">
            <div class="container">
                <h2 class="hs-main-title" data-aos="fade-up">
                    <small>Nos formations</small>
                    par métier
                </h2>

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
                        <a <?php post_class('list-el'); ?> href="<?php echo get_category_link( $cat->term_id ) ?>" data-aos="fade-up">
                            <span class="el-inner">
                                <h3 class="el-title">
                                    <?php echo $cat->name; ?>
                                </h3>
                            </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="hs-white-section hs-section cbo-homevent">
            <div class="container">
                <div class="listing-events">
                    <div class="homevent-intro" data-aos="fade-up">
                        <h2 class="hs-main-title">
                            <small>Les événements</small>HS2
                        </h2>
                        <?php echo $event_txt ?>
                        <a class="hs-button button-center" href="<?php echo home_url(); ?>/category/evenement" data-aos="fade-up">
                            Calendrier des événements <i class="icon icon--right-arrow"></i>
                        </a>
                    </div>
                    <?php
                        $current_page = get_query_var('paged');
                        $current_page = max(1, $current_page);
                        $per_page = 8;
                        $args = array(
                            'post_type' => 'post',
                            'meta_key' => 'event_start',
                            'meta_value' => date('Ymd'),
                            'meta_compare' => '>=',
                            'posts_per_page' => $per_page,
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'paged' => $current_page,
                        );
                        $query = new WP_Query($args);

                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part('templates/content/content', 'event');
                            }
                            if ($query->max_num_pages > 1) {
                                page_navi('', '', $query);
                            }
                        } else {
                            echo '<p>Aucun événement à venir.</p>';
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
    </div>
<?php
	get_footer();
?>