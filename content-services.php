<?php
$options = get_option( 'bootstrap_bob_settings' );
    $settings = array_values($options);
    list( $lead_in, $intro_heading, $cta_button, $hero_image,
          $services_icon_1, $services_title_1, $services_content_1,
          $services_icon_2, $services_title_2, $services_content_2,
          $services_icon_3, $services_title_3, $services_content_3
    ) = $settings;

?>

<!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo __( 'Services' ); ?></h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?php echo esc_attr( $services_icon_1 ); ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?php echo esc_html( $services_title_1 ); ?></h4>
                    <p class="text-muted"><?php echo esc_html( $services_content_1 ); ?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?php echo esc_attr( $services_icon_2 ); ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?php echo esc_html( $services_title_2 ); ?></h4>
                    <p class="text-muted"><?php echo esc_html( $services_content_2 ); ?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?php echo esc_attr( $services_icon_3 ); ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?php echo esc_html( $services_title_3 ); ?></h4>
                    <p class="text-muted"><?php echo esc_html( $services_content_3 ); ?></p>
                </div>
            </div>
        </div>
    </section>