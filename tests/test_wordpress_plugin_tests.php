<?php

class WP_Test_WordPress_Plugin_Tests extends FrmUnitTest {

	/**
	 * Ensure that the plugin has been installed and activated.
	 */
    function setUp() {
		parent::setUp();

        if ( is_callable('FrmUpdatesController::pro_is_authorized') ) {
            // set pro flag
            update_option('frmpro-credentials', array( 'license' => '87fu-uit7-896u-ihy8'));
            update_option('pro_auth_store', true);
            add_filter('frm_pro_installed', '__return_true');
        }

		$this->frm_install();
	}

	function test_plugin_activated() {
		$this->assertTrue( is_plugin_active( 'formidable/formidable.php' ) );
	}

	function test_wpml_install(){
        if ( is_callable('FrmProCopy::install') ) {
	        $copy = new FrmProCopy();
	        $copy->install();
        }
	}

	function test_create_form() {
        $values = FrmFormsHelper::setup_new_vars(false);
        $form_id = FrmForm::create( $values );
        $this->form_id = (int) $form_id;

	    $this->assertTrue(is_numeric($form_id));
		$this->assertTrue($form_id > 0);

	    // create each field type
	    $this->field_ids = array();
	    $field_types = array_merge(FrmFieldsHelper::field_selection(), FrmFieldsHelper::pro_field_selection());
	    foreach ( $field_types as $field_type => $field_info ) {
    	    $field_values = apply_filters('frm_before_field_created', FrmFieldsHelper::setup_new_vars($field_type, $form_id));

            $field_id = FrmField::create( $field_values );
            $this->assertTrue(is_numeric($field_id));
            $this->assertTrue($field_id > 0);

            if ( $field_id ) {
                $this->field_ids[ $field_id ] = rand_str();

                $field = FrmField::getOne($field_id);
                $this->assertNotEmpty($field);

                $field = FrmFieldsHelper::setup_edit_vars($field);
                $this->assertArrayHasKey('id', $field);
            }
        }

        $this->create_entry();
		$this->search_all_entries();
	}

    /**
     * Search for a value in an entry
     */
    function search_all_entries() {
	    $this->assertTrue(is_numeric($this->form_id));

        $items = FrmEntry::getAll( array( 'it.form_id' => $this->form_id ), '', '', true, false);
        $this->assertFalse(empty($items));

        $this->search_by_field();
    }

    function search_by_field() {
	    $this->assertTrue(is_numeric($this->form_id));

        $s = reset($this->field_ids);
        $fid = key($this->field_ids);
        $this->assertTrue(is_numeric($fid));

	    $s_query = array( 'it.form_id' => $this->form_id );

        if ( is_callable('FrmProEntriesHelper::get_search_str') ) {
	        $s_query = FrmProEntriesHelper::get_search_str($s_query, $s, $this->form_id, $fid);
        }

        $items = FrmEntry::getAll($s_query, '', '', true, false);
        $this->assertFalse(empty($items));
    }

    function test_duplicate_form(){
        $form = $this->get_one_form( 'contact' );

        $id = FrmForm::duplicate( $form->id );
        $this->assertTrue( is_numeric($id) );
        $this->assertTrue( $id > 0 );
    }

    function test_delete_form(){
        $forms = FrmForm::getAll();
        $this->assertTrue( count( $forms ) >= 1 );

        foreach ( $forms as $form ) {
            if ( $form->is_template ) {
                continue;
            }

            $id = FrmForm::destroy( $form->id );
            $this->assertNotEmpty( $id );
        }
    }

    function test_migrate_from_12_to_17() {
        update_option('frm_db_version', 12);

        $form = FrmForm::getOne('contact-db12');
        $this->assertTrue( $form ? true : false );
        $this->assertTrue( is_numeric($form->id) );
        $notification = array( 0 => array(
            'email_to' => 'emailto@test.com', 'also_email_to' => array(1,2),
            'reply_to' => 'replyto@test.com', 'reply_to_name' => 'Reply to me',
            'cust_reply_to' => '', 'cust_reply_to_name' => '', 'plain_text' => 1,
            'email_message' => 'This is my email message. [default-message]',
            'email_subject' => 'The subject', 'update_email' => 2, 'inc_user_info' => 1,
        ) );
        $form->options['notification'] = $notification;

        global $wpdb;
        $updated = $wpdb->update($wpdb->prefix .'frm_forms', array( 'options' => maybe_serialize($form->options)), array( 'id' => $form->id));
		FrmForm::clear_form_cache();
        $this->assertEquals( $updated, 1 );

		$form = FrmForm::getOne( 'contact-db12' );

		$this->assertNotEmpty( $form->options, 'The form settings are empty' );
		$this->assertTrue( isset( $form->options['notification'] ), 'The old notification settings are missing' );
		$this->assertEquals( $form->options['notification'][0]['email_to'], 'emailto@test.com' );

        // migrate data
		FrmAppController::install();

		$form_actions = FrmFormActionsHelper::get_action_for_form( $form->id, 'email' );
        foreach ( $form_actions as $action ) {
			$this->assertTrue( strpos( $action->post_content['email_to'], 'emailto@test.com' ) !== false );
        }
    }
}
