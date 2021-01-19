<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
?>
<div class="frm-we-wrapper">
	<div class="row">
		<div class="column">
			<div class="frm-we-block-1">
				<div class="frm-we-logo"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/logo.svg' ); ?>" alt="Logo"></div>
				<h1><?php esc_html_e( 'Welcome to Formidable Forms!', 'formidable' ); ?></h1>
				<p><?php esc_html_e( 'Thanks for choosing Formidable Froms - The most powerful and vesatile form builder for Wordpress', 'formidable' ); ?></p>
				<div class="frm-we-buttons">
					<div class="frm-we-btn bg-blue" data-location="https://formidableforms.com/lite-upgrade/?utm_source=WordPress&utm_medium=settings-license&utm_campaign=liteplugin">
						<span><?php esc_html_e( 'Activate Formidable Form', 'formidable' ); ?></span>
					</div>
					<div class="frm-we-btn bg-transparent" data-location="https://formidableforms.com/api-connect?utm_source=WordPress&utm_medium=connect&utm_campaign=liteplugin&v=2&siteurl=http://strategy11.test&url=http://strategy11.test/wp-json/&token=6200a7febd03e9aa56f15a7a017a3f4eeeae14f5168591a2a60f54fb3c2acdd0466629313a31fd52fff645fc9351928e4ec9c2e3354d29526f65008991d7a4d9&l=0d8e0c8ed0d356a923c9631b437c7df2">
						<span><?php esc_html_e( 'Reactivate my account', 'formidable' ); ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="player">
				<iframe width="480" height="240" src="https://www.youtube.com/embed/-eGuL_OWHw4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<div class="second-section">
		<div class="row">
			<div class="column">
				<div class="frm-we-block">
					<div class="icon"><img class="plus" src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/plus.svg' ); ?>"></div>
					<h3><?php esc_html_e( 'New Blank Form', 'formidable' ); ?></h3>
					<p><?php esc_html_e( 'Create a new view from scratch', 'formidable' ); ?></p>
					<div class="right-arrow"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/arrow-right.svg' ); ?>"></div>
				</div>
			</div>
			<div class="column">
				<div class="frm-we-block frm-trigger-new-form-modal">
					<div class="icon"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/briefcase.svg' ); ?>"></div>
					<h3><?php esc_html_e( 'New Form From a Template', 'formidable' ); ?></h3>
					<p><?php esc_html_e( 'Check out our powerful pre-built templates', 'formidable' ); ?></p>
					<div class="right-arrow"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/arrow-right.svg' ); ?>"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="frm-we-carousel-wrapper">
		<h4><?php esc_html_e( 'Unlimit your possibilities', 'formidable' ); ?></h4>
		<div class="arrows">
			<span class="left-arrow"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/arrow-left.svg' ); ?>"></span>
			<span class="right-arrow"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/arrow-right.svg' ); ?>"></span>
		</div>
		<div class="row">
			<div class="column col-4">
				<div class="icon"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/calculator.svg' ); ?>"></div>
				<h3><?php esc_html_e( 'Calculators', 'formidable' ); ?></h3>
				<p><?php esc_html_e( 'Give instant online estimates and calculate advanced product options.', 'formidable' ); ?></p>
				<div class="btn"><span><?php esc_html_e( 'Upgrade', 'formidable' ); ?></span></div>
			</div>
			<div class="column col-4">
				<div class="icon"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/chat_bubbles.svg' ); ?>"></div>
				<h3><?php esc_html_e( 'Survey and Polls', 'formidable' ); ?></h3>
				<p><?php esc_html_e( 'Collect customer feedback & data like a pro - no coding required.', 'formidable' ); ?></p>
				<div class="btn"><span><?php esc_html_e( 'Upgrade', 'formidable' ); ?></span></div>
			</div>
			<div class="column col-4">
				<div class="icon"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/paperclip.svg' ); ?>"></div>
				<h3><?php esc_html_e( 'File uploads', 'formidable' ); ?></h3>
				<p><?php esc_html_e( 'Easily upload documents, files, photos, and music for user avatars, featured images, or email attachments.', 'formidable' ); ?></p>
				<div class="btn"><span><?php esc_html_e( 'Upgrade', 'formidable' ); ?></span></div>
			</div>
			<div class="column col-4">
				<div class="icon"><img src="<?php echo esc_url( FrmAppHelper::plugin_url() . '/images/listings.svg' ); ?>"></div>
				<h3><?php esc_html_e( 'Display form data with views', 'formidable' ); ?></h3>
				<p><?php esc_html_e( 'Now you can display form data in custom Views without any PHP.', 'formidable' ); ?></p>
				<div class="btn"><span><?php esc_html_e( 'Upgrade', 'formidable' ); ?></span></div>
			</div>
		</div>
	</div>
</div>
