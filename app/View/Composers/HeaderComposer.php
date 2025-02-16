<?php
/**
 * Composer to show header.
 */

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * Class HeaderComposer.
 */
class HeaderComposer extends Composer {

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = array(
		'sections.header',
	);

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		return array(
			'customLogo'   => $this->getCustomLogo(),
			'isWooEnabled' => $this->getIsWooEnabled(),
			'userName'     => $this->getUserName(),
		);
	}

	/**
	 * To get the site logo.
	 *
	 * @return string|null
	 */
	private function getCustomLogo() {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		return $logo ? $logo[0] : null;
	}

	/**
	 * To get the user name.
	 *
	 * @return string|null
	 */
	private function getUserName() {
		return is_user_logged_in() ? wp_get_current_user()->display_name : null;
	}

	/**
	 * To check if WooCommerce is enabled.
	 *
	 * @return bool
	 */
	private function getIsWooEnabled() {
		return class_exists( 'WooCommerce' );
	}
}
