<?php


?>

<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo __('Contact Us' ); ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo __('Lorem ipsum dolor sit amet consectetur.' ); ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <?php wp_nonce_field(basename( __FILE__ ),'bootstrap_bob_nonce'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo __( 'Your Name *' ); ?>" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="<?php echo __( 'Your Email *' ); ?>" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="<?php echo __( 'Your Phone *' ); ?>" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="<?php echo __( 'Your Message *' ); ?>" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <input id="xyq" type="hidden" name="<?php echo apply_filters( 'honeypot_name', 'date-submitted'); ?>" class="date-submitted" value="" />
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl"><?php echo __( 'Send Message' ); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

