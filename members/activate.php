<?php
/**
 * BuddyPress - Members Activate
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div id="buddypress">

	<?php

	/**
	 * Fires before the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_activation_page' ); ?>

	<div class="page" id="activate-page">

		<div id="template-notices" role="alert" aria-atomic="true">
			<?php

			/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
			do_action( 'template_notices' ); ?>

		</div>

		<?php

		/**
		 * Fires before the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_before_activate_content' ); ?>

		<?php if ( bp_account_was_activated() ) : ?>

			<?php if ( isset( $_GET['e'] ) ) : ?>
				<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ); ?></p>
			<?php else : ?>
				<p>
					<?php
					//global $wpdb;
					/*print_r($_POST);
					print_r($_REQUEST);
					$umeta = $wpdb->prefix."usermeta";
					$get_uid = $wpdb->get_row("SELECT * FROM $umeta WHERE meta_key = 'activation_key' and meta_value = '".wp_unslash($_POST['key'])."' ");

					$activate_url = get_site_url()."/login";*/
					$activation_text = __( /*'<p style="color:red">Almost there!</p><p>Next step: <a id="click_activate" href="#" data-id="'.$get_uid->user_id.'">add a photo</a> to start posting and commenting and get your personal brand around!</p>'*/'Your account was activated successfully! You can now <a href="'.$activate_url.'">log in</a> with the username and password you provided when you signed up.', 'buddypress' );
					
					

					$activation_text = str_replace( 'a href="%s"', 'a class="kleo-show-login" href="%s"', $activation_text );
					

					printf( $activation_text , wp_login_url( bp_get_root_domain() ) );
					?>
				</p>
			<?php endif; ?>

		<?php else : ?>

			<p><?php _e( 'Please provide a valid activation key.', 'buddypress' ); ?></p>

			<form action="" method="get" class="standard-form" id="activation-form">

				<label for="key"><?php _e( 'Activation Key:', 'buddypress' ); ?></label>
				<input type="text" name="key" id="key" value="" />
				<input type="hidden" name="hidden_key" value="">
				<p class="submit">
					<input type="submit" name="submit" value="<?php esc_attr_e( 'Activate', 'buddypress' ); ?>" />
				</p>

			</form>
			

		<?php endif; ?>

		<?php

		/**
		 * Fires after the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_after_activate_content' ); ?>

	</div><!-- .page -->

	<?php

	/**
	 * Fires after the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_activation_page' ); ?>

</div><!-- #buddypress -->