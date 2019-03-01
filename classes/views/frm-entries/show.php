<div id="form_show_entry_page" class="frm_wrap frm_single_entry_page">
	<div class="frm_page_container">

		<?php
		FrmAppHelper::get_admin_header(
			array(
				'label'       => __( 'View Entry', 'formidable' ),
				'form'        => $form,
				'hide_title'  => true,
				'close'       => '?page=formidable-entries&form=' . $form->id,
			)
		);
		?>

		<div id="frm-bar-two">
			<?php FrmFormsHelper::form_switcher( $form->name ); ?>
			<h2><?php esc_html_e( 'Form Entries', 'formidable' ); ?></h2>
			<h2><?php esc_html_e( 'View Entry', 'formidable' ); ?></h2>
		</div>

		<div class="columns-2">

		<div id="post-body-content" class="frm-fields">

			<div class="frm_form_fields">
				<div class="postbox">
					<a href="#" class="alignright frm-pre-hndle" data-frmtoggle=".frm-empty-row" data-toggletext="<?php esc_attr_e( 'Hide empty fields', 'formidable' ); ?>">
						<?php esc_html_e( 'Show empty fields', 'formidable' ); ?>
					</a>
					<h3 class="hndle">
						<span><?php esc_html_e( 'Entry', 'formidable' ); ?></span>
						<span class="frm-sub-label">
							<?php echo esc_html( $entry->id ); ?>
						</span>
					</h3>
					<?php
					echo FrmEntriesController::show_entry_shortcode( // WPCS: XSS ok.
						array(
							'id'             => $entry->id,
							'entry'          => $entry,
							'fields'         => $fields,
							'include_blank'  => true,
							'include_extras' => 'page, section',
							'inline_style'   => 0,
							'class'          => 'frm-alt-table',
						)
					);
					?>

					<?php do_action( 'frm_show_entry', $entry ); ?>
				</div>

				<?php do_action( 'frm_after_show_entry', $entry ); ?>
			</div>
		</div>

		<div class="frm-right-panel">
			<?php
			do_action( 'frm_show_entry_sidebar', $entry );
			FrmEntriesController::entry_sidebar( $entry );
			?>
		</div>

		</div>
	</div>
</div>
