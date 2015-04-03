<?php

$bob_about = bootstrap_bob_about();
if ( $bob_about->have_posts() ) : 
$postcount = 1; ?>

<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo __( 'About' ); ?></h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <?php while ( $bob_about->have_posts() ) : $bob_about->the_post(); ?>
                            <?php $event_date = get_post_meta( get_the_ID(), 'event-date', true ); ?>
                            <?php $event_image = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) ); ?>
                            <li class=" <?php if (is_int($postcount/2)) { echo 'timeline-inverted'; } ?>" >
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="<?php echo esc_url( $event_image ); ?>" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?php echo esc_html( $event_date ); ?></h4>
                                        <h4 class="subheading"><?php the_title(); ?></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php $postcount++;
                            endwhile; ?>
                            <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4><?php echo __( 'Be Part' ); ?>
                                    <br><?php echo __( 'Of Our' ); ?>
                                    <br><?php echo __( 'Story!' ); ?></h4>
                            </div>
                        </li>
                        </ul>
                    </div>
                 
            </div>
        </div>
    </section>
<?php endif;