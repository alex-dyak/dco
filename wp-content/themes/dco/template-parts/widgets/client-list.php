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
    <div class="clientPage-body-filter js-stickyFilter">
        <ul id="category-list" class="clientFilter js-filter">
            <li><a href="#" value="all"><?php _e( 'All', 'dco' ); ?></a></li>
            <?php foreach ( $terms as $term ) :
                if ( $term->slug == $rand_category ) {
                    $class = 'is-active';
                } else {
                    $class = '';
                }
                ?>
                <li>
                    <a href="#" class="item-link <?php echo $class; ?>" value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php
$terms = get_terms( 'business-direction' );
$i = 0;
if ( $terms ) : ?>
    <div class="clientPage-body-content">
        <ul class="clientList js-filterList">
            <?php foreach ( $terms as $term ) : ?>
                <li class="<?php echo ($i == 0 ? "is-open" : ''); ?>">
                    <strong><i class="fa fa-chevron-right" aria-hidden="true"></i><?php echo $term->name; ?></strong>
                    <ol class="clientItemList" style="<?php echo ($i == 0 ? "display: block" : ''); ?>">
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
                                $class = 'is-active';
                            } else {
                                $class = '';
                            }
                            $data_category = 'all, ' . implode(", ", $terms_name);
                            ?>
                            <li>
                                <a class="client-item <?php echo $class; ?>" href="#" data-category='<?php echo $data_category; ?>'><?php echo $post->post_title; ?></a>
                            </li>
                        <?php
                        }
                        wp_reset_postdata();
                        $i++;
                        ?>
                    </ol>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

</div>