<?php
$image           = get_sub_field( 'image' );
$author_of_quote = get_sub_field( 'author_of_quote' );
$quote_body      = get_sub_field( 'quote_body' );

$background_color = get_sub_field( 'background_color' );
$size             = 'full';
?>

<div class="imageQuote container">

	<?php if ( ! empty( $image ) && is_int( $image ) ) : ?>

        <div class="imageSmallModuleA-image">

            <img src="<?php echo wp_get_attachment_image_url( $image, $size ); ?>" alt="">

        </div>

	<?php endif; ?>

	<?php if ( get_sub_field( 'quote_body' ) ): ?>

        <div class="quote" style="background-color: <?php echo $background_color; ?>">

            <div class="quote-body">

				<?php the_sub_field( 'quote_body' ); ?>

            </div>

			<?php if ( get_sub_field( 'author_of_quote' ) ): ?>

                <div class="quoteAuthor">

					<?php the_sub_field( 'author_of_quote' ); ?>

                </div>

			<?php endif; ?>

        </div>

	<?php endif; ?>

</div>
