<?php

get_header();

?>
<?php $portfolio = bootstrap_bob_portfolio(); ?>
<?php if ( $portfolio->have_posts() ) : ?>

<section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            
            <div class="row">
            	<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
            	<?php $portfolio_url= get_post_meta( get_the_ID(), 'portfolio-url', true ); ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="<?php echo esc_url( $portfolio_url ); ?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <div class="img-responsive">
                        	<?php the_post_thumbnail(); ?>
                        </div>
                    </a>
                    <div class="portfolio-caption">
                        <h4><?php the_title(); ?></h4>
                    </div>
                </div> 
                <?php endwhile; ?>  
            </div>
            
        </div>
    </section>
<?php endif; 

$args = array (
  'role' => 'administrator',
  'order' => 'DESC',
  'fields' => array(
        'display_name',
        'ID'
    )
);
$user_query = new WP_User_Query( $args );
$users = $user_query->get_results();
    foreach ($users as $staff) {
        $twitter = get_the_author_meta( 'twitter_profile', $staff->ID );
        echo '<h3>' . $twitter . '</h3>';    
    }


get_footer();