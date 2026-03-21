<?php
	$accordionactive	= get_field('formation_accordionactive');
	$programmehidden	= get_field('formation_programmehidden');
	$shareactive	= get_field('formation_sharedeactivate');
	$goodtoknowhidden	= get_field('formation_goodtoknowhidden');
	$subscribhidden	= get_field('formation_subscribehidden');
?>

<div class="cbo-summary">
	<input class="summary-input" type="checkbox" id="checkbox">
	<label class="summary-label" for="checkbox">
		Table des matières <i class="icon icon--bottom-arrow"></i>
	</label>

	<ul class="summary-options" data-title="Table des matières">
		<?php if($programmehidden == 0): ?>
			<li>
				<a href="#scroll-programme-single" target="_blank" aria-label="Scroller jusqu'au programme du cours">
					<i class="icon icon--studient-hat" aria-hidden="true"></i> Programme du cours
				</a>
			</li>
		<?php endif; ?>

		<?php if($subscribhidden == 0): ?>
			<li>
				<a href="#scroll-contact-single" aria-label="Scroller pour s'inscrire à la formation">
					<i class="icon icon--form" aria-hidden="true"></i> S'inscrire
				</a>
			</li>
		<?php
			endif;
		?>

		<?php if($goodtoknowhidden == 0): ?>
			<li>
				<a href="#scroll-savoir-single" target="_blank" aria-label="Scroller pour en savoir plus sur la formation">
					<i class="icon icon--light" aria-hidden="true"></i> Bon à savoir
				</a>
			</li>
		<?php endif; ?>

		<li>
			<a href="<?php the_field('fiche_de_la_formation'); ?>" target="_blank" aria-label="Télécharger la formation">
				<i class="icon icon--download" aria-hidden="true"></i> Télécharger la fiche
			</a>
		</li>

		<?php if($shareactive == 0): ?>
			<li>
				<a href="#" id="linkedin-share-button" class="social-icon" target="_blank" aria-label="Partager la formation sur Linkedin">
					<i class="icon icon--linkedin" aria-hidden="true"></i> Linkedin
				</a>
			</li>
			<li>
				<a href="#" id="twitter-share-button" class="social-icon" target="_blank" aria-label="Partager la formation sur Twitter">
					<i class="icon icon--twitter" aria-hidden="true"></i> Twitter
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>