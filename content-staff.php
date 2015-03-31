<?php
?>
<!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
 <?php


$args = array (
  'role' => 'editor',
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
        $facebook = get_the_author_meta( 'facebook_profile', $staff->ID );
        $linkedin = get_the_author_meta( 'linkedin_profile', $staff->ID );
        $google = get_the_author_meta( 'google_profile', $staff->ID );
        $user_profile = get_the_author_meta( 'upload_image', $staff->ID );
        $user_title = get_the_author_meta( 'user_title', $staff->ID );
        ?>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?php echo $user_profile; ?>" class="img-responsive img-circle" alt="">
                    <h4><?php the_author_meta( 'display_name', $staff->ID ); ?></h4>
                    <p class="text-muted"><?php echo $user_title; ?></p>
                    <ul class="list-inline social-buttons">
                        <?php 

                        if ( !empty ($twitter) ) {
                            echo '<li><a href="'. $twitter . '"><i class="fa fa-twitter"></i></a>
                        </li>';
                        }
                        if ( !empty ($facebook) ) {
                            echo '<li><a href="'. $facebook . '"><i class="fa fa-facebook"></i></a>
                        </li>';
                        }
                        if ( !empty ($linkedin) ) {
                            echo '<li><a href="'. $linkedin . '"><i class="fa fa-linkedin"></i></a>
                        </li>';
                        }
                        if ( !empty ($google) ) {
                            echo '<li><a href="'. $google . '"><i class="fa fa-google-plus"></i></a>
                        </li>';
                        }

                        ?>
                    </ul>
                </div>
            </div>                     
   <?php } ?>
        </div> 
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

    <?php