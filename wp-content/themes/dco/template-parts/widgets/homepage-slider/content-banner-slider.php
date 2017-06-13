<?php
/**
 * Homepage page slider template.
 */
?>

<?php
// Slider speed value. Could be changed from admin panel.
$speed = get_sub_field( 'slider_speed' ) ? get_sub_field( 'slider_speed' ) : 6000;
$title = get_sub_field( 'title' ) ? get_sub_field( 'title' ) : '';
?>

<?php if ( have_rows( 'slider_content' ) ): ?>
	<div class="homepage-slider-holder">
		<div class="homepage-slider js-homepage-slider" data-speed="<?php echo $speed; ?>">

			<?php while ( have_rows( 'slider_content' ) ) : the_row(); ?>
				<?php
				$background_color = get_sub_field( 'background_color' ) ? get_sub_field( 'background_color' ) : '';
				$link_url         = get_sub_field( 'link_url' ) ? get_sub_field( 'link_url' ) : '#';
				$image            = get_sub_field( 'image' );
				if ( ! empty ( $image ) ):
					$url = $image['url'];
					?>
					<div class="slider-item">
					<?php echo $title; ?>
					<img src="<?php echo $url; ?>">
					<?php if ( get_sub_field( 'title_extension' ) ) : ?>
						<div style="background-color: <?php echo $background_color; ?>">

							<p><?php the_sub_field( 'title_extension' ); ?></p>

							<?php if ( get_sub_field( 'teaser' ) ) : ?>
								<p><?php the_sub_field( 'teaser' ); ?></p>
							<?php endif; ?>

							<?php if ( get_sub_field( 'link_text' ) ) : ?>
								<p><a href="<?php $link_url; ?>"><?php the_sub_field( 'link_text' ); ?></a></p>
							<?php endif; ?>

						</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>

<?php endif; ?>