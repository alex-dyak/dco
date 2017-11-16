<?php
$forest_image_page_link = get_sub_field( 'forest_image_study_page_link' );
if ( ! $forest_image_page_link ) {
	$forest_image_page_link = '';
}
?>
<div class="forestImage gridItem">
    <a href="<?php echo $forest_image_page_link; ?>">
        <div class="forestImage-inner">
            <?php $image = get_sub_field( 'forest_image' );
            if ( ! empty( $image ) && is_int( $image ) ) : ?>
                <div class="forestImage-image">
                    <img src="<?php echo wp_get_attachment_image_url( $image, 'homepage_grid_small_image' )?>" alt="<?php the_sub_field( 'forest_title' ); ?>">
                </div>
            <?php endif; ?>

            <?php if ( get_sub_field( 'forest_title' ) && get_sub_field( 'forest_body' ) ): ?>
                <?php
                $background_image = get_sub_field( 'forest_background_image' );
                if( ! empty( $background_image  && is_int( $background_image ) ) ) {
                    $back_img = wp_get_attachment_image_url( $background_image, 'full' );
                } else {
                    $back_img = '';
                } ?>
                <div class="forestImage-body" style="background-image: url(<?php echo $back_img; ?>)">
	                <?php if ( get_sub_field( 'forest_pretitle' ) ): ?>
                        <span class="forestImage-body-pretitle"><?php echo strtoupper( get_sub_field( 'forest_pretitle' ) ); ?></span>
	                <?php endif; ?>

                    <?php if ( get_sub_field( 'forest_title' ) ): ?>
                        <h2 class="forestImage-body-title"><?php the_sub_field( 'forest_title' ); ?></h2>
                    <?php endif; ?>

                    <?php if ( get_sub_field( 'forest_body' ) ): ?>
                        <div class="forestImage-body-description"><?php the_sub_field( 'forest_body' ); ?></div>
                    <?php endif; ?>

                    <?php if ( get_sub_field( 'forest_social_icon' ) || get_sub_field( 'forest_link_text' ) || get_sub_field( 'forest_social_link' ) ): ?>
                        <div class="forestImage-body-social">
                            <a href="<?php the_sub_field( 'forest_social_link' ); ?>" target="_blank">
                                <i class="fa fa-<?php the_sub_field( 'forest_social_icon' ); ?>" aria-hidden="true"></i>
                                <?php the_sub_field( 'forest_link_text' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </a>
</div>