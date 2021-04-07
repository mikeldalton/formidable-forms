<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * Class FrmFieldName
 *
 * @since 4.10.01
 */
class FrmFieldName extends FrmFieldType {

	/**
	 * Field name.
	 *
	 * @var string
	 */
	protected $type = 'name';

	/**
	 * Does the html for this field label need to include "for"?
	 *
	 * @var bool
	 */
	protected $has_for_label = false;

	protected function field_settings_for_type() {
		$settings = array(
			'clear_on_focus' => false, // Don't use the regular placeholder option.
			'default_value'  => true,
			'description'    => false,
			'visibility'     => true,
			'default'        => false,
			'logic'          => true,
			'autopopulate'   => false,
			'calc'           => false,
			'conf_field'     => false,
		);

		return $settings;
	}

	/**
	 * Gets extra field options.
	 *
	 * @return string[]
	 */
	protected function extra_field_opts() {
		$options = array(
			'name_layout' => 'first_last',
		);

		$default_labels = $this->get_default_labels();
		foreach ( $default_labels as $key => $label ) {
			$options[ $key . '_desc' ] = $label;
		}

		return $options;
	}

	/**
	 * Shows primary options.
	 *
	 * @since 4.0
	 * @param array $args Includes 'field', 'display', and 'values'.
	 */
	public function show_primary_options( $args ) {
		$field = $args['field'];
		include( FrmAppHelper::plugin_path() . '/classes/views/combo-fields/name/backend-field-opts.php' );

		parent::show_primary_options( $args );
	}

	public function show_on_form_builder( $name = '' ) {
		$field = FrmFieldsHelper::setup_edit_vars( $this->field );

		$defaults = array(
			'first'  => '',
			'last'   => '',
			'middle' => '',
		);
		$this->fill_values( $field['default_value'], $defaults );

		$field['value'] = $field['default_value'];
		$sub_fields = FrmProAddressesController::get_sub_fields( $field );
		$field_name = $this->html_name( $name );
		$html_id = $this->html_id();

		include( FrmProAppHelper::plugin_path() . '/classes/views/combo-fields/input-form-builder.php' );
	}

	/**
	 * Gets default labels.
	 *
	 * @return array
	 */
	private function get_default_labels() {
		return array(
			'first'  => __( 'First Name', 'formidable' ),
			'last'   => __( 'Last Name', 'formidable' ),
			'middle' => __( 'City', 'formidable' ),
		);
	}
}
