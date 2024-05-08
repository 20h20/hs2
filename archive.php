<?php
	get_header();
?>
	<?php if(in_category(9)){ ?>
		<?php include 'templates/template-archive-presse.php'; ?>
	<?php } ?>
    <?php if(in_category(10)){ ?>
		<?php include 'templates/template-archive-event.php'; ?>
	<?php } ?>
<?php
	get_footer();
?>