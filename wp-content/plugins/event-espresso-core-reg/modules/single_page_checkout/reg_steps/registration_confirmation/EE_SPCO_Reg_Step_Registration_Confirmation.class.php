<?php if ( ! defined('EVENT_ESPRESSO_VERSION')) { exit('No direct script access allowed'); }
 /**
 *
 * Class EE_SPCO_Reg_Step_Registration_Confirmation
 *
 * Description
 *
 * @package 			Event Espresso
 * @subpackage 	core
 * @author 				Brent Christensen
 * @since 				4.5.0
 *
 */
class EE_SPCO_Reg_Step_Registration_Confirmation extends EE_SPCO_Reg_Step {

	/**
	 *    class constructor
	 *
	 * @access    public
	 * @param    EE_Checkout $checkout
	 * @return 	\EE_SPCO_Reg_Step_Registration_Confirmation
	 */
	public function __construct( EE_Checkout $checkout ) {
		$this->_slug = 'registration_confirmation';
		$this->_name = __('Registration Confirmation', 'event_espresso');
		$this->_template = SPCO_REG_STEPS_PATH . $this->_slug . DS . 'registration_page_confirmation.template.php';
		$this->checkout = $checkout;
	}



	public function translate_js_strings() {

	}

	public function enqueue_styles_and_scripts() {

	}



	/**
	 * @return boolean
	 */
	public function initialize_reg_step() {
		$this->checkout->remove_reg_step( $this->_slug );
	}



	/**
	 * @return string
	 */
	public function generate_reg_form() {
		return '';
	}



	/**
	 * @return boolean
	 */
	public function process_reg_step() {

	}



	/**
	 * @return boolean
	 */
	public function update_reg_step() {

	 }


}



// End of file EE_SPCO_Reg_Step_Registration_Confirmation.class.php
// Location: /EE_SPCO_Reg_Step_Registration_Confirmation.class.php