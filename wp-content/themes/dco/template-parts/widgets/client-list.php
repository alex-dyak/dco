<?php
$terms = get_terms('clients-category');
if ( $terms ) : ?>
	<ul id="category-list" class="category-list">
		<a href="#"><li class="category-item" value="all"><?php _e( 'All', 'dco' ); ?></li></a>
		<?php foreach ( $terms as $term ) : ?>
			<a href="#">
				<li value="<?php echo $term->slug; ?>" class="category-item"><?php echo $term->name; ?></li>
			</a>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php
$terms = get_terms( 'business-direction' );
if ( $terms ) : ?>
	<ul class="business-direction-list">
		<?php foreach ( $terms as $term ) : ?>
			<li><?php echo $term->name; ?></li>
			<?php
			// Get Business direction items.
			$args = array(
				'numberposts'        => - 1,
				'business-direction' => $term->slug,
				'orderby'            => 'date',
				'order'              => 'DESC',
				'post_type'          => 'client',
			);
			$posts = get_posts( $args );

			foreach( $posts as $post ){
				setup_postdata( $post );
				$term_list = wp_get_post_terms( $post->ID, 'clients-category' );
				$terms_name = array();
				foreach ( $term_list as $term ) {
					$terms_name[] = $term->slug;
				}
				$data_category = 'all, ' . implode(", ", $terms_name);
				?>
				<a class="client-item" href="#" data-category='<?php echo $data_category; ?>'>
					<p>
						<?php echo $post->post_title; ?>
					</p>
				</a>
			<?php
			}
			wp_reset_postdata();
			?>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
