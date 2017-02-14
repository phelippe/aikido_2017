<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'soliloquy' ),
				'background-image'      => esc_attr__( 'Background Image', 'soliloquy' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'soliloquy' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'soliloquy' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'soliloquy' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'soliloquy' ),
				'inherit'               => esc_attr__( 'Inherit', 'soliloquy' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'soliloquy' ),
				'cover'                 => esc_attr__( 'Cover', 'soliloquy' ),
				'contain'               => esc_attr__( 'Contain', 'soliloquy' ),
				'background-size'       => esc_attr__( 'Background Size', 'soliloquy' ),
				'fixed'                 => esc_attr__( 'Fixed', 'soliloquy' ),
				'scroll'                => esc_attr__( 'Scroll', 'soliloquy' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'soliloquy' ),
				'left-top'              => esc_attr__( 'Left Top', 'soliloquy' ),
				'left-center'           => esc_attr__( 'Left Center', 'soliloquy' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'soliloquy' ),
				'right-top'             => esc_attr__( 'Right Top', 'soliloquy' ),
				'right-center'          => esc_attr__( 'Right Center', 'soliloquy' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'soliloquy' ),
				'center-top'            => esc_attr__( 'Center Top', 'soliloquy' ),
				'center-center'         => esc_attr__( 'Center Center', 'soliloquy' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'soliloquy' ),
				'background-position'   => esc_attr__( 'Background Position', 'soliloquy' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'soliloquy' ),
				'on'                    => esc_attr__( 'ON', 'soliloquy' ),
				'off'                   => esc_attr__( 'OFF', 'soliloquy' ),
				'all'                   => esc_attr__( 'All', 'soliloquy' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'soliloquy' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'soliloquy' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'soliloquy' ),
				'greek'                 => esc_attr__( 'Greek', 'soliloquy' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'soliloquy' ),
				'khmer'                 => esc_attr__( 'Khmer', 'soliloquy' ),
				'latin'                 => esc_attr__( 'Latin', 'soliloquy' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'soliloquy' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'soliloquy' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'soliloquy' ),
				'arabic'                => esc_attr__( 'Arabic', 'soliloquy' ),
				'bengali'               => esc_attr__( 'Bengali', 'soliloquy' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'soliloquy' ),
				'tamil'                 => esc_attr__( 'Tamil', 'soliloquy' ),
				'telugu'                => esc_attr__( 'Telugu', 'soliloquy' ),
				'thai'                  => esc_attr__( 'Thai', 'soliloquy' ),
				'serif'                 => _x( 'Serif', 'font style', 'soliloquy' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'soliloquy' ),
				'monospace'             => _x( 'Monospace', 'font style', 'soliloquy' ),
				'font-family'           => esc_attr__( 'Font Family', 'soliloquy' ),
				'font-size'             => esc_attr__( 'Font Size', 'soliloquy' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'soliloquy' ),
				'line-height'           => esc_attr__( 'Line Height', 'soliloquy' ),
				'font-style'            => esc_attr__( 'Font Style', 'soliloquy' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'soliloquy' ),
				'top'                   => esc_attr__( 'Top', 'soliloquy' ),
				'bottom'                => esc_attr__( 'Bottom', 'soliloquy' ),
				'left'                  => esc_attr__( 'Left', 'soliloquy' ),
				'right'                 => esc_attr__( 'Right', 'soliloquy' ),
				'center'                => esc_attr__( 'Center', 'soliloquy' ),
				'justify'               => esc_attr__( 'Justify', 'soliloquy' ),
				'color'                 => esc_attr__( 'Color', 'soliloquy' ),
				'add-image'             => esc_attr__( 'Add Image', 'soliloquy' ),
				'change-image'          => esc_attr__( 'Change Image', 'soliloquy' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'soliloquy' ),
				'add-file'              => esc_attr__( 'Add File', 'soliloquy' ),
				'change-file'           => esc_attr__( 'Change File', 'soliloquy' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'soliloquy' ),
				'remove'                => esc_attr__( 'Remove', 'soliloquy' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'soliloquy' ),
				'variant'               => esc_attr__( 'Variant', 'soliloquy' ),
				'subsets'               => esc_attr__( 'Subset', 'soliloquy' ),
				'size'                  => esc_attr__( 'Size', 'soliloquy' ),
				'height'                => esc_attr__( 'Height', 'soliloquy' ),
				'spacing'               => esc_attr__( 'Spacing', 'soliloquy' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'soliloquy' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'soliloquy' ),
				'light'                 => esc_attr__( 'Light 200', 'soliloquy' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'soliloquy' ),
				'book'                  => esc_attr__( 'Book 300', 'soliloquy' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'soliloquy' ),
				'regular'               => esc_attr__( 'Normal 400', 'soliloquy' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'soliloquy' ),
				'medium'                => esc_attr__( 'Medium 500', 'soliloquy' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'soliloquy' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'soliloquy' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'soliloquy' ),
				'bold'                  => esc_attr__( 'Bold 700', 'soliloquy' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'soliloquy' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'soliloquy' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'soliloquy' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'soliloquy' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'soliloquy' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'soliloquy' ),
				'add-new'           	=> esc_attr__( 'Add new', 'soliloquy' ),
				'row'           		=> esc_attr__( 'row', 'soliloquy' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'soliloquy' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'soliloquy' ),
				'back'                  => esc_attr__( 'Back', 'soliloquy' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'soliloquy' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'soliloquy' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'soliloquy' ),
				'none'                  => esc_attr__( 'None', 'soliloquy' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'soliloquy' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'soliloquy' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'soliloquy' ),
				'initial'               => esc_attr__( 'Initial', 'soliloquy' ),
				'select-page'           => esc_attr__( 'Select a Page', 'soliloquy' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'soliloquy' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'soliloquy' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'soliloquy' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'soliloquy' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
