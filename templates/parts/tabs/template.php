<?php
    $panels = [
        'objectifs'            => ['icon' => 'objectif',          'label' => 'Objectifs',           'sub' => 'objectif'],
        'liste_des_pre-requis' => ['icon' => 'checklist',         'label' => 'Pré-requis',          'sub' => 'pre-requis'],
        'methodes-pedagogique' => ['icon' => 'pedagogie',         'label' => 'Méthode pédagogique', 'sub' => 'methodes_pedagogique'],
        'public-vise'          => ['icon' => 'public',            'label' => 'Public visé',         'sub' => 'public_vise'],
        'certifications'       => ['icon' => 'certification',     'label' => 'Certification',       'sub' => 'certifications'],
        'liste_du_materiel'    => ['icon' => 'materiel',          'label' => 'Matériel',            'sub' => 'materiel'],
        'liste_bilan_qualite'  => ['icon' => 'evaluation-qualite','label' => 'Évaluation qualité',  'sub' => 'bilan_qualite'],
        'liste_recos'          => ['icon' => 'more',              'label' => 'Pour aller plus loin','sub' => 'recos'],
    ];
    $has_formateurs = have_rows('formateurs');
?>

<section id="scroll-savoir-single" class="cbo-tabs">
    <div class="tabs-inner cbo-container container--padding container--nomargin">
        <h2 class="tabs-title cbo-title-2 slide-up">
            Bon à savoir sur cette formation
        </h2>

        <div class="tabs-list">
            <?php
                $first = true;
                foreach ($panels as $key => $panel): 
                if (!have_rows($key)) continue;
            ?>
                <div class="list-tab <?php echo $first ? 'is-active' : ''; ?>" data-panel="<?php echo esc_attr($key); ?>">

                    <button class="tab-title cbo-title-4 slide-up" type="button" aria-expanded="<?php echo $first ? 'true' : 'false'; ?>">
                        <i class="icon icon--<?php echo esc_attr($panel['icon']); ?>"></i>
                        <?php echo esc_html($panel['label']); ?>
                    </button>

                    <div class="tab-content cbo-cms">
                        <ul>
                            <?php while (have_rows($key)): the_row(); ?>
                                <li><?php the_sub_field($panel['sub']); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php
                $first = false;
                endforeach;
            ?>

            <?php if ($has_formateurs): ?>
                <div class="list-tab slide-up" data-panel="formateurs">
                    <button class="tab-title cbo-title-4" type="button" aria-expanded="false">
                        <i class="icon icon--trainer"></i> Formateurs
                    </button>

                    <div class="tab-content cbo-cms">
                        <div class="content-trainer">
                            <?php while (have_rows('formateurs')): the_row();
                                $picture = get_sub_field('photo_du_formateur');
                                $name    = get_sub_field('nom_et_prenom_du_formateur');
                            ?>
                                <div class="trainer-el">
                                    <?php if($picture): ?>
                                        <div class="el-picture cbo-picture-cover">
                                            <img
                                                src="<?php echo esc_url($picture['sizes']['small']); ?>"
                                                srcset="<?php echo esc_url($picture['sizes']['small']); ?> 320w, 
                                                <?php echo esc_url($picture['sizes']['small']); ?> 768w, 
                                                <?php echo esc_url($picture['sizes']['small']); ?> 1024w"
                                                alt="<?php echo esc_attr($picture['alt']); ?>"
                                                sizes="(min-width: 1024px) 50vw, (min-width: 768px) 60vw, 100vw"
                                                width="120" height="100"
                                                loading="lazy"
                                                decoding="async"
                                            >
                                        </div>
                                    <?php else: ?>
                                        <div class="el-picture picture--none"></div>
                                    <?php endif; ?>

                                    <div class="el-name">
                                        <?php echo esc_html($name); ?>
                                    </div>
                                </div>
                            <?php
                                endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>