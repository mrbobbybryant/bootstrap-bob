<?php

$bob_about = bootstrap_bob_about(); ?>
<?php if ( $bob_about->have_posts() ) : 
$postcount = 0; ?>

<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <?php while ( $bob_about->have_posts() ) : $bob_about->the_post(); ?>
                <?php $event_date = get_post_meta( get_the_ID(), 'event-date', true ); ?>
                <?php $event_image = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) ); ?>
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li class=" <?php if (is_int($postcount/2)) { echo 'timeline-inverted'; } ?>" >
                                <div class="timeline-image">
                                    <div class="img-circle img-responsive">
                                        <img class="img-circle img-responsive" src="<?php echo $event_image; ?>" alt="">
                                    </div>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?php echo $event_date; ?></h4>
                                        <h4 class="subheading"><?php the_title(); ?></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php $postcount++;
                 endwhile; ?> 
            </div>
        </div>
    </section>
<?php endif;