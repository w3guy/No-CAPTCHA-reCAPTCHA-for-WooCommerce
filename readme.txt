=== No CAPTCHA reCAPTCHA for WooCommerce ===
Contributors: Collizo4sky
Donate link: https://flattr.com/submit/auto?user_id=tech4sky&url=http%3A%2F%2Fw3guy.com
Tags: woocommerce, form, security, login, registration, comments, spam, login, registration, captcha, recaptcha, spammers, bot, security, bot, bots
Requires at least: 4.0
Tested up to: 4.4.2
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Protect WooCommerce login, registration and password reset form against spam using Google's No CAPTCHA reCAPTCHA.

== Description ==

A simple plugin for adding the new No CAPTCHA reCAPTCHA to WooCommerce login, registration and password reset form to protect against spam.

### Features
*   Option to activate CAPTCHA in WooCommerce login, registration and password reset form page.
*   Choose a theme for the CAPTCHA.
*   Auto-detects the user's language

**Note:** Multiple instance of reCAPTCHA can not appear in the same page i.e only a single reCAPTCHA can exist per web page.
As a result, if you activate the CAPTCHA in both login and registration form, in WooCommerce checkout and My Account page, the CAPTCHA will appear only
in the login form.

### Plugins you will like
* **[ProfilePress](https://wordpress.org/plugins/ppress/)**: A shortcode based WordPress form builder that makes building custom login, registration and password reset forms stupidly simple. [More info here](http://profilepress.net)
* **[OmniPay](https://omnipay.io)**: OmniPay is a payment gateway extension for WooCommerce and Easy Digital Downloads that bundles several payment providers such as Stripe, 2checkout, PayPal, Braintree, WePay, Authorize.Net together thus saving you money.
You get over seven(7) payment extensions for the price of one saving you over 90% of cost.
* **[Better WePay Payment Gateway for WooCommerce](https://omnipay.io/downloads/better-wepay-payment-gateway-for-woocommerce/)**: allows your WooCommerce powered store to accept credit card and bank account payment from shoppers via WePay.


== Installation ==

Installing No CAPTCHA reCAPTCHA is just like any other WordPress plugin.
Navigate to your WordPress “Plugins” page, inside of your WordPress dashboard, and follow these instructions:

1. In the search field enter **No Captcha Recaptcha for WooCommerce**. Click "Search Plugins", or hit Enter.
1. Select **No Captcha Recaptcha for WooCommerce** and click either "Details" or "Install Now".
1. Once installed, click "Activate".

== Frequently Asked Questions ==

= Why isn't CAPTCHA showing in both WooCommerce login and registration form? =

Multiple instance of reCAPTCHA can not appear in the same page i.e only a single reCAPTCHA can exist per web page. That's how reCAPTCHA was programmed.

If you activate the CAPTCHA in both login and registration form, in WooCommerce checkout and My Account page, the CAPTCHA will appear only
in the login form.

Any question? post it in the support forum.

== Screenshots ==

1. Add your reCAPTCHA keys.
2. Select where to activate.
3. Plugin general settings.
4. CAPTCHA in WooCommerce registration form
5. CAPTCHA in WooCommerce login form

== Changelog ==

= 1.2 =
* Fix compatibility with "No CAPTCHA reCAPTCHA plugin" (https://wordpress.org/plugins/no-captcha-recaptcha/)

= 1.1 =
* Added captcha to WooCommerce password reset form.


= 1.0.4 =
* Fix error where Captcha could be bypassed by disabling Javascript

= 1.0.3 =
* Fixes call to undefine method
* fixes header already sent error when adding recaptcha keys

= 1.0.2 =
* Bug fixes and tweaks

= 1.0.1 =
* Removed output buffering
* No XSS security vulnerability. plugin safe

= 1.0 =
* stable version

= 0.9 =
* Initial commit