<?php

/**
 * BuddyPress - Activity Stream (Single Item)
 *
 * This template is used by activity-loop.php and AJAX functions to show
 * each activity.
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of an activity entry.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_activity_entry' ); ?>
<?php 
$myindustry = ucfirst(xprofile_get_field_data(31, get_current_user_id() ));
		
$category = ucfirst(str_replace('-business-advice', '', $_GET['i'])); 
if($category == $myindustry){
	$industry_check = "my_industry_check";
?>
<?php }elseif($myindustry != "" && $category == ""){
	$industry_check = "my_industry_check";
}else{
	$industry_check = "other_industry_check";?>
<?php }?>
<li class="<?= $industry_check; ?> <?php bp_activity_css_class(); ?><?php if (bp_get_activity_type() == 'activity_comment'): ?> sq-activity-comment<?php endif; ?> <?php if(bp_get_activity_user_id() == get_current_user_id()){?>my-advice<?php }else{?> other-advice<?php }?>" id="activity-<?php bp_activity_id(); ?>" data-id="<?= bp_activity_id(); ?>">
	<div class="activity-avatar rounded">
		<a href="<?php bp_activity_user_link(); ?>">

			<?php bp_activity_avatar(); ?>

		</a>
	</div>

	<div class="activity-content">
		
		<div class="activity-header">
			
			<?php bp_activity_action(); ?>
			
				<div class="edited-content" id="edited-content-<?php bp_activity_id(); ?>" style="<?php if(bp_activity_get_meta( bp_get_activity_id(), 'edit_status', true ) == "1"){ ?>display:block<?php }else{ ?>display:none<?php } ?>">Edited</div>
				
				
			 <?php if(is_user_logged_in()){
				global $wpdb, $bp;
				$meta = ''; $flaged = ''; 
				$report_txt = 'Report';
				$tbl_activity = $wpdb->prefix."bp_activity";
				$get_activity = $wpdb->get_row("SELECT * FROM $tbl_activity WHERE id=".bp_get_activity_id());
				if($get_activity->user_id != get_current_user_id()){
					$meta = bp_activity_get_meta( bp_get_activity_id(), 'activity_reported_flag', true );
					if(!empty($meta)){
						if(array_key_exists(get_current_user_id(),$meta)){
							$flaged = 'flagged';
							$report_class = 'already-reported';
						}
					}
					echo "<div class='repost-flag $report_class' id='repost-flag-".bp_get_activity_id()."' data-id='".bp_get_activity_id()."'><span class='report-span'><i class='fa fa-flag custom-flag'></i></span> <span class='report_txt'>Report</span> </div>";
				} 
				
			} ?>
			
			
			
			<div id="myModal-<?=bp_get_activity_id(); ?>" class="modal custom-flag-modal1">

  <!-- Modal content -->
  <div class="modal-content">
  
    <span class="close" id="close-<?=bp_get_activity_id(); ?>" data-id="<?=bp_get_activity_id(); ?>">&times;</span>
	<div class="mdcnt" style="font-size:15px">
    <p style="font-size:15px !important">Keep Hive clean! Please report:
<ul><li>Spammy posts, e.g. people advertising without offering business advice.</li>
<li>
Offensive posts, e.g. regarding ethnicity, gender, sexuality, age, religion, etc.  </li>
<li>Personal attacks. ‘Challenge the point, not the person’ is our motto.</li></ul>
</p>

<?php
 if(is_user_logged_in()){
				global $wpdb, $bp;
				$meta = ''; $flaged = ''; 
				$report_txt = 'Report';
				$tbl_activity = $wpdb->prefix."bp_activity";
				$get_activity = $wpdb->get_row("SELECT * FROM $tbl_activity WHERE id=".bp_get_activity_id());
				if($get_activity->user_id != get_current_user_id()){
				$meta = bp_activity_get_meta( bp_get_activity_id(), 'activity_reported_flag', true );
				
					if(!empty($meta)){
						if(array_key_exists(get_current_user_id(),$meta)){
							$flaged = 'flagged';
							$report_txt = 'reported';
						}
					}
					echo "<button type='button' name='Report' class='custom-flag-modal $flaged' data-id='".bp_get_activity_id()."'>Report</button>";
					
				} 
				
			} ?>


  </div>
</div>
</div>
<div class="modal" id="myModal2-<?=bp_get_activity_id(); ?>">
<div class="modal-content" id="modal-content2">
    <span class="close1" id="close-<?=bp_get_activity_id(); ?>" data-id="<?=bp_get_activity_id(); ?>">&times;</span>
     <p style="font-size:15px !important">You have successfully reported this Advice.</p><br>
	</div>
</div>

<div class="modal" id="myModal1-<?=bp_get_activity_id(); ?>">
<div class="modal-content" id="modal-content3">
    <span class="close2" id="close-<?=bp_get_activity_id(); ?>" data-id="<?=bp_get_activity_id(); ?>">&times;</span>
	  <p style="font-size:15px !important">You have already reported this Advice.</p><br>
	
 
	</div>
</div>


		</div>

		<?php if ( bp_activity_has_content() ) : ?>

			<div class="activity-inner">

				<?php bp_activity_content_body(); ?>
				
			</div>
			<div class="extra-data">
				<p><?php if(bp_activity_get_meta( bp_get_activity_id(), 'your_call_to_action', true ) != ""):?><?= bp_activity_get_meta( bp_get_activity_id(), 'your_call_to_action', true )?>  <?php endif;?> <?php if(bp_activity_get_meta( bp_get_activity_id(), 'get_more_traffic', true ) != ""): ?> <a target="_blank" href="<?= bp_activity_get_meta( bp_get_activity_id(), 'get_more_traffic', true );?>">  click here</a><?php endif;?></p>
				</div>
			
		<?php endif; ?>

		<?php

		/**
		 * Fires after the display of an activity entry content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_activity_entry_content' ); ?>

		<div class="activity-meta">
<?php /* echo do_shortcode('[likebtn theme="transparent" dislike_enabled="0" icon_dislike_show="0" popup_disabled="1" popup_position="left" share_enabled="0"]'); */
?>
			<?php if ( bp_get_activity_type() == 'activity_comment' ) : ?>

				<a href="<?php bp_activity_thread_permalink(); ?>" class="button view bp-secondary-action"><?php _e( 'View Conversation', 'buddypress' ); ?></a>

			<?php endif; ?>

			<?php if ( is_user_logged_in() ) : ?>
			<?php 
				global $wpdb;
				$uid = get_current_user_id();
				$query = $wpdb->get_row("SELECT * FROM `wp_bp_xprofile_data` WHERE `field_id` = '31' AND `user_id` = '".$uid."' ");
				$my_industry = ucfirst($query->value);
				$i_industry = ucfirst(str_replace('-business-advice', '', $_GET['i']));	
				
				?>
				<?php if ( bp_activity_can_comment() ) : ?>
				
				<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action cmt2" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment %s', 'buddypress' ), '<span class="total_comment">' . bp_activity_get_comment_count() . '</span>' ); ?></a>
				
				<?php if($my_industry != $i_industry){
					?>
					<style>
					.acomment-options{
						display:none;
					}
					</style>
					

				<?php }?>
				<?php endif; ?>

				<?php if ( bp_activity_can_favorite() ) : ?>

					<?php if ( !bp_get_activity_is_favorite() ) : ?>

						<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php //_e( 'Favorite', 'buddypress' ); ?></a>

					<?php else : ?>

						<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php //_e( 'Remove Favorite', 'buddypress' ); ?></a>

					<?php endif; ?>

				<?php endif; ?>

				<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

				<?php

				/**
				 * Fires at the end of the activity entry meta data area.
				 *
				 * @since 1.2.0
				 */
				do_action( 'bp_activity_entry_meta' ); ?>

			<?php endif; ?>

		</div>
    
	</div>

	<?php

	/**
	 * Fires before the display of the activity entry comments.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_before_activity_entry_comments' ); ?>

	<?php if ( ( bp_activity_get_comment_count() || bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

		<div class="activity-comments">
		
			<?php bp_activity_comments(); ?>

			<?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>
				<?php 
				if(bp_activity_get_comment_count() >= 1){
					$comment_count__class = "comment_form_display";
				}else{
					$comment_count__class = "comment_form_hide";
				}
				?>	

				<?php 
				
				if(bp_activity_get_comment_count() <= 2){
					
				}else{?>
				<div class="show-all" data-id="<?= bp_activity_id();?>" id="show-all-<?= bp_activity_id();?>"><a href="#/show-all/">View more comments</a></div>
				<?php //echo "<style>.custom-comment-form{display:block!important;}</style>";?>
				<?php } ?>		
				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="<?= $comment_count__class ?> custom-comment-form ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>
					<div class="ac-reply-avatar rounded"><?php bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<label for="ac-input-<?php bp_activity_id(); ?>" class="bp-screen-reader-text"><?php
								/* translators: accessibility text */
								_e( 'Comment', 'buddypress' );
							?></label>
							<textarea data-limit=800 id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
							<span class="countdown"></span>
						</div>
						<input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" /> &nbsp; <a style="display:none" href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
						<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
					</div>

					<?php

					/**
					 * Fires after the activity entry comment form.
					 *
					 * @since 1.5.0
					 */
					do_action( 'bp_activity_entry_comments' ); ?>

					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>
					
				</form>
				<!-- Form Position Fixed Show -->
				
				<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac_reply_form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>
					<div class="ac-reply-avatar rounded"><?php bp_loggedin_user_avatar( 'width=' . BP_AVATAR_THUMB_WIDTH . '&height=' . BP_AVATAR_THUMB_HEIGHT ); ?></div>
					<div class="ac-reply-content">
						<div class="ac-textarea">
							<label for="ac-input-<?php bp_activity_id(); ?>" class="bp-screen-reader-text"><?php
								/* translators: accessibility text */
								_e( 'Comment', 'buddypress' );
							?></label>
							<textarea data-limit=800 id="ac-input-<?php bp_activity_id(); ?>" class="ac-input bp-suggestions" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
							<span class="countdown"></span>
						</div>
						<input type="submit" id="ac_reply_form_submit-<?php bp_activity_id(); ?>" name="ac_reply_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" data-id=""/> &nbsp; <a style="display:none" href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
						<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
					</div>

					<?php

					/**
					 * Fires after the activity entry comment form.
					 *
					 * @since 1.5.0
					 */
					do_action( 'bp_activity_entry_comments' ); ?>

					<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>
					
				</form>
				<!-- Form Position Fixed-->
				
				<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
				<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
				<script type="text/javascript">
					jQuery(function(){
						jQuery('#ac-input-<?php bp_activity_id(); ?>').on("propertychange keyup input paste",
						    function () {
						        var limit = jQuery(this).data("limit");
						        var remainingChars = limit - jQuery(this).val().length;
						        if (remainingChars <= 0) {
						            jQuery(this).val(jQuery(this).val().substring(0, limit));
						        }
						        jQuery(this).next('span').text(remainingChars<=0?0: remainingChars+"/800 character left!");
						    });
					});
				</script>
				
			<?php endif; ?>
			
		</div>

	<?php endif; ?>

	<?php

	/**
	 * Fires after the display of the activity entry comments.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_after_activity_entry_comments' ); ?>

	<div class="activity-timeline"></div>

</li>


<style>
.comment_form_display{
	display:block !important;
}
comment_form_hide{
	display:none !important;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
   
}
#modal-content2{
width:30% !important;	
}
#modal-content3{
width:30% !important;	
}
/* Modal Content */
.activity-header .modal-content {
    /* background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%; */
	margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    top: 10px;
    background-color: #00b9f7 !important;
    color: #fff !important;
    padding: 20px !important;
    font-size: 15px !important;
    box-shadow: 5px 5px 10px #b4b4b4;
    border: 0 !important;
    position: relative;
    text-align: center;
}
.activity-header .modal-content p{
	color:#fff !important;
}
/* The Close Button */
.close,.close1,.close2 {
    color: #fff !important;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.modal-content p {
    padding: 20px;
}
.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.close1:hover,.close1:focus{
	color: #000;
    text-decoration: none;
    cursor: pointer;
}
.close2:hover,.close2:focus{
	color: #000;
    text-decoration: none;
    cursor: pointer;
}
div#myModal2 {
    padding: 49px 60px;
}
</style>




<script>
jQuery(".repost-flag").click(function(){
	
	var activity_id = jQuery(this).attr("data-id");
	if(jQuery(this).hasClass('already-reported')){
		jQuery("#myModal1-"+activity_id).show();
	}else{
		jQuery("#myModal-"+activity_id).show();
	}
	
	
});
jQuery(".close").click(function(){
	var activity_id = jQuery(this).attr("data-id");
	jQuery("#myModal-"+activity_id).hide();
});

jQuery(".close1").click(function(){
	var activity_id = jQuery(this).attr("data-id");
	jQuery("#myModal2-"+activity_id).hide(); 
	/* location.reload(); */
});
jQuery(".close2").click(function(){
	var activity_id = jQuery(this).attr("data-id");
	jQuery("#myModal1-"+activity_id).hide();
	
});
</script>
<?php

/**
 * Fires after the display of an activity entry.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_activity_entry' );
