<?php
	$title  = get_sub_field('titre');
	$resume = get_sub_field('court_resume');
	$adresse    = get_sub_field('adresse_postale');
	$reseaux    = get_sub_field('reseaux_sociaux');
	$tel    = get_sub_field('contact_telephones');
?>
<section class="cbo-contact">
    <div class="contact-inner cbo-container container--large container--nomargin container--padding">
        <div class="contact-content">
            <?php if($title): ?>
                <h1 class="hs-main-title">
                    <?php echo $title ?>
               </h1>
            <?php endif; ?>

            <?php if($resume): ?>
                <div class="contact-chapo">
                    <?php echo $resume ?>
                </div>
            <?php endif; ?>

            <div class="contact-list">
                <div class="list-el">
                    <div class="el-inner">
                        <span class="el-picture cbo-picture-contain">
                            <img
                                decoding="async"
                                src="<?php bloginfo('template_directory'); ?>/library/images/picto-iso-mail.png"
                                alt="Contacter HS2" sizes="100vw"
                                loading="lazy"
                                width="73" height="72"
                            >
                        </span>
                        <div class="inner-content">
                            <div class="el-title">
                                Nous écrire
                            </div>
                            <div class="el-content hs-cms">
                                <?php echo $adresse ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-el">
                    <div class="el-inner">
                        <span class="el-picture cbo-picture-contain">
                            <img
                                decoding="async"
                                src="<?php bloginfo('template_directory'); ?>/library/images/picto-iso-tel.png"
                                alt="Contacter HS2" sizes="100vw"
                                loading="lazy"
                                width="73" height="72"
                            >
                        </span>
                        <div class="inner-content">
                            <div class="el-title">
                                Nous suivre
                            </div>
                            <ul>
                                <li><a href="https://www.facebook.com/HS2formation/" target="_blank"><i class="icon icon--facebook"></i></a></li>
                                <li><a href="https://twitter.com/HS2formation" target="_blank"><i class="icon icon--twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/hs2formation/" target="_blank"><i class="icon icon--linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="list-el">
                    <div class="el-inner">
                        <span class="el-picture cbo-picture-contain">
                            <img
                                decoding="async"
                                src="<?php bloginfo('template_directory'); ?>/library/images/picto-iso-contact.png"
                                alt="Contacter HS2" sizes="100vw"
                                loading="lazy"
                                width="73" height="72"
                            >
                        </span>
                        <div class="inner-content">
                            <div class="el-title">
                                Nous appeler
                            </div>
                            <div class="el-content">
                                <?php echo $tel ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <?php echo do_shortcode('[contact-form-7 id="582" title="Formulaire de la page contact"]'); ?>
        </div>
    </div>
</section>