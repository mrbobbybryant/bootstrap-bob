<?php

	$clients = bootstrap_bob_clients();
	if ( $clients->have_posts() ) : ?>

	<!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
            	<?php while ( $clients->have_posts() ) : $clients->the_post(); ?>
            	<?php $client_logo = get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-responsive' )); ?>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <?php echo $client_logo; ?>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </aside>
<?php endif;    
