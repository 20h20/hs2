<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <div class="hs-press-single-page">
        <section class="cbo-hero">
            <div class="hero-inner container">
                <h1 class="hero-title hs-main-title" data-aos="fade-up">
                    <?php the_title(); ?>
                </h1>
            </div>
        </section>

        <?php
            if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
            <div class="container">
                <section class="hs-section">
                    <div class="hs-singlepresse-bloc">
                        <div class="hs-singlepresse-bloc_img">
                            <img
                                decoding="async"
                                src="<?php bloginfo('template_directory'); ?>/library/images/picto-single-revue-de-presse.png"
                                alt="Revue de presse HS2" sizes="100vw"
                                loading="lazy"
                                width="151" height="201"
                            >
                        </div>
                        <div class="hs-singlepresse-bloc_content hs-cms">
                            <?php the_content(); ?>
                            <?php if( get_field('ajouter_un_document') ): ?>
                                <a class="hs-button button-center" href="<?php the_field('ajouter_un_document'); ?>" target="_blank">
                                    Télécharger le document <i class="icon icon--right-arrow"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        <?php
            endwhile;
            endif;
        ?>
    </div>
</article>