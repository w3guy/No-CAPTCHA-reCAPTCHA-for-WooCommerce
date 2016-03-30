<?php

/*
Plugin Name: No CAPTCHA reCAPTCHA for WooCommerce
Plugin URI: http://w3guy.com
Description: Add the No CAPTCHA reCAPTCHA to WooCommerce login and registration form
Version: 1.2
Author: Agbonghama Collins
Author URI: http://w3guy.com
License: GPL2
Text Domain: wc-no-captcha
Domain Path: /lang/
*/


require_once 'base-class.php';
require_once 'registration.php';
require_once 'login.php';
require_once 'lost-password.php';
require_once 'settings.php';


WC_Ncr_No_Captcha_Recaptcha::initialize();
WC_Ncr_Login_Captcha::initialize();
WC_Ncr_Registration_Captcha::initialize();
WC_Ncr_Lost_Password_Captcha::initialize();
WC_Ncr_Settings_Page::initialize();
