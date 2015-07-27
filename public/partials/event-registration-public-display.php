<?php
/**
 * Frontend view of the form to register for an event.
 *
 *
 * @package   wp-event-registration
 * @author    Tobias Fritz - www.e-colori.com
 * @license   GPL-2.0+
 * @link      http://www.e-colori.com
 * @copyright 2015 e-colori.com
 */

$posturl = get_permalink( );

if( !isset( $_POST['wpecr']['message'] ) ) {
	$_POST['wpecr']['message'] = __( 'I hereby register for the seminar.', 'wpecr' );
}
//print_r($_POST);

$data .= '
<div class="wpecr_registration_form">
	<form action="'.$posturl.'" method="post">
	'. wp_nonce_field( 'wpecr_form','_wpnonce_order_form' ) .'
		<p>
			<label for="firstname">'.__( 'First Name', 'wpecr' ).'*</label>
			<input type="text" name="wpecr[firstname]" id="firstname" value="'.$this->post_empty('firstname').'" required>
		</p>
		<p>
			<label for="lastname">'.__( 'Last Name', 'wpecr' ).'*</label>
			<input type="text" name="wpecr[lastname]" id="lastname" value="'.$this->post_empty('lastname').'" required>
		</p>
		<p>
			<label for="company">'.__( 'Company', 'wpecr' ).'</label>
			<input type="text" name="wpecr[company]" id="company" value="'.$this->post_empty('company').'">
		</p>		
		<p>
			<label for="email">'.__( 'Email', 'wpecr' ).'*</label>
			<input type="email" name="wpecr[email]" id="email" value="'.$this->post_empty('email').'" required>
		</p>
		<p>
			<label for="address">'.__( 'Address', 'wpecr' ).'</label>
			<input type="text" name="wpecr[address]" id="address" value="'.$this->post_empty('address').'" >
		</p>
		<p>
			<label for="postcode">'.__( 'Postcode', 'wpecr' ).'</label>
			<input type="text" name="wpecr[postcode]" id="postcode" value="'.$this->post_empty('postcode').'" >
		</p>
		<p>
			<label for="city">'.__( 'City', 'wpecr' ).'</label>
			<input type="text" name="wpecr[city]" id="city" value="'.$this->post_empty('city').'" >
		</p>
		<p>
			<label for="country">'.__( 'Country', 'wpecr' ).'</label>

			<select id="country" name="wpecr[country]" >';
				//get the choosen language country code
				$locale_lang = substr( get_locale(), 3, 2 );

				//get the countries by choosen language
				foreach( $this->all_countries( true, true ) as $country ):

				if($country['value']==$locale_lang && !isset($_POST['wpecr']['country'])) {
					$data .= '<option value="'.$country['value'].'" selected="selected">'.$country['name'].'</option>';
				}else if(isset($_POST['wpecr']['country']) && $country['value']==$_POST['wpecr']['country']) {
					$data .= '<option value="'.$country['value'].'" selected="selected">'.$country['name'].'</option>';
				}else{
					$data .= '<option value="'.$country['value'].'">'.$country['name'].'</option>';
				}
				endforeach;
				$data .= '	</select>
		</p>
		<p>
			<label for="phone">'.__( 'Phone', 'wpecr' ).'</label>
			<input type="tel" name="wpecr[phone]" id="phone" value="'.$this->post_empty('phone').'" > <span class="smaller">'.__( 'e.g. +49221998877', 'wpecr' ).'</span>
		</p>
		<br/>
		<p>
			'.__( 'Seminar', 'wpecr' ).': <strong>'. $this->post_empty('event') .'</strong> | '. $this->post_empty('date') .' | '. $this->currency_format( $this->post_empty('price') ) .'
		</p>		
		<p>
			<p>'.__( 'Your message', 'wpecr' ).'<p>
			<textarea name="wpecr[message]" id="message" rows="10" cols="40">'.$this->post_empty('message').'</textarea>
		</p>		
		<p>
			<input type="checkbox" name="wpecr[conditions]" id="conditions" value="'.$this->post_empty('conditions').'" required>
			<label for="conditions" class="label_checkbox">'.__( 'I accept the', 'wpecr' ).' <a href="'.$terms_url.'" target="_blank"> '.__( 'terms and conditions', 'wpecr' ).'</a>*</label>	
		</p>
		';
		
		//get the choosen language
		$language = substr( get_locale(), 0, 2 );

$data .= '<input type="hidden" name="wpecr[language]" id="language" value="'.$language.'">
		  <input type="hidden" name="wpecr[event_ID]" id="event_ID" value="'. $this->post_empty('event_ID') .'">
		  <input type="hidden" name="wpecr[event]" id="event" value="'. $this->post_empty('event') .'">
		  <input type="hidden" name="wpecr[date]" id="date" value="'. $this->post_empty('date') .'">
		  <input type="hidden" name="wpecr[price]" id="price" value="'. $this->currency_format( $this->post_empty('price') ) .'">
		<br/>
		<button type="submit" name="action" value="order_send" class="wpecr_button">'.__( 'Register', 'wpecr' ).'</button>
	</form>
</div><!-- end .wpecr_registration_form -->';


?>