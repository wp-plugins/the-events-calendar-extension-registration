<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.e-colori.com
 * @since      1.0.0
 *
 * @package    wp-event-registration
 * @subpackage wp-event-registration/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    wp-event-registration
 * @subpackage wp-event-registration/includes
 * @author     Tobias Fritz - www.e-colori.com
 */
class Event_Registration_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$options = array( 'name' => get_bloginfo( 'name' ), 'email' => get_bloginfo( 'admin_email' ), 'terms' => esc_url( home_url( '/terms' ) ),
					'email_txt' => __( 'If you withdraw from a training until 4 weeks before the start we have to charge a processing fee of 50,- €. After this period, the full course fee is payable plus the costs for accommodation, or you have to provide a replacement participant.', 'wpecr' ).'&nbsp;'.
					__( 'Enter your contact details here. Name, address, phone, email, url, etc.', 'wpecr' ),
					'currency' => '€', 'showbank' => '', 
					'bank_txt' => __( 'Your registration for a seminar or training is not mandatory until the seminar fee has been paid into our bank account (free seminars excluded).', 'wpecr' ), 
					'bank' => '', 'remittee' => '', 'iban' => '', 'bic' => '');

		update_option( 'wpecr_options', maybe_serialize( $options ) );

	}

}
