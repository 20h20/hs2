<?php
	$eventype	= get_field('type_devenement');
?>
<a class="list-el" href="<?php the_permalink(); ?>" data-aos="fade-right">
	<span class="el-inner">
		<?php if ( get_field('type_devenement') ) { ?>
			<span class="el-type"><?php echo $eventype?></span>
		<?php } else{ ?>
			<span class="el-type">Événements</span>
		<?php } ?>
		<span class="inner-content">
			<h3 class="content-title">
				<?php the_title(); ?>
			</h3>
			<span class="content-date">
				<i class="icon icon--calendar"></i> <?php the_field('event_start'); ?>
			</span>
			<span class="content-text">
				<?php the_excerpt(); ?>
			</span>
		</span>
	</span>
</a>