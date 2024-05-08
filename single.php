<?php
	get_header(); 
?>
	<?php if(in_category(9)){ ?>
		<?php include 'templates/template-single-presse.php'; ?>
	<?php } ?>
	<?php if(in_category('evenement')){ ?>
		<?php include 'templates/template-single-event.php'; ?>
	<?php } ?>
<?php
	get_footer();
?>