<?php
/**
 * BuddyPress - Members Register
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<link rel="stylesheet" type="text/css" href="<?=  get_site_url();?>/wp-content/themes/kleo-child/buddypress/members/chosen_js/chosen.css">
<style>
#main {
    background-color: #ffffff;
    background-image: url(<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/bg.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    padding-top: 40px;
    padding-bottom: 40px;
}
#register-page {
    box-shadow: 1px 3px 10px black;
}
div#field_31_chosen a.chosen-single {
    width: 100%;
    height: 50px !important;
    margin: 0;
    padding: 10px 20px !important;
    vertical-align: middle !important;
    background: #f8f8f8 !important;
    border: 3px solid #ddd !important;
    font-size: 16px !important;
    font-weight: 300 !important;
    color: #888 !important;
    -moz-border-radius: 4px !important;
    -webkit-border-radius: 4px !important;
    border-radius: 4px !important;
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    -o-transition: all .3s !important;
    -moz-transition: all .3s !important;
    -webkit-transition: all .3s !important;
    -ms-transition: all .3s !important;
    transition: all .3s !important;
	border:3px solid #ddd !important;
}
/*
#basic-details-section input {
    width: 100% !important;
}#profile-details-section input {
    width: 100% !important;
}.register-terms-conditional textarea{
	  width: 50% !important;
}.error {
    width: 50% !important;
}*/
.navbar-header {
    height: 88px !important;
    line-height: 88px !important;
}
.page-id-6775 .kleo-main-header.header-normal {
	background: #00b9f7 !important;
}
.page-id-6775 .navbar-nav > li > a {
	color: #fff !important;
}
.search_hed_div {
    display: none !important;
}
#buddypress .standard-form#signup_form input[type="text"], 
#buddypress .form-allowed-tags, 
#buddypress #commentform input[type="text"], 
#buddypress .standard-form #basic-details-section input[type="password"],
#buddypress .standard-form input[type="email"] {
    width:100%;
	height: 50px;
	margin: 0;
	padding: 0 20px;
	vertical-align: middle;
	background: #f8f8f8;
	border: 3px solid #ddd;
	font-size: 16px;
	font-weight: 300;
	line-height: 50px;
	color: #888;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
	-o-transition: all .3s;
	-moz-transition: all .3s;
	-webkit-transition: all .3s;
	-ms-transition: all .3s;
	transition: all .3s;
}	
#buddypress .standard-form#signup_form textarea {
	width: 100%;
    border: 3px solid #ddd;
    background: #f8f8f8;
    color: #777777 !important;
    font-size: 14px;
}
#buddypress .standard-form#signup_form div.submit {
	float: none !important;
}
/*.page-id-6775 .col-sm-9 {
    width: 50% !important;
}*/
.page-id-6775 .sidebar.sidebar-main.col-sm-3.sidebar-right {
    width: 0 !important;
    display: none;
}
.page-id-6775 .template-page.col-sm-6.tpl-right {
width: 50% !important;
}
.page-id-6775 .template-page.col-sm-9.tpl-right {
	margin:0 auto;
}
.FC_captcha_input_container {
    margin-top: 8px;
}
.register-terms-conditional p, .register-terms-conditional div {
    font-size: 15px;
}
.reg-top-right {
	float: left;
	width: 25%;
	/*padding-top: 5px;*/
	font-size: 50px;
	color: #fff;
	line-height: 80px;
	text-align: right;
}
.reg-top-left {
	float: left;
	width: 75%;
	padding-top: 15px;
}
.reg-top-left h2 {
	color: #fff !important;
	font-weight: 900;
	font-size: 38px;
}
.register_data {
	overflow: hidden;
	background: #00b9f7;
	padding: 0 25px 5px 25px;
	-moz-border-radius: 4px 4px 0 0;
	-webkit-border-radius: 4px 4px 0 0;
	border-radius: 0;
	text-align: left;
	color: #fff;
}
.submit {
		width: 100%;
}
.standard-form {
	padding: 25px 25px 30px 25px;
	background: #eee;
	-moz-border-radius: 0 0 4px 4px;
	-webkit-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
	text-align: left;
}


/*.col-sm-12 div.vc_col-sm-6 {
    display: inline-block;
    width: 49%;
    vertical-align:middle;

}*/
.wpb_column.vc_column_container.vc_col-sm-6.ctm_img {
	vertical-align: top;
    padding-left: 80px;
}
/*.wpb_column.vc_column_container.vc_col-sm-6.reg {
	padding-right: 80px;
	border-right: 1px solid #ddd;
}*/
.col-sm-12 div.article-content {
    width: 100% !important;
    display: inline;
}
@media only screen and (min-width: 768px) {
.vc_col-sm-3 {
    width: 25%;
}
.vc_col-sm-6 {
    width: 50%;
}
}
@media only screen and (max-width: 767px) {
	.wpb_column.vc_column_container.vc_col-sm-6.reg {
		padding-right: 0;
		border: none;
	}
	.col-sm-12 div.vc_col-sm-6 {
		display: inline-block;
		width: 100%;
		vertical-align: middle;
	}
	.wpb_column.vc_column_container.vc_col-sm-6.ctm_img {
		vertical-align: top;
		 padding-left: 0px; 
		padding-top: 50px;
	}
}
.chosen-container-single .chosen-single {
    position: relative;
    display: block;
    overflow: hidden;
    padding: 0px 0px 0px 8px;
    height: 30px;
    border: 1px solid #f7f7f7 !important;
    border-radius: 0px !important;
    background-color: #fff;
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 3px #fff inset, 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 3px #fff inset, 0 1px 1px rgba(0, 0, 0, 0.1);
    color: #444;
    text-decoration: none;
    white-space: nowrap;
    line-height: 25px;
}
</style>
<div class="section-container container">

<div class="wpb_column vc_column_container col-sm-3">
	<div class="vc_column-inner "><div class="wpb_wrapper"></div></div>	
</div>
<div class="wpb_column vc_column_container col-sm-6 reg">

<div id="buddypress">

	<?php

	/**
	 * Fires at the top of the BuddyPress member registration page template.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_register_page' ); ?>

	<div class="page" id="register-page">
		<div class="register_data">
			<div class="reg-top-left">
		    	<h2>Sign Up</h2>
			</div>
			<div class="reg-top-right">
		        <i class="fa fa-user"></i>
		    </div>
		</div>
		<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">

		<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>

			<div id="template-notices" role="alert" aria-atomic="true">
				<?php

				/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
				do_action( 'template_notices' ); ?>

			</div>

			<?php

			/**
			 * Fires before the display of the registration disabled message.
			 *
			 * @since 1.5.0
			 */
			do_action( 'bp_before_registration_disabled' ); ?>

			<p><?php _e( 'User registration is currently not allowed.', 'buddypress' ); ?></p>

			<?php

			/**
			 * Fires after the display of the registration disabled message.
			 *
			 * @since 1.5.0
			 */
			do_action( 'bp_after_registration_disabled' ); ?>
		<?php endif; // registration-disabled signup step ?>

		<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

			<div id="template-notices" role="alert" aria-atomic="true">
				<?php
				
				/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
				do_action( 'template_notices' ); ?>

			</div>

			<p><?php _e( 'By joining this community, you can post business advice in your industry and view in any industry!', 'buddypress' ); ?></p>
				<p><?php _e( 'We look forward to seeing you!', 'buddypress' ); ?></p>

			
				<div class="row">
					
					<div class="col-sm-12">

						<?php

						/**
						 * Fires before the display of member registration account details fields.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_before_account_details_fields' ); ?>

						<div class="register-section" id="basic-details-section">

						<?php /***** Basic Account Details ******/ ?>

						<h4><?php _e( 'Account Details (Private)', 'buddypress' ); ?></h4>

						<!-- <label for="signup_username"><?php _e( 'Username', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
						               
						<input type="text" name="signup_username" id="signup_username" value="<?php bp_signup_username_value(); ?>" <?php bp_form_field_attributes( 'username' ); ?>/> -->
						<?php

						/**
						 * Fires and displays any member registration username errors.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_signup_username_errors' ); ?> 
						<label for="signup_email"><?php _e( 'Email Address', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
						
						<input type="email" name="signup_email" id="signup_email" value="<?php bp_signup_email_value(); ?>" <?php bp_form_field_attributes( 'email' ); ?>/>

					<div class="error custom_error" style="display: none;">Please check your email address</div>

						<?php
						
						/**
						 * Fires and displays any member registration email errors.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_signup_email_errors' ); ?>
						
						<label for="signup_password"><?php _e( 'Choose a Password', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
						
						<input type="password" name="signup_password" id="signup_password" value="" class="password-entry" <?php bp_form_field_attributes( 'password' ); ?>/>
						<?php
						
						/**
						 * Fires and displays any member registration password errors.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_signup_password_errors' ); ?>
                        <div id="pass-strength-result"></div>

						<label for="signup_password_confirm"><?php _e( 'Confirm Password', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
						
						<input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" class="password-entry-confirm" <?php bp_form_field_attributes( 'password' ); ?>/>
						<?php
						
						/**
						 * Fires and displays any member registration password confirmation errors.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_signup_password_confirm_errors' ); ?>
						
						<?php

						/**
						 * Fires and displays any extra member registration details fields.
						 *
						 * @since 1.9.0
						 */
						do_action( 'bp_account_details_fields' ); ?>

					</div><!-- #basic-details-section -->

						<?php

						/**
						 * Fires after the display of member registration account details fields.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_after_account_details_fields' ); ?>
				</div>
				<div class="col-sm-12">

					<?php /***** Extra Profile Details ******/ ?>

					<?php if ( bp_is_active( 'xprofile' ) ) : ?>

						<?php

						/**
						 * Fires before the display of member registration xprofile fields.
						 *
						 * @since 1.2.4
						 */
						do_action( 'bp_before_signup_profile_fields' ); ?>

						<div class="register-section" id="profile-details-section">

							<h4><?php _e( 'Profile Details (Public)', 'buddypress' ); ?></h4>

							<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
							<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false ) ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

							<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

                                <div<?php bp_field_css_class( 'editfield' ); ?>>
									<fieldset>

									<?php
									$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
									$field_type->edit_field_html();

									/**
									 * Fires before the display of the visibility options for xprofile fields.
									 *
									 * @since 1.7.0
									 */
									do_action( 'bp_custom_profile_edit_fields_pre_visibility' );

									/*if ( bp_current_user_can( 'bp_xprofile_change_field_visibility' ) ) : ?>
										<p class="field-visibility-settings-toggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>"><span id="<?php bp_the_profile_field_input_name(); ?>-2">
											<?php
											printf(
												__( 'This field can be seen by: %s', 'buddypress' ),
												'<span class="current-visibility-level">' . bp_get_the_profile_field_visibility_level_label() . '</span>'
											);
											?>
											</span>
											<a href="#" class="visibility-toggle-link" aria-describedby="<?php bp_the_profile_field_input_name(); ?>-2" aria-expanded="false"><?php _ex( 'Change', 'Change profile field visibility level', 'buddypress' ); ?></a>
										</p>

										<div class="field-visibility-settings" id="field-visibility-settings-<?php bp_the_profile_field_id() ?>">
											<fieldset>
												<legend><?php _e( 'Who can see this field?', 'buddypress' ) ?></legend>

												<?php bp_profile_visibility_radio_buttons() ?>

											</fieldset>
											<a class="field-visibility-settings-close" href="#"><?php _e( 'Close', 'buddypress' ) ?></a>

										</div>
									<?php else : ?>
										<p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
											<?php
											printf(
												__( 'This field can be seen by: %s', 'buddypress' ),
												'<span class="current-visibility-level">' . bp_get_the_profile_field_visibility_level_label() . '</span>'
											);
											?>
										</p>
									<?php endif*/ ?>

	                                <?php

	                                /**
	                                 * Fires after the display of the visibility options for xprofile fields.
	                                 *
	                                 * @since 1.1.0
	                                 */
	                                do_action( 'bp_custom_profile_edit_fields' ); ?>

									</fieldset>
								</div>

							<?php endwhile; ?>

							<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

							<?php endwhile; endif; endif; ?>

							<?php

							/**
							 * Fires and displays any extra member registration xprofile fields.
							 *
							 * @since 1.9.0
							 */
							do_action( 'bp_signup_profile_fields' ); ?>

						</div><!-- #profile-details-section -->

						<?php

						/**
						 * Fires after the display of member registration xprofile fields.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_after_signup_profile_fields' ); ?>

					<?php endif; ?>
				
				</div>
			</div>

			<?php if ( bp_get_blog_signup_allowed() ) : ?>

				<?php

				/**
				 * Fires before the display of member registration blog details fields.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_before_blog_details_fields' ); ?>

				<?php /***** Blog Creation Details ******/ ?>

				<div class="register-section" id="blog-details-section">

					<h4><?php _e( 'Blog Details', 'buddypress' ); ?></h4>

					<p><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'buddypress' ); ?></p>

					<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

						<label for="signup_blog_url"><?php _e( 'Blog URL', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
						<?php
						
						/**
						 * Fires and displays any member registration blog URL errors.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_signup_blog_url_errors' ); ?>

						<?php if ( is_subdomain_install() ) : ?>
							http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" /> .<?php bp_signup_subdomain_base(); ?>
						<?php else : ?>
							<?php echo home_url( '/' ); ?> <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" />
						<?php endif; ?>

						<label for="signup_blog_title"><?php _e( 'Site Title', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
						<?php
						
						/**
						 * Fires and displays any member registration blog title errors.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_signup_blog_title_errors' ); ?>
						<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value(); ?>" />

						<fieldset class="register-site">
							<span class="label"><?php _e( 'Privacy: I would like my site to appear in search engines, and in public listings around this network.', 'buddypress' ); ?>:</span>
							<?php
							
							/**
							 * Fires and displays any member registration blog privacy errors.
							 *
							 * @since 1.1.0
							 */
							do_action( 'bp_signup_blog_privacy_errors' ); ?>
	
							<label for="signup_blog_privacy_public"><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'buddypress' ); ?></label>
							<label for="signup_blog_privacy_private"><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'buddypress' ); ?></label>
						</fieldset>
						
						<?php
						
						/**
						 * Fires and displays any extra member registration blog details fields.
						 *
						 * @since 1.9.0
						 */
						do_action( 'bp_blog_details_fields' ); ?>

					</div>

				</div><!-- #blog-details-section -->
				
				<?php
				
				/**
				 * Fires after the display of member registration blog details fields.
				 *
				 * @since 1.1.0
				 */
				do_action( 'bp_after_blog_details_fields' ); ?>

			<?php endif; ?>
			
			<?php
			
			/**
			 * Fires before the display of the registration submit buttons.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_before_registration_submit_buttons' ); ?>

			<div class="submit">
				<input type="submit" name="signup_submit" id="signup_submit" value="<?php esc_attr_e( 'Sign me Up!', 'buddypress' ); ?>" />
			</div>
			
			<?php
			
			/**
			 * Fires after the display of the registration submit buttons.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_after_registration_submit_buttons' ); ?>

			<?php wp_nonce_field( 'bp_new_signup' ); ?>

		<?php endif; // request-details signup step ?>

		<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

			<div id="template-notices" role="alert" aria-atomic="true">
				<?php
				
				/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
				do_action( 'template_notices' ); ?>

			</div>
			
			<?php
			
			/**
			 * Fires before the display of the registration confirmed messages.
			 *
			 * @since 1.5.0
			 */
			do_action( 'bp_before_registration_confirmed' ); ?>

			<div id="template-notices" role="alert" aria-atomic="true">
				<?php if ( bp_registration_needs_activation() ) : ?>
					<p><?php _e( 'You have successfully created your account! To activate it, please check the email we have sent. Add us as a friend if it went to spam.', 'buddypress' ); ?></p>
				<?php else : ?>
					<p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'buddypress' ); ?></p>
				<?php endif; ?>
			</div>
			
			<?php
			
			/**
			 * Fires after the display of the registration confirmed messages.
			 *
			 * @since 1.5.0
			 */
			do_action( 'bp_after_registration_confirmed' ); ?>

		<?php endif; // completed-confirmation signup step ?>
			
			<?php
			
			/**
			 * Fires and displays any custom signup steps.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_custom_signup_steps' ); ?>

		</form>

	</div>
	
	<?php
	
	/**
	 * Fires at the bottom of the BuddyPress member registration page template.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_register_page' ); ?>

</div><!-- #buddypress -->

</div>

<div class="wpb_column vc_column_container col-sm-3">
	<div class="vc_column-inner "><div class="wpb_wrapper"></div></div>	
</div>

</div>

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/js/standalone/selectize.js"></script> --->
<script type="text/javascript" src="<?= get_site_url();?>/wp-content/themes/kleo-child/buddypress/members/chosen_js/chosen.jquery.js"></script>
<script type="text/javascript" src="<?= get_site_url();?>/wp-content/themes/kleo-child/buddypress/members/chosen_js/init.js"></script>
<script type="text/javascript">
	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
		jQuery("#signup_email").blur(function(){
			if(jQuery(".custom_error").next(".error").length){
				jQuery(".custom_error").next(".error").hide();
			}
			if(jQuery(this).val() != ''){
				if(!isEmail( jQuery(this).val() )){
					jQuery(".custom_error").show();
				} else {
					jQuery(".custom_error").hide();
				}
			} else {
				jQuery(".custom_error").hide();
			}
				
		});
		jQuery("#signup_username").blur(function(){
			if(jQuery(this).next(".error").length){
				jQuery(this).next(".error").hide();
			}
		});
		/* jQuery(document).ready(function(){ */
			/* var sitename = "<?=  get_site_url();?>/wp-content/themes/kleo-child/buddypress/members/chosen_js/chosen.css"; */
			if(jQuery("#field_31").length){
			/* jQuery('head').append('<link rel="stylesheet" type="text/css" href='+sitename+'>'); */
			
				jQuery("#field_31-selectized").attr("placeholder","Scroll or Type your industry");
			
				
				//jQuery("#field_31").trigger("liszt:updated");
				//jQuery('#select_type').trigger('liszt:updated');
	
					<?php if(isset($_POST['field_31']) && !empty($_POST['field_31'])){ ?>
						jQuery('#field_31').chosen({
							no_results_text: "Oops, nothing found!"
						});
						
					<?php } else { ?>
						jQuery('#field_31').chosen({
							placeholder_text: "Scroll or Type your industry",
							no_results_text: "Oops, nothing found!"
						});
						jQuery('div#field_31_chosen a.chosen-single span').html('Scroll or Type your industry');
					<?php } ?>
						
				
				
			
			
		}
		
		/* }); */
		
		
</script>
