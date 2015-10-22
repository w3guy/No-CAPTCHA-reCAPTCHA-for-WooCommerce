<?php

/**
 * Class WC_Ncr_Lost_Password_Captcha
 */
class WC_Ncr_Lost_Password_Captcha extends WC_Ncr_No_Captcha_Recaptcha {

	public static function initialize() {

		// initialize if lost_password is activated
		if ( isset( self::$plugin_options['captcha_wc_lost_password'] ) && self::$plugin_options['captcha_wc_lost_password'] == 'yes' ) {
			// add the captcha to the lost_password form
			// NB: do_action( 'woocommerce_lostpassword_form' ) is needed in theme form-lost-password page
			add_action( 'woocommerce_lostpassword_form', array( __CLASS__, 'display_captcha' ) );
			
			// authenticate the captcha answer
			add_filter( 'allow_password_reset', array( __CLASS__, 'validate_lost_password_captcha' ), 10, 2 );
		}
	}

	/**
	 * Verify the captcha answer
	 *
	 * @return WP_Error or boolean
	 */
	public static function validate_lost_password_captcha( $result, $user_id ) {
		if ( ! self::captcha_wc_verification() ) {
 		  	$result = new WP_Error( 'empty_captcha', self::$error_message );	 	
		}
		 
		return $result;
	}
}