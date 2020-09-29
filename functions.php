<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
 * Change the default country on the checkout for non-existing users only
 */
//add_filter( 'default_checkout_billing_country', 'tlfunction_ch_def_checkout_country', 10, 1 );

//function tlfunction_ch_def_checkout_country( $country ) {
    // If the user already exists, don't override country
//    if ( WC()->customer->get_is_paying_customer() ) {
//        return $country;
//    }

//    return 'ES'; // Override default to Germany (an example)
//}
