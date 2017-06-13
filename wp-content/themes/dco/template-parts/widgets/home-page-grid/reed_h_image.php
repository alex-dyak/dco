<div class="reedHimage container">
	<?php $image = get_sub_field( 'reed_h_image' );
	if ( ! empty ( $image ) ):
	$url = $image['url'];
	?>
	<div class="reedHimage-image">
		<img src="<?php echo $url; ?>">
	</div>
<?php endif; ?>