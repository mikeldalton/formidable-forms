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
}
