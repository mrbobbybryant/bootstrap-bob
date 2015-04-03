<?php

$post_counter = 0;
$modal = bootstrap_bob_portfolio();
if ( $modal->have_posts() ) : 

?>

<!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
    <?php while ( $modal->have_posts() ) : $modal->the_post(); ?>
    <?php $post_counter++; // increment the counter for each post ?>
    <?php $portfolio_subtitle = get_post_meta( get_the_ID(), 'portfolio-subtitle', true ); ?>
    <?php $portfolio_image = get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-responsive img-centered' )); ?>
    <!-- Portfolio Modal Single -->
    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $post_counter; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php the_title(); ?></h2>
                            <p class="item-intro text-muted"><?php echo esc_html( $portfolio_subtitle ); ?></p>
                            <?php echo $portfolio_image; ?>
                            <p><?php the_content(); ?></p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo __( 'Close Project' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endwhile; ?>
    <?php endif;

    