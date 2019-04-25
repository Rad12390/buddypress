<?php
/**
 * BuddyPress - Activity Loop
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

/**
 * Fires before the start of the activity loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_activity_loop' ); ?>
<?php 

	global $wpdb;
	$uid = get_current_user_id();
	$bp_xprofile_data = $wpdb->prefix.'bp_xprofile_data';
	$bp_activity_meta = $wpdb->prefix.'bp_activity_meta';
	$bp_activity = $wpdb->prefix.'bp_activity';
	$query = $wpdb->get_row("SELECT * FROM $bp_xprofile_data WHERE `field_id` = '31' AND `user_id` = '".$uid."'");
	if(empty($_POST['search_front'])){
		$category =  $query->value;
	}else{
		$category = $_POST['search_front'];
	}
	$q = $wpdb->get_results("SELECT * FROM $bp_activity_meta WHERE meta_key = 'category' AND meta_value = '".$category."' order by activity_id desc");
	$data_id = array();
	foreach($q as $data){
	$activity_id = $data->activity_id;
	/* $usr = $wpdb->get_row("SELECT * FROM wp_bp_activity WHERE id = '".$activity_id."' order by id desc");
	$usrid = $usr->user_id; */
	array_push($data_id,$activity_id);	
	}
	
	
	$custom_act_id = array();
	foreach($data_id as $key => $id){
	
	array_push($custom_act_id,$id);
	}
	$friends  =  array_unique($custom_act_id);

	$friends_and_me = implode( ',', (array) $friends );

	$friends_and_me =  '&include='.$friends_and_me;
?>
<style type="text/css">
		div.login_div {
		    width: 50% !important;
		    margin: 60px auto 0 auto !important;
		}
		div.login_div1{
			width: 50% !important;
		    margin: 0 auto 0 auto !important;	
		}
		div.login_div a {
		    cursor: pointer;
		}
		.background_btn{
			background: #bbb;
			font-size: 13px;
		    padding: 10px 25px !important;
		    height: 45px !important;
		    line-height: 22px !important;
		    vertical-align: middle;
		    color: #00b9f7;
		    float: right;
		    border-color: #00b9f7 !important;
		}
		.first_post {
		    text-align: center;
		}
		.buddypress div#message p, #sitewide-notice p{
			color: #000;
		}
	</style>

<?php

	
?>



<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ).$friends_and_me ) ) : 



?>

	<?php if ( empty( $_POST['page'] ) ) : ?>

		<ul id="activity-stream" class="activity-list item-list">

	<?php endif; ?>
	<?php $activity_count = 0; ?>
	<?php while ( bp_activities() ) : bp_the_activity(); ?>
		<?php
			global $wpdb;
			$bp_activity_meta = $wpdb->prefix.'bp_activity_meta';
			$bp_xprofile_data = $wpdb->prefix.'bp_xprofile_data';
			$bp_activity = $wpdb->prefix.'bp_activity';
			$bp_activity_id = bp_get_activity_id();
			$uid = get_current_user_id();

			$get_activity_type_array = $wpdb->get_row("SELECT * FROM $bp_activity WHERE id='".$bp_activity_id."'");
			$get_activity_type = $get_activity_type_array -> type;
			$not_display_activity_array = array('new_member','new_avatar','updated_profile');

			$get_crrent_user_industry_data = $wpdb->get_row("SELECT * FROM $bp_xprofile_data WHERE field_id = 31 and user_id = '".$uid."'");
			$get_activity_added_user_industry_data = $wpdb->get_row("SELECT * FROM $bp_activity_meta WHERE activity_id = '".$bp_activity_id."' and meta_key = 'category' ");
			$get_crrent_user_industry = $get_crrent_user_industry_data->value;
			$get_activity_added_user_industry = $get_activity_added_user_industry_data->meta_value;
			if(!in_array($get_activity_type, $not_display_activity_array) && $category == $get_activity_added_user_industry){
			/*if(!in_array($get_activity_type, $not_display_activity_array)){*/
				$activity_count++; 
				bp_get_template_part( 'activity/entry' );
			}
		?>
		<?php //bp_get_template_part( 'activity/entry' ); ?>

	<?php endwhile; ?>	
	<script type="text/javascript">
		jQuery(document).ready(function(){
			/*jQuery('.login_no_post').click(function(){
		    	jQuery('.background_btn').toggleClass("post_an_advice_btn");
		    });*/

		    if(<?= $activity_count ?> == 1){
		    	jQuery('.first_post').html('Post advice for your industry and plug your business.')
		    }
		});
	</script>
<?php

/**
 * Fires after the display of an activity entry.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_activity_entry' );
?>
	
	<?php if ( bp_activity_has_more_items() ) : ?>

		<li class="load-more">
			<a href="<?php bp_activity_load_more_link() ?>"><?php _e( 'Load More', 'buddypress' ); ?></a>
		</li>

	<?php endif; ?>

	<?php if ( empty( $_POST['page'] ) ) : ?>

		</ul>

	<?php endif; ?>


	<?php
		if(($activity_count == 0 && isset($_POST['search_front']) && $_POST['search_front'] != $query->value)){
			echo '<div id="message" class="info login_div rm">
					<p><strong>'.$category.' business advice.</strong><br/>
						New industry! Awaiting industry advice.</p>
				</div>';
		}else if(($activity_count == 0 && isset($_POST['search_front']) && $_POST['search_front'] == $query->value)){
			echo '<div id="message" class="info login_div1 rm">
					<p><strong>'.$category.' business advice.</strong><br/>
						New industry! No advice posted.<br/>
						Be the first to advise your '.$category.' friends!<br/>
						Click <a class="login_no_post">here</a>.
					</p>
				</div>';	
		}else if($activity_count == 0 && empty($_POST)){
			echo '<div id="message" class="info login_div1 rm">
					<p><strong>'.$category.' business advice.</strong><br/>
						New industry! No advice posted.<br/>
						Be the first to advise your '.$category.' friends!<br/>
						Click <a class="login_no_post">here</a>.
					</p>
				</div>';
		}
	?>




<?php else : ?>

	<!-- <div id="message" class="info">
		<p><?php //_e( 'Sorry, there was no activity found. Please try a different filter.', 'buddypress' ); ?></p>
	</div> -->
	<?php
		if(($activity_count == 0 &&  isset($_POST['search_front']) && $_POST['search_front'] != $query->value)){
			echo '<div id="message" class="info login_div">
					<strong>'.$category.' business advice.</strong>
					<p>New industry! Awaiting industry advice.</p>
			</div>';
		}else if(($activity_count == 0 && isset($_POST['search_front']) && $_POST['search_front'] == $query->value)){
			echo '<div id="message" class="info login_div">
					<p><strong>'.$category.' business advice.</strong><br/>
						New industry! No advice posted.<br/>
						Be the first to advise your '.$category.' friends!<br/>
						Click <a class="login_no_post">here</a>.
					</p>
				</div>';	
		}else{
			echo '<div id="message" class="info login_div">
					<p><strong>'.$category.' business advice.</strong><br/>
						New industry! No advice posted.<br/>
						Be the first to advise your '.$category.' friends!<br/>
						Click <a class="login_no_post">here</a>.
					</p>
				</div>';
			/*echo '<div id="message" class="info login_div">
				<p>Sorry, there was no activity found. Please try a different filter.</p>
			</div>';*/
		}
	?>


<?php endif; ?>

<?php

/**
 * Fires after the finish of the activity loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_activity_loop' ); ?>

<?php if ( empty( $_POST['page'] ) ) : ?>

	<form action="" name="activity-loop-form" id="activity-loop-form" method="post">

		<?php wp_nonce_field( 'activity_filter', '_wpnonce_activity_filter' ); ?>

	</form>

<?php endif;
