<div class="clientPage-body">

<?php
$terms = get_terms( 'clients-category' );
$clients_category_terms_name = array();

foreach ( $terms as $term ) {
	$clients_category_terms_name[] = $term->slug;
}
$rand_key      = array_rand( $clients_category_terms_name );
$rand_category = $clients_category_terms_name[$rand_key];
$class = '';

if ( $terms ) : ?>
    <div class="clientPage-body-filter">
        <ul id="category-list" class="category-list">
            <li class="category-item"><a href="#" value="all"><?php _e( 'All', 'dco' ); ?></a></li>
            <?php foreach ( $terms as $term ) :
                if ( $term->slug == $rand_category ) {
                    $class = 'selected-category';
                } else {
                    $class = '';
                }
                ?>
                <li class="category-item">
                    <a href="#" class="item-link <?php echo $class; ?>" value="<?php echo $term->slug; ?>">
                        <?php echo $term->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php
$terms = get_terms( 'business-direction' );
if ( $terms ) : ?>
    <div class="clientPage-body-content">
        <ul class="business-direction-list">
            <?php foreach ( $terms as $term ) : ?>
                <li><?php echo $term->name; ?></li>
                <?php
                // Get Business direction items.
                $args = array(
                    'numberposts'        => - 1,
                    'business-direction' => $term->slug,
                    'orderby'            => 'date',
                    'order'              => 'ASC',
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
                    if ( in_array( $rand_category, $terms_name ) ) {
                        $class = 'selected-list';
                    } else {
                        $class = '';
                    }
                    $data_category = 'all, ' . implode(", ", $terms_name);
                    ?>
                    <a class="client-item <?php echo $class; ?>" href="#" data-category='<?php echo $data_category; ?>'>
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
    </div>
<?php endif; ?>

</div>