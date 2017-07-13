<div class="clientPage-body">

	<?php
	$terms                       = get_terms( 'clients-category' );
	$clients_category_terms_name = array();

	foreach ( $terms as $term ) {
		$clients_category_terms_name[] = $term->slug;
	}
	$rand_key      = array_rand( $clients_category_terms_name );
	$rand_category = $clients_category_terms_name[ $rand_key ];
	$class         = '';

	if ( $terms ) : ?>
		<div class="clientPage-body-filter js-stickyFilter">
			<ul id="category-list" class="clientFilter js-filter">
				<li class="is-active"><a href="#" value="all"><?php _e( 'All', 'dco' ); ?></a>
				</li>
				<?php foreach ( $terms as $term ) : ?>
					<li class="<?php echo $class; ?>">
						<a href="#" class="item-link"
						   value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php
	$terms = get_terms( 'business-direction' );

	$busines_direction_terms_name = array();

	foreach ( $terms as $term ) {
		$busines_direction_terms_name[] = $term->slug;
	}
	$rand_key      = array_rand( $busines_direction_terms_name );
	$rand_category = $busines_direction_terms_name[ $rand_key ];
	$class         = '';

	if ( $terms ) : ?>
		<div class="clientPage-body-content">
			<ul class="clientList js-filterList">
				<?php foreach ( $terms as $term ) :
					if ( $term->slug == $rand_category ) {
						$class = 'is-open';
					} else {
						$class = '';
					}
					?>
					<li class="<?php echo $class; ?>">
						<strong><i class="fa fa-chevron-right"
						           aria-hidden="true"></i><?php echo $term->name; ?>
						</strong>
						<ol class="clientItemList"
						    style="<?php if( $class ) echo "display: block"; ?>">
							<?php
							// Get Business direction items.
							$args  = array(
								'numberposts'        => - 1,
								'business-direction' => $term->slug,
								'orderby'            => 'name',
								'order'              => 'ASC',
								'post_type'          => 'client',
							);
							$posts = get_posts( $args );

							foreach ( $posts as $post ) {
								setup_postdata( $post );
								$term_list  = wp_get_post_terms( $post->ID,
									'clients-category' );
								$terms_name = array();
								foreach ( $term_list as $term ) {
									$terms_name[] = $term->slug;
								}
								if ( in_array( $rand_category, $terms_name ) ) {
									$class = 'is-active';
								} else {
									$class = '';
								}
								$data_category = 'all, ' . implode( ", ", $terms_name );
								?>
								<li>
									<?php if( ! empty( get_field( 'slider', $post->ID ) ) ||
									          ! empty( get_field( 'title', $post->ID ) ) ||
									          ! empty( get_field( 'text_first_column', $post->ID ) ) ||
									          ! empty( get_field( 'text_second_column', $post->ID ) ) ||
									          ! empty( get_field( 'text_third_column', $post->ID ) ) ) : ?>
									<a href="#client-popup-<?php echo $post->ID; ?>" class="client-item <?php echo $class; ?> is-active js-popup"
									   data-category='<?php echo $data_category; ?>'><?php echo $post->post_title; ?></a>
									<?php else : ?>
										<a class="client-item <?php echo $class; ?> is-active"
										   data-category='<?php echo $data_category; ?>'><?php echo $post->post_title; ?></a>
									<?php endif; ?>

									<!-- Clients Lightbox -->
									<div id="client-popup-<?php echo $post->ID; ?>" class="clientPopup mfp-hide">
                                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
										<?php
										// Slider speed value. Could be changed from admin panel.
										$speed = get_field( 'slider_speed', $post->ID ) ? get_field( 'slider_speed', $post->ID ) : 6000;
										?>

										<div class="clientPopup"> <!-- Slider -->
											<?php $images = get_field( 'slider', $post->ID );
											if ( $images ): ?>
												<div class="clientPopup-slider">
													<div class="clientSlider js-clientSlider">
														<?php foreach ( $images as $image ): ?>
															<div>
																<img src="<?php echo $image['sizes']['client_image']; ?>"
																     alt="<?php echo $image['alt']; ?>"/>
															</div>
														<?php endforeach; ?>
													</div>
												</div>
											<?php endif; ?>

											<?php if ( get_field( 'title', $post->ID ) ): ?><!-- Title -->
												<div class="clientPopup-body">
													<?php if ( get_field( 'title', $post->ID ) ): ?>
														<h2 class="clientPopup-title"><?php echo the_field( 'title', $post->ID ); ?></h2>
													<?php endif; ?>
                                                        <div class="clientPopup-body-inner">
                                                            <?php if ( get_field( 'text_first_column', $post->ID ) ): ?><!-- Text 3 column -->
                                                                <div class="clientPopup-body-inner-column">
                                                                    <?php echo the_field( 'text_first_column', $post->ID ); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if ( get_field( 'text_second_column', $post->ID ) ): ?>
                                                                <div class="clientPopup-body-inner-column">
                                                                    <?php echo the_field( 'text_second_column', $post->ID ); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if ( get_field( 'text_third_column', $post->ID ) ): ?>
                                                                <div class="clientPopup-body-inner-column">
                                                                    <?php echo the_field( 'text_third_column', $post->ID ); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
												</div>
											<?php endif; ?>
										</div>
									</div><!-- END Clients Lightbox -->

								</li>
							<?php
							}
							wp_reset_postdata();
							?>
						</ol>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

</div>