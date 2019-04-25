<?php

/**
 * BuddyPress - Activity Post Form
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
 

 
		/* $date = date('Y-m-d');
		
		$data = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."bp_activity WHERE type='activity_update' and user_id='".get_current_user_id()."'");
		
		$array1 = array();
		foreach($data as $records){
			
			$db_date = date('Y-m-d',strtotime($records->date_recorded));
			if(strtotime(date('Y-m-d')) == strtotime($db_date)){
				
				
				array_push($array1,$records->id);
				
				
			}else{
				
				
			}
		}
		echo $count = count($array1); */

		
if(isset($_POST) && $_POST['action'] == 'update_profile_data'){
	global $wpdb;
	$table = $wpdb->prefix.'bp_xprofile_data';
	$current_user_id = get_current_user_id();
	$current_date_time = date('Y-m-d H:i:s');
	if(isset($_POST['town']) && !empty($_POST['town'])){
		$data = array(
			'field_id' => 36,
			'user_id'  => $current_user_id,
			'value'	   => $_POST['town'],
			'last_updated' => $current_date_time
		);
		$wpdb->insert($table,$data);
		/*echo 123;
		echo '<pre>';
		print_r($wpdb->insert_id);
		echo '<pre>';*/
	}
	if(isset($_POST['country']) && $_POST['country']){
		$data1 = array(
			'field_id' => 37,
			'user_id'  => $current_user_id,
			'value'	   => $_POST['country'],
			'last_updated' => $current_date_time
		);
		$wpdb->insert($table,$data1);
		/*echo 456;
		echo '<pre>';
		print_r($wpdb->insert_id);
		echo '<pre>';*/
	}
	unset($_POST);
}
?>
<style>
textarea#whats-new{
	height :120px !important;
}/* span.countdown {
    color: red;
} */

form#whats-new-form .tooltip {
    position: relative;
    display: inline-block;
 /*    border-bottom: 1px dotted black; */
	opacity:1 !important;
}

form#whats-new-form .tooltip .tooltiptext {
    visibility: hidden;
    width: 200px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 10px 10px;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -100px;
    opacity: 0;
    transition: opacity 0.3s;
}

form#whats-new-form .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

form#whats-new-form .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
@media only screen and (max-width: 767px) {
form#whats-new-form label {
    font-size: 10px;
}
form#whats-new-form .tooltip .tooltiptext{
	width: 130px;
	margin-left: -66px;
}
}
form#whats-new-form{
	display:none;
}
.selectize-input.items.has-options.not-full, .selectize-input.items.full.has-options.has-items {
    width: 85%;
}
section.alternate-color.bp-full-width-profile {
    display: none;
}
</style>
<?php
	global $wpdb;
	$curr_user_id = get_current_user_id();
	$table = $wpdb->prefix.'bp_xprofile_data';
	$get_industry = $wpdb->get_row("SELECT * FROM $table WHERE `field_id` = '31' AND user_id = '".$curr_user_id."'");

	$Town_check = $wpdb->get_row("SELECT * FROM $table WHERE `field_id` = '36' AND user_id = '".$curr_user_id."'");
	if(!empty($Town_check) && $Town_check->value != ''){
		$t_check = 'true';
	}else{
		$t_check = 'false';
	}
	$country_check = $wpdb->get_row("SELECT * FROM $table WHERE `field_id` = '37' AND user_id = '".$curr_user_id."'");
	if(!empty($country_check) && $country_check->value != ''){
		$c_check = 'true';
	}else{
		$c_check = 'false';
	}

	$gavar_url = get_avatar_url( $curr_user_id);
	$pos = strpos($gavar_url,'gravatar.com');
	//if(strpos($gavar_url,'gravatar.com')!==false){
	if(empty($pos)){
		$img_check = 'true';
	}else{
		$img_check = 'false';
	}
	if(!empty($_POST['search_front'])){
		$share_img = get_option($_POST['search_front'].'_share_img');
					echo '<div class="container display-inline display-title" style="float:left;"><h1 class="page-title" style="text-transform: capitalize; font-family: Helvetica Neue,Helvetica,Arial,sans-serif !important">'.$_POST['search_front'].'</h1><div class="service-buttons activity_update" style=""><a target="blank" class="bp-share has-popup" href="https://www.facebook.com/sharer/sharer.php?quote=test content &amp;u='. get_site_url().'/industry/?i='.$_POST['search_front'].'&amp;u='.$share_img.'" rel="facebook"><span class="fa-stack fa-lg"><i class="fa fa-facebook"></i>
			</span></a><a target="blank" class="bp-share has-popup" href="https://twitter.com/share?text=test content&amp;url='.get_site_url().'/industry/?i='.$_POST['search_front'].'&amp;u='.$share_img.'" rel="twitter"><span class="fa-stack fa-lg"><i class="fa fa-twitter"></i></span>
		</a><a target="blank" class="bp-share has-popup" href="https://www.linkedin.com/shareArticle?url='.get_site_url().'/industry/?i='.$_POST['search_front'].'&amp;title=test content&amp;submitted-image-url='.$share_img.'"><span class="fa-stack fa-lg"><i class="fa fa-linkedin"></i></span>
		</a><a target="blank" class="bp-share has-popup" href="https://plus.google.com/share?url='.get_site_url().'/industry/?i='.$_POST['search_front'].'&amp;text=test content&amp;i='.$share_img.'" rel="google-plus"><span class="fa-stack fa-lg"><i class="fa fa-google-plus"></i>
			</span></a></div></div>';
				} else {
					$share_img = get_option($get_industry->value.'_share_img');
					echo '<div class="container display-inline display-title" style="float:left;"><h1 class="page-title" style="text-transform: capitalize; font-family: Helvetica Neue,Helvetica,Arial,sans-serif !important">'.$get_industry->value.'</h1><div class="service-buttons activity_update" style=""><a target="blank" class="bp-share has-popup" href="https://www.facebook.com/sharer/sharer.php?quote=test content &amp;u='. get_site_url().'/industry/?i='.$get_industry->value.'&amp;u='.$share_img.'" rel="facebook"><span class="fa-stack fa-lg"><i class="fa fa-facebook"></i>
			</span></a><a target="blank" class="bp-share has-popup" href="https://twitter.com/share?text=test content&amp;url='.get_site_url().'/industry/?i='.$get_industry->value.'&amp;u='.$share_img.'" rel="twitter"><span class="fa-stack fa-lg"><i class="fa fa-twitter"></i></span>
		</a><a target="blank" class="bp-share has-popup" href="https://www.linkedin.com/shareArticle?url='.get_site_url().'/industry/?i='.$get_industry->value.'&amp;title=test content&amp;submitted-image-url='.$share_img.'"><span class="fa-stack fa-lg"><i class="fa fa-linkedin"></i></span>
		</a><a target="blank" class="bp-share has-popup" href="https://plus.google.com/share?url='.get_site_url().'/industry/?i='.$get_industry->value.'&amp;text=test content&amp;i='.$share_img.'" rel="google-plus"><span class="fa-stack fa-lg"><i class="fa fa-google-plus"></i>
			</span></a></div></div>';
				}
	if((isset($_POST['search_front']) && $_POST['search_front'] == $get_industry->value) || empty($_POST)){
	?>
	<?php 
		/* $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."bp_activity WHERE type='activity_update' and user_id=".bp_displayed_user_id());
		$num = $wpdb->num_rows;
		if($num == 0){
			$show_hide = 'hide_btn'; */
		?>
		<?php /* }else{ 
		$show_hide = 'show_btn';
			
		 } */?>
		<div class="post-an-advice-section"> 
			<button class="post_an_advice_btn background_btn <?= $show_hide?>" t_check="<?= $t_check; ?>" c_check="<?= $c_check; ?>" img_check="<?= $img_check;?>" data-toggle="modal" data-target="#myModal">Post advice</button>
		</div>
		
		<?php if($c_check == 'false' || $t_check == 'false' || $img_check == 'false') { ?>
			<!-- Modal -->
	  		<div class="modal fade" id="myModal" role="dialog" style="">
	    		<div class="modal-dialog">
	      			<!-- Modal content-->
	      			<div class="modal-content">
				        <!-- <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div> -->
				        <?php
				        	$u_data = get_userdata($curr_user_id);
			          		$gavar_url = get_avatar_url( $curr_user_id);
					        if(strpos($gavar_url,'gravatar.com')!==false){
					        	echo '<div class="modal-body center">
					        			<div class="profile-modal-text">You must have a profile image to post or comment.</div><a class="click-btn" href="'.get_site_url().'/members/'.$u_data->data->user_login.'/profile/change-avatar/">Click here</a>
					        			</div>';
					         }else{
			          	?>
				        <form action="" method="post" id="frm_update_profile_data">
				        	<div class="modal-body">
					          	<p>Your Town and Country will appear on posts and comments to help members decide whether advice is relevant to their location. Please add them to your profile.</p>
					          	<?php if($t_check == 'false'){ ?>
					          	<div>
					          		<label>Town</label>
					          		<input type="text" name="town" value="">
					          	</div>
					          	<?php } ?>
					          	<?php if($c_check == 'false'){
					          			$tbl_xprofile = $wpdb->prefix.'bp_xprofile_fields';
					          			$get_country = $wpdb->get_results("SELECT * FROM $tbl_xprofile WHERE parent_id=37 ORDER BY  'option_order' ");

					          	 ?>
					          	<div>
					          		<label>Country</label>
					          		<!-- <input type="text" name="contry" value=""> -->
					          		<select name="country" id="country-drop">
					          			<?php foreach ($get_country as $single_country) {
					          				$cnt = $single_country->name;
					          				echo "<option value='$cnt'>$cnt</option>";
					          			}
					          			?>
					          		</select>
					          	</div>
					          	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/js/standalone/selectize.js"></script>

					          	<script type="text/javascript">
					          		jQuery('head').append('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/css/selectize.css">');
										jQuery('#country-drop').selectize({
									    sortField: 'text'
									});
					          	</script>

					          	<?php } ?>
					        </div>
					        <div class="modal-footer">
					          	<button type="submit" class="btn btn-default">Save</button>
					          	<input type="hidden" name="action" value="update_profile_data">
					          	<input type="hidden" name="search_front" value="<?= $get_industry->value;?>">
					        </div>	
				        </form>
				        <?php } ?>
	      			</div>
	    		</div>
	  		</div>
  		<?php } ?>
<?php 
}
?>
	
	
<form action="<?php bp_activity_post_form_action(); ?>" method="post" id="whats-new-form" name="whats-new-form">

	<?php

	/**
	 * Fires before the activity post form.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_before_activity_post_form' ); ?>

	<div id="whats-new-avatar" class="rounded">
		<a href="<?php echo bp_loggedin_user_domain(); ?>">
			<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
		</a>
	</div>
	
	<p class="activity-greeting"><?php if ( bp_is_group() )
		printf( __( "What's new in %s, %s?", 'buddypress' ), bp_get_group_name(), bp_get_user_firstname( bp_get_loggedin_user_fullname() ) );
	else
		printf( __( "What's new, %s?", 'buddypress' ), bp_get_user_firstname( bp_get_loggedin_user_fullname() ) );
	?></p>

	<div id="whats-new-content">
		<div id="whats-new-textarea">
			<label for="whats-new" class="bp-screen-reader-text">
			<?php
				/* translators: accessibility text */
				/* _e( 'Post what\'s new', 'buddypress' ); */
				?>
			Add your business advice (required)	
			</label>
			<p class='errormsg' id="testcase2" style='display:none'>Required</p>
			
			<textarea data-limit=800 class="bp-suggestions" name="whats-new" id="whats-new" cols="50" rows="13"
			          <?php if ( bp_is_group() ) : ?>data-suggestions-group-id="<?php echo esc_attr( (int) bp_get_current_group_id() ); ?>" <?php endif; ?>
			><?php if ( isset( $_GET['r'] ) ) : ?>@<?php echo esc_textarea( $_GET['r'] ); ?> <?php endif; ?></textarea>
			<span class="countdown"></span>
		</div>
						<?php 
global $wpdb;
$uid = get_current_user_id();

$query = $wpdb->get_row("SELECT * FROM `wp_bp_xprofile_data` WHERE `field_id` = '31' AND `user_id` = '".$uid."'");

$category =  $query->value;
?>
						<input type="hidden" name="category" value="<?= $category;?>" />
<div class="">
<label>Get more traffic. Add your URL. (optional)   <b class="tooltip">   [?]  <span class="tooltiptext">Link here to your website, lead page, offer...</span></b></label>
<p class='errormsg' id="testcase3" style='display:none'>Required if posting call-to-action</p>
<textarea type="url" data-limit=500 cols="50" rows="5" height="40px" name="get_more_traffic" id="get_more_traffic"></textarea>
<span class="validurl"></span>
<p id="get_more_p"></p>
</div>
<div class="">
<label>Your call-to-action e.g., 'View my website:' (optional)  <b class="tooltip">  [?] <span class="tooltiptext">A call-to-action encourages people to click your link. Examples:<br>
10% off my course:<br>
Like my Facebook page:<br>
Get 1-to-1 advice from me: (use your Trade Secrets profile URL)</span></b></label>
<p class='errormsg' id='testcase4' style='display:none'>Required if posting URL</p>
<input type="text" data-limit=30 value="" name="your_call_to_action" id="your_call_to_action" style="width:100%"><span class="call-to-action1"></span></div>
						
		<div id="whats-new-options">
			<div id="whats-new-submit">
				<input type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" /> <a class="close-what">Cancel</a> 
			</div>

			<?php if ( bp_is_active( 'groups' ) && !bp_is_my_profile() && !bp_is_group() ) : ?>

				<div id="whats-new-post-in-box">

					<label for="whats-new-post-in" class="bp-screen-reader-text"><?php
						/* translators: accessibility text */
						_e( 'Post in', 'buddypress' ); ?>:</label>
					<select id="whats-new-post-in" name="whats-new-post-in">
						<option selected="selected" value="0"><?php _e( 'My Profile', 'buddypress' ); ?></option>

						<?php if ( bp_has_groups( 'user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100&populate_extras=0&update_meta_cache=0' ) ) :
							while ( bp_groups() ) : bp_the_group(); ?>

								<option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>

							<?php endwhile;
						endif; ?>

					</select>
				</div>
				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />

			<?php elseif ( bp_is_group_activity() ) : ?>

				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
				<input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id(); ?>" />

			<?php endif; ?>

			<?php

			/**
			 * Fires at the end of the activity post form markup.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_activity_post_form_options' ); ?>

		</div><!-- #whats-new-options -->
	</div><!-- #whats-new-content -->

	<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
	<?php

	/**
	 * Fires after the activity post form.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_after_activity_post_form' ); ?>

</form><!-- #whats-new-form -->

<div style="display: none;width: 100%;" class="post_msg">
	<p>Your post is live! Thank you for helping your industry.</p>
</div>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
function ValidURL(str) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
  '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
  '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
  '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
  '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  return pattern.test(str);
}
/* function testex(str1) {
  var pattern = new RegExp('^(.*\.(?!(pdf|exe|doc)$))?[^.]*$','i'); 
  return pattern.test(str1);
} */

/* function ValidEXe(str){
	var pattern = new RegExp('/^[^.]+$|\.(?!(js|exe)$)([^.]+$)/','i');
	return pattern.test(str);
} */
jQuery(function(){
	jQuery(".post_an_advice_btn").click(function(){
		
		jQuery("div").removeClass("modal-backdrop");
		var t_check = jQuery(this).attr('t_check');
		var c_check = jQuery(this).attr('c_check');
		var i_check = jQuery(this).attr('img_check');
		if(t_check == 'true' && c_check == 'true' && i_check == 'true'){
			jQuery("#message").hide();
			jQuery("form#whats-new-form").fadeToggle("slow");
			jQuery("#aw-whats-new-submit").removeAttr("disabled");
			jQuery(".call-to-action1").html('');
			jQuery(".countdown").html('');
			jQuery(".validurl").html('');
			jQuery(".get_more_p").html('');

		}else {
			var link = "<?= get_site_url();?>/wp-content/themes/kleo-child/ajax.php";
			jQuery.ajax({
				type:"post",
				url:link,
				data:{action:"check_fields"},
				success:function(){
					
				}
			});
		}
		
		/* jQuery("form#whats-new-form").fadeToggle("slow"); */
	});

	jQuery("#get_more_traffic").on("propertychange keyup input",
	
    function () {
	var limit = jQuery(this).data("limit");
		/* var str2 = "www";
		var check = txt.contains(str2);
		alert(check); */
		if(limit != ""){
			var remainingChars = limit - jQuery(this).val().length;
			if (remainingChars <= 0) {
            jQuery(this).val(jQuery(this).val().substring(0, limit));
			}
			jQuery(this).next('span').text(remainingChars<=0?0:remainingChars+"/500 characters left");

			jQuery("input#aw-whats-new-submit").prop('disabled', true);
		}
		if(jQuery(this).val() == '') {
			jQuery("#aw-whats-new-submit").removeAttr("disabled");
		}
		jQuery("#testcase3").hide();
	});
	
	jQuery("#get_more_traffic").on("blur",
	
    function () {
		
		
		var txt = jQuery('#get_more_traffic').val();
		
		var result = /\.(?!(pdf|exe|doc)$)([^.]+$)/.test(txt);

		if(jQuery(this).val() == '') {
			jQuery("#aw-whats-new-submit").removeAttr("disabled");
		}
    
		
		if(result != true && jQuery(this).val() != ''){
			jQuery('#get_more_p').text('Please enter a valid URL');
			jQuery('#get_more_p').css({"color":"#a00", "font-size":"15px"});
			jQuery("input#aw-whats-new-submit").prop('disabled', true);
			

		}else if (ValidURL(txt) && txt != '') {
			
			jQuery('#get_more_p').text('');
			jQuery("input#aw-whats-new-submit").prop('disabled', false);
		}else{
	
			jQuery('#get_more_p').text('');
			//jQuery('#get_more_p').css("color","red");
			jQuery("#aw-whats-new-submit").removeAttr("disabled");
			//return false;
		}

		 
		
	});
	jQuery('#your_call_to_action').on("propertychange keyup input paste",
	function () {
		jQuery("#aw-whats-new-submit").removeAttr("disabled");
		var limit = jQuery(this).data("limit");
        var remainingChars = limit - jQuery(this).val().length;
        if (remainingChars <= 0) {
            jQuery(this).val(jQuery(this).val().substring(0, limit));
        }
        jQuery(this).next('span').text(remainingChars<=0?0: remainingChars+"/30 characters left");
        if(jQuery("#get_more_p").val() == '') {
			jQuery("#aw-whats-new-submit").removeAttr("disabled");
		}
		jQuery("#testcase4").hide();
	});
	
	
	jQuery('#whats-new').on("propertychange keyup input paste",

    function () {
        var limit = jQuery(this).data("limit");
		var errorspan = jQuery("#get_more_p").text();
		
		if(errorspan == "Please enter a valid URL"){
			jQuery("input#aw-whats-new-submit").prop('disabled', true);
		}else{
			jQuery("input#aw-whats-new-submit").prop('disabled', false);
		}
        var remainingChars = limit - jQuery(this).val().length;
        if (remainingChars <= 0) {
            jQuery(this).val(jQuery(this).val().substring(0, limit));
        }
        jQuery(this).next('span').text(remainingChars<=0?0: remainingChars+"/800 characters left");
        if(jQuery("#get_more_p").val() == '') {
			jQuery("#aw-whats-new-submit").removeAttr("disabled");
		}
		jQuery("#testcase2").hide();
    });
});
/* jQuery("input#aw-whats-new-submit").click(function(){
	alert(1);
	jQuery("input#aw-whats-new-submit").prop('disabled', true);
		jQuery("#whats-new-form").show();
});
*/
 
/* jQuery(document).ready(function(){
	jQuery("label.bp-screen-reader-text").after(jQuery("<p class='errormsg' style='display:none'>Required shows above business advice field only.</p>"));

	jQuery('#aw-whats-new-submit').on( 'click', function() {
	
	var whatsnew = jQuery("textarea#whats-new").val();
	alert(whatsnew);
	var get_more_traffic = jQuery('#get_more_traffic').val();
	alert(get_more_traffic);
	var your_call_to_action = jQuery("input#your_call_to_action").val();
	alert(your_call_to_action);
	if(whatsnew == "" && get_more_traffic == "" && your_call_to_action == ""){
		alert(1);
		jQuery("#testcase2").show();
	}
	if(whatsnew == "" && get_more_traffic == "" && your_call_to_action != ""){
		alert(2);
		
		jQuery("#testcase3").show();
	}
	
	if(whatsnew == "" && get_more_traffic != "" && your_call_to_action != ""){
	alert(3);
	jQuery("#testcase3").hide();
	jQuery("#testcase2").show();
	}
	if(whatsnew != "" && get_more_traffic != "" && your_call_to_action == ""){
		alert(4);
		jQuery("#testcase4").show();
		jQuery("input#aw-whats-new-submit").attr('disabled','disabled');
	}
	});
	
}); */


</script>