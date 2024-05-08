<?php
	/* Template Name: Template listing par catégories */
	get_header();
?>
    <div class="page-listing-by-cat">
        <section class="cbo-hero">
            <div class="hero-inner container">
                <h1 class="hero-title hs-main-title" data-aos="fade-up">
                    Nos formations par catégories
                </h1>
            </div>
        </section>

        <section class="hs-grey-section hs-section">
            <div class="container">
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
    </div>
<?php
	get_footer();
?>