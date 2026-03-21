<?php
    $title  = get_field('contact_title');
    $content = get_field('contact_content');
    $addcontacts    = get_field('contact_active');
    $adresse    = get_field('contact_address');
    $tel    = get_field('contact_phone');
?>

<section class="cbo-contact">
    <div class="contact-inner cbo-container container--nomargin container--padding">

        <div class="contact-content">
            <?php if($title): ?>
                <div class="contact-title cbo-title-1 slide-up">
                    <?php echo wp_kses_post($title); ?>
                </div>
            <?php endif; ?>

            <?php if($content): ?>
                <div class="contact-chapo cbo-cms slide-up">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>

            <?php if ($addcontacts == 1): ?>
                <div class="contact-list">
                    <div class="list-el">
                        <div class="el-inner slide-up">
                            <span class="el-picture cbo-picture-contain">
                                <img
                                    decoding="async"
                                    src="<?php bloginfo('template_directory'); ?>/library/images/picto-iso-mail.png"
                                    alt="" sizes="100vw"
                                    loading="lazy"
                                    width="73" height="72"
                                >
                            </span>
                            <div class="inner-content">
                                <div class="cbo-title-4 el-title">
                                    Nous écrire
                                </div>
                                <div class="el-content cbo-cms">
                                    <?php echo wp_kses_post($adresse); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="list-el">
                        <div class="el-inner slide-up">
                            <span class="el-picture cbo-picture-contain">
                                <img
                                    decoding="async"
                                    src="<?php bloginfo('template_directory'); ?>/library/images/picto-iso-tel.png"
                                    alt="" sizes="100vw"
                                    loading="lazy"
                                    width="73" height="72"
                                >
                            </span>
                            <div class="inner-content">
                                <div class="cbo-title-4 el-title">
                                    Nous suivre
                                </div>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/HS2formation/" target="_blank" rel="noopener" aria-label="Suivez HS2 Formation sur Facebook (ouvre un nouvel onglet)">
                                            <i class="icon icon--facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/HS2formation" target="_blank" rel="noopener" aria-label="Suivez HS2 Formation sur Twitter (ouvre un nouvel onglet)">
                                            <i class="icon icon--twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/hs2formation/" target="_blank" rel="noopener" aria-label="Suivez HS2 Formation sur Linkedin (ouvre un nouvel onglet)">
                                            <i class="icon icon--linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="list-el">
                        <div class="el-inner slide-up">
                            <span class="el-picture cbo-picture-contain">
                                <img
                                    decoding="async"
                                    src="<?php bloginfo('template_directory'); ?>/library/images/picto-iso-contact.png"
                                    alt="" sizes="100vw"
                                    loading="lazy"
                                    width="73" height="72"
                                >
                            </span>
                            <div class="inner-content">
                                <div class="cbo-title-4 el-title">
                                    Nous appeler
                                </div>
                                <div class="el-content cbo-cms">
                                    <a href="tel:<?php echo esc_html($tel); ?>"><?php echo esc_html($tel); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="contact-form cbo-form slide-up">
            <?php
                $posts = get_field('contact_form');
                if( $posts ):
                    foreach( $posts as $p ):
                        $cf7_id= $p->ID;
                        echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
                    endforeach;
                endif;
            ?>
        </div>
    </div>
</section>