 <?php
$options = get_option( 'bootstrap_bob_settings' );
$lead_in = $options['bootstrap_bob_text_field_0'];
$intro_heading = $options['bootstrap_bob_text_field_1'];
$cta_button = $options['bootstrap_bob_text_field_2'];
 ?>

<!-- Header -->
    <header class="header-bg">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><?php echo $lead_in; ?></div>
                <div class="intro-heading"><?php echo $intro_heading; ?></div>
                <a href="#services" class="page-scroll btn btn-xl"><?php echo $cta_button; ?></a>
            </div>
        </div>
    </header>