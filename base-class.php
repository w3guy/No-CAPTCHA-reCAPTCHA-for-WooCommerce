<?php


class WC_Ncr_No_Captcha_Recaptcha {

	/** @var string captcha site key */
	static private $site_key;

	/** @var string captcha secrete key */
	static private $secret_key;

	static private $theme;

	static private $language;

	static protected $error_message;

	static protected $plugin_options;

	public static function initialize() {

		self::$plugin_options = get_option( 'wc_ncr_options' );

		self::$site_key = self::$plugin_options['site_key'];

		self::$secret_key = self::$plugin_options['secrete_key'];

		self::$theme = self::$plugin_options['theme'];

		self::$language = self::$plugin_options['language'];

		self::$error_message = self::$plugin_options['error_message'];


		add_action( 'plugins_loaded', array( __CLASS__, 'load_plugin_textdomain' ) );

		// initialize if login is activated
		if ( ( isset( self::$plugin_options['captcha_wc_registration'] ) && self::$plugin_options['captcha_wc_registration'] == 'yes' ) || ( isset( self::$plugin_options['captcha_wc_login'] ) && self::$plugin_options['captcha_wc_login'] == 'yes' ) || ( isset( self::$plugin_options['captcha_wc_password_reset'] ) && self::$plugin_options['captcha_wc_password_reset'] == 'yes' ) ) {

			add_action( 'wp_head', array( __CLASS__, 'header_script' ) );
		}
	}

	public static function load_plugin_textdomain() {
		load_plugin_textdomain( 'wc-no-captcha', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	/** reCAPTCHA header script */
	public static function header_script() {

		$lang_option = self::$plugin_options['language'];

		// if language is empty (auto detected chosen) do nothing otherwise add the lang query to the reCAPTCHA script url
		$lang = "";
		if ( isset( $lang_option ) && ( ! empty( $lang_option ) ) ) {
			$lang = "?hl=$lang_option";
		}

		echo '<script src="https://www.google.com/recaptcha/api.js' . $lang . '" async defer></script>' . "\r\n";
	}


	/** Output the reCAPTCHA form field. */
	public static function display_captcha() {

		echo '<div class="g-recaptcha" data-sitekey="' . self::$site_key . '" data-theme="' . self::$theme . '"></div>';

		// Support for users that don't have JavaScript enabled
		// https://developers.google.com/recaptcha/docs/faq
		echo '
		<noscript>
		  <div style="width: 302px; height: 422px;">
		    <div style="width: 302px; height: 422px; position: relative;">
		      <div style="width: 302px; height: 422px; position: absolute;">
		        <iframe src="https://www.google.com/recaptcha/api/fallback?k=' . self::$site_key . '"
		                frameborder="0" scrolling="no"
		                style="width: 302px; height:422px; border-style: none;">
		        </iframe>
		      </div>
		      <div style="width: 300px; height: 60px; border-style: none;
		                  bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px;
		                  background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
		        <textarea id="g-recaptcha-response" name="g-recaptcha-response"
		                  class="g-recaptcha-response"
		                  style="width: 250px; height: 40px; border: 1px solid #c1c1c1;
		                         margin: 10px 25px; padding: 0px; resize: none;" >
		        </textarea>
		      </div>
		    </div>
		  </div>
		</noscript>';
	}

	/**
	 * Send a GET request to verify captcha challenge
	 *
	 * @return bool
	 */
	public static function captcha_wc_verification() {
		if ( ! isset( $_POST['g-recaptcha-response'] ) ) {
			return false;	
		}

		$response = esc_attr( $_POST['g-recaptcha-response'] );

		$remote_ip = $_SERVER["REMOTE_ADDR"];

		// make a GET request to the Google reCAPTCHA Server
		$request = wp_remote_get(
			'https://www.google.com/recaptcha/api/siteverify?secret=' . self::$secret_key . '&response=' . $response . '&remoteip=' . $remote_ip
		);

		// get the request response body
		$response_body = wp_remote_retrieve_body( $request );

		$result = json_decode( $response_body, true );

		return $result['success'];
	}


	public static function on_activation() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		check_admin_referer( "activate-plugin_{$plugin}" );

		$default_options = array(
			'captcha_wc_registration' => 'yes',
			'captcha_wc_comment'      => 'yes',
			'theme'                => 'light',
			'error_message'        => __('<strong>ERROR</strong>: Please fill in the reCAPTCHA form.', 'wc-no-captcha')
		);

		add_option( 'wc_ncr_options', $default_options );
	}

	public static function on_uninstall() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		delete_option( 'wc_ncr_options' );
	}
}
