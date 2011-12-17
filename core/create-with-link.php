<?php
	/***************************************************************************************
	 * 
	 * This script is to create link lists for every healing modality lists
	 * 
	 * *****************************************************************************************/

	if(!isset($_GET['page']) or $_GET['page'] !== 'members-list-links-list') return;
	
	//form data saving
	add_action('init','WP_members_list_link_save');
	function WP_members_list_link_save(){		
		if($_POST['modality_with_link_hidden'] == 'Y') :
		 	$modals = $_POST['modal_name'];
			$links = $_POST['modal_link'];
			
			$modlas_array = array();
			foreach($modals as $key=>$modal){
				$m = preg_replace('/[ ]/','',$modal);
				$modals_array[$m] = trim($links[$key]);
			}
						
			update_option('healing_modalities_link',$modals_array);
			
			echo '<div class="updated">Saved</div>';
			
		endif;
	}	
	
	//original function
	function WP_members_list_link_create() {
		
		$links_options = get_option('healing_modalities_link');
		$mem_options = get_option('tern_wp_members');
		$lists = $mem_options['lists'];
	?>
		
		<div class="wrap">
		<?php screen_icon('options-general'); ?>
		<h2> Healing Modality lists with links </h2>
		<form method="post" action="">
			<table id="lists" class="widefat" cellspacing="0">
				<thead>
					<tr class="thead">
						<th scope="col" > Modality Name </th>
						<th scope="col"> &nbsp;&nbsp; Link </th>
					</tr>
				</thead>
				<tfoot>
					<tr class="thead">
						<th scope="col"> Modality Name </th>
						<th scope="col"> &nbsp;&nbsp; Link </th>
					</tr>
				</tfoot>
				<tbody>
					<?php
						foreach($lists as $list){
							$m = preg_replace('/[ ]/','',$list);
							?>
							<tr>
								<td><input type="text" readonly="readonly" name="modal_name[]" value="<?php echo $list; ?>" /></td>
								<td><input size="80px" type="text" name="modal_link[]" value="<?php echo $links_options[$m]; ?>" /></td>
								
							</tr>
							<?php
						}
					?>
				</tbody>
			</table>
			
			<input type="hidden" name="modality_with_link_hidden" value="Y" />
			<br/><br/>
			<input type="submit" value="Update" class="button-primary" />
			
		</form>
		</div> <!-- wrap -->
		
	<?php
	}
?>
