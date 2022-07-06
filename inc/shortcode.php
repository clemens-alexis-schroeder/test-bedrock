<?php
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/


function address_shortcode() {
    ob_start();
    echo the_field('global_adressblock','option');
    $ReturnString = ob_get_contents();
    ob_end_clean();
    return $ReturnString;
}

function phone_number_shortcode() {
    ob_start();
    echo the_field('global_phone_number','option');
    $ReturnString = ob_get_contents();
    ob_end_clean();
    return $ReturnString;
}
function email_shortcode() {
    ob_start();
    ?><a href="mailto:<?php echo the_field('global_email','option');?>"><?php echo the_field('global_email','option');?></a><?php
    $ReturnString = ob_get_contents();
    ob_end_clean();
    return $ReturnString;
}
add_shortcode( 'telefonnummer', 'phone_number_shortcode' );
add_shortcode( 'email', 'email_shortcode' );
add_shortcode( 'adressblock', 'address_shortcode' );
