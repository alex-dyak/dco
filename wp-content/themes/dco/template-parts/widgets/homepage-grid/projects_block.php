<div class="projectsSliderWrap gridItem">
    <div class="projectsSliderWrap-inner">
        <div class="projectsSlider js-projectsSlider">

	        <?php if ( get_sub_field( 'project_pretitle' ) ) : ?>
                <?php $pre_title = get_sub_field( 'project_pretitle' ); ?>
	        <?php endif; ?>

            <?php if ( have_rows( 'project' ) ): ?>
                <?php while ( have_rows( 'project' ) ) : the_row();
                    if ( get_sub_field( 'project_background_color' ) ) {
                        $background_color = get_sub_field( 'project_background_color' );
                        $title_color      = get_sub_field( 'project_title_color' );
                        $body_color       = get_sub_field( 'project_body_color' );
                    } else {
                        $background_color = '';
                        $title_color      = '';
                        $body_color       = '';
                    }
                    ?>

			<div class="project">
				<?php $image = get_sub_field( 'project_image' );
				if ( ! empty( $image ) && is_int( $image ) ) : ?>
					<div class="project-image">
                        <img src="<?php echo wp_get_attachment_image_url( $image, 'homepage_grid_slider_project' ) ?>" alt="<?php the_sub_field( 'project_title' ); ?>">
					</div>
					<?php else: ?>
					<div class="project-image-placeholder">
						<img src="http://via.placeholder.com/464x464">
					</div>
				<?php endif; ?>

                        <?php if ( get_sub_field( 'project_title' ) && get_sub_field( 'project_body' ) ): ?>
                            <div class="project-body"
                                 style="background-color: <?php echo $background_color; ?>">
	                            <?php if ( $pre_title ) : ?>
                                    <span class="project-body-pretitle"><?php echo strtoupper( $pre_title ); ?></span>
	                            <?php endif; ?>

                                <?php if ( get_sub_field( 'project_title' ) ) : ?>
                                    <h2 class="project-body-title" style=" color: <?php echo $title_color; ?>"><?php the_sub_field( 'project_title' ); ?></h2>
                                <?php endif; ?>

                                <?php if ( get_sub_field( 'project_body' ) ) : ?>
                                    <div class="project-body-description" style=" color: <?php echo $body_color; ?>"><?php the_sub_field( 'project_body' ); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</div>
