<?php
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		File:
//			meta.php
//		Description:
//			This file compiles and processes the plugin's user meta options.
//		Actions:
//			1) compile options
//			2) process and save options
//		Date:
//			Added on April 30th 2011
//		Copyright:
//			Copyright (c) 2011 Matthew Praetzel.
//		License:
//			This software is licensed under the terms of the GNU Lesser General Public License v3
//			as published by the Free Software Foundation. You should have received a copy of of
//			the GNU Lesser General Public License along with this software. In the event that you
//			have not, please visit: http://www.gnu.org/licenses/gpl-3.0.txt
//
////////////////////////////////////////////////////////////////////////////////////////////////////

/****************************************Commence Script*******************************************/

//                                *******************************                                 //
//________________________________** INITIALIZE                **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                *******************************                                 //
if($pagenow !== 'profile.php' and $pagenow !== 'user-edit.php') {
	return;
}
//                                *******************************                                 //
//________________________________** ADD EVENTS                **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                *******************************                                 //
add_action('profile_update','WP_members_list_meta_actions');
add_action('init','WP_members_list_meta_styles');
add_action('init','WP_members_list_meta_scripts');
add_action('edit_user_profile','WP_members_list_meta');
add_action('show_user_profile','WP_members_list_meta');
//                                *******************************                                 //
//________________________________** SCRIPTS                   **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                *******************************                                 //
function WP_members_list_meta_styles() {
	
}
function WP_members_list_meta_scripts() {
	
}
//                                *******************************                                 //
//________________________________** ACTIONS                   **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                *******************************                                 //
function WP_members_list_meta_actions($i) {
	global $getWP,$tern_wp_members_defaults,$current_user,$wpdb,$profileuser,$current_user;
	$o = $getWP->getOption('tern_wp_members',$tern_wp_members_defaults);
	get_currentuserinfo();

	if(!current_user_can('edit_users') and (($o['allow_display'] and $current_user->ID != $i) or !$o['allow_display'])) {
		return;
	}

	global $getWP,$tern_wp_members_defaults,$current_user,$wpdb,$profileuser;
	$o = $getWP->getOption('tern_wp_members',$tern_wp_members_defaults);
	
	//delete_user_meta($i,'_tern_wp_member_list');
	$lists = '';
	if($_REQUEST['lists']) :
		foreach((array)$_REQUEST['lists'] as $v) {
			$lists .= $v . ', ' ;			
		}
		
		$lists = rtrim($lists,', ');
		update_user_meta( $i,'_tern_wp_member_list',$lists);
	endif;
}
//                                *******************************                                 //
//________________________________** SETTINGS                  **_________________________________//
//////////////////////////////////**                           **///////////////////////////////////
//                                **                           **                                 //
//                                *******************************                                 //
function WP_members_list_meta($i) {
	
	global $getWP,$tern_wp_members_defaults,$profileuser,$current_user;
	$o = $getWP->getOption('tern_wp_members',$tern_wp_members_defaults);
	get_currentuserinfo();
	
	/*
	if(!current_user_can('edit_users') and (($o['allow_display'] and $current_user->ID != $i->ID) or !$o['allow_display'])) {
		return;
	}
	*/
	if(!current_user_can('edit_users')) return;
	
	
?>
	<h3>Members Lists</h3>
	<table class="form-table">
	<tr>
		<th><label for="lists">Select the lists you'd like this user displayed in:</label></th>
		<td>
			<ul>
			<?php //$lists = explode(',',$o['lists']) ?>
			<?php foreach($o['lists'] as $v) { ?>
			<li><input type="checkbox" name="lists[]" value="<?php echo $v; ?>" <?php if(WP_members_list_is_in_list($i->ID,$v)) {?>checked<?php } ?> /> <?php echo $v; ?></li>
			<?php } ?>
			</ul>
		</td>
	</tr>
	</table>
<?php
	
}

/****************************************Terminate Script******************************************/
?>
