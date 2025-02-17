<?php
/**
 * Composer to show menu.
 */

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * Class MenuComposer.
 */
class MenuComposer extends Composer {


	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = array(
		'components.menu',
	);


	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		return array(
			'menuItems'     => $this->getMenuItems(),
			'megaMenuImage' => $this->getMegaMenuImage(),
		);
	}

	/**
	 * To get the mega menu image.
	 *
	 * @return string|null
	 */
	private function getMegaMenuImage() {
		$url = get_theme_mod( 'mega_menu_image', '' );
		return $url ?: null;
	}

	/**
	 * To get the menu items.
	 *
	 * @return array
	 */
	private function getMenuItems() {
		$menu_name = 'primary_navigation';
		$locations = get_nav_menu_locations();

		if ( ! isset( $locations[ $menu_name ] ) ) {
			return array();
		}

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		if ( ! $menu ) {
			return array();
		}

		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		if ( ! $menu_items ) {
			return array();
		}

		// Convert to tree.
		$menu_tree = $this->buildMenuTree( $menu_items );

		return $menu_tree;
	}

	/**
	 * To build the menu tree.
	 *
	 * @param array $menu_items The menu items.
	 * @return array
	 */
	private function buildMenuTree( $menu_items ) {
		$menu_tree = array();
		foreach ( $menu_items as $item ) {
			$menu_tree[ $item->ID ] = array(
				'ID'        => $item->ID,
				'title'     => $item->title,
				'url'       => $item->url,
				'children'  => array(),
				'parent_id' => $item->menu_item_parent,
			);
		}

		// Build the tree.
		foreach ( $menu_tree as $id => &$menu_item ) {
			if ( 0 != $menu_item['parent_id'] ) {
				$menu_tree[ $menu_item['parent_id'] ]['children'][] = &$menu_item;
			}
		}

        // Get the root items.
		return array_filter( $menu_tree, fn( $item ) => 0 == $item['parent_id'] );
	}
}
