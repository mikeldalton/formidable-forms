<?php
/**
 * Backend field options for name field
 *
 * @package FormidableForm
 * @since 4.10.01
 *
 * @var array        $field Field array.
 * @var array        $args  Includes 'field', 'display', and 'values'.
 * @var FrmFieldType $this  Field type object.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

echo '<pre>'; var_dump( $field ); echo '</pre>';
?>
<p>
	<label for="name_layout_<?php echo esc_attr( $field['id'] ); ?>">
		<?php esc_html_e( 'Name Layout', 'formidable' ); ?>
	</label>

	<select name="field_options[name_layout_<?php echo esc_attr( $field['id'] ); ?>]" id="name_layout_<?php echo esc_attr( $field['id'] ); ?>">
		<option value="first_last" <?php selected( $field['name_layout'], 'first_last' ); ?>>
			<?php esc_html_e( 'First Last', 'formidable' ); ?>
		</option>
		<option value="last_first" <?php selected( $field['name_layout'], 'last_first' ); ?>>
			<?php esc_html_e( 'Last First', 'formidable' ); ?>
		</option>
		<option value="first_middle_last" <?php selected( $field['name_layout'], 'first_middle_last' ); ?>>
			<?php esc_html_e( 'First Middle Last', 'formidable' ); ?>
		</option>
	</select>
</p>
