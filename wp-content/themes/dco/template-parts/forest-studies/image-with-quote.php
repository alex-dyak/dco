<?php
$image           = get_sub_field( 'image' );
$author_of_quote = get_sub_field( 'author_of_quote' );
$quote_body      = get_sub_field( 'quote_body' );

$background_color = get_sub_field( 'background_color' );
$size             = 'full';
?>

<div class="imageLargeModuleA imageQuote js-fullHeight fullHeight js-hasSticky">

	<?php if ( ! empty( $image ) && is_int( $image ) ) : ?>

        <div class="imageLargeModuleA-image">
            <div class="lazyload defaultFullHeightImage js-fullHeightDefault"
                 data-bgset="<?php echo wp_get_attachment_image_url($image, 'full_height_img_desktop_large'); ?> 1900w"
                 data-sizes="auto"></div>
        </div>

	<?php endif; ?>

	<?php if ( get_sub_field( 'quote_body' ) ): ?>

        <div class="imageLargeModuleA-quote imageQuote-quote">

            <div class="js-hasSticky-item imageLargeModuleA-quote-inner imageLargeModuleA-quote-inner--large quoteItem"
                 style="background: <?php echo $background_color; ?>">
                <div class="imageLargeModuleA-quote-body quoteItem-body">

                    <?php the_sub_field( 'quote_body' ); ?>

                </div>

                <?php if ( get_sub_field( 'author_of_quote' ) ): ?>

                    <div class="quoteItem-author">

                        <?php the_sub_field( 'author_of_quote' ); ?>

                    </div>

                <?php endif; ?>
            </div>
        </div>

	<?php endif; ?>

</div>
