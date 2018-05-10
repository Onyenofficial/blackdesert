<?php
/**
 * WebEngine CMS
 * https://webenginecms.org/
 * 
 * @version 2.0.0
 * @author Lautaro Angelico <https://lautaroangelico.com/>
 * @copyright (c) 2013-2018 Lautaro Angelico, All Rights Reserved
 * 
 * Licensed under the MIT license
 * https://opensource.org/licenses/MIT
 */

try {
	
	if(!check($_GET['username'])) throw new Exception('Username not provided.');
	
	$Account = new Account();
	$Account->setUsername($_GET['username']);
	$accountData = $Account->getAccountData();
	if(!is_array($accountData)) throw new Exception('Account data could not be loaded.');
	
	$Player = new Player();
	$Player->setUserid($accountData['_id']);
	$characterList = $Player->getAccountPlayerList();
	
	//$BanSystem = new AccountBan();
	//$BanSystem->setUserid($accountData[_CLMN_MEMBID_]);
	//$banHistory = $BanSystem->getAccountBanList();
	
	echo '<h1 class="text-info">'.$accountData['accountName'].'</h1>';
	echo '<hr>';
	echo '<div class="row">';
		echo '<div class="col-sm-12 col-md-12 col-lg-6">';
			
			// general info
			echo '<div class="card">';
				echo '<div class="header">General Information</div>';
				echo '<div class="content table-responsive table-full-width">';
					echo '<table class="table table-hover table-striped">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>Data</th>';
							echo '<th>Value</th>';
							echo '<th class="text-right">Action</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
						echo '<tr>';
							echo '<td>Id</td>';
							echo '<td>'.$accountData['_id'].'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Username</td>';
							echo '<td>'.$accountData['accountName'].'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Password</td>';
							echo '<td>******</td>';
							echo '<td class="text-right"><a href="'.admincp_base('account/password/username/'.$accountData['accountName']).'" class="btn btn-xs btn-default">Change</a></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Email Address</td>';
							echo '<td>'.$accountData['email'].'</td>';
							echo '<td class="text-right"><a href="'.admincp_base('account/email/username/'.$accountData['accountName']).'" class="btn btn-xs btn-default">Change</a></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Family</td>';
							echo '<td>'.$accountData['family'].'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Cash</td>';
							echo '<td>'.$accountData['cash'].'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Registration Date</td>';
							echo '<td>'.formatMongoDate($accountData['registrationDate']).'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Access Level</td>';
							echo '<td>'.$accountData['accessLvl'].'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Last IP</td>';
							echo '<td>'.$accountData['host'].'</td>';
							echo '<td class="text-right"></td>';
						echo '</tr>';
						
					echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</div>';
			
		echo '</div>';
		
		echo '<div class="col-sm-12 col-md-12 col-lg-6">';
			
			// characters
			echo '<div class="card">';
				echo '<div class="header">Characters</div>';
				echo '<div class="content table-responsive table-full-width">';
					if(is_array($characterList)) {
						echo '<table class="table table-hover table-striped">';
						echo '<thead>';
							echo '<tr>';
								echo '<th>Name</th>';
								echo '<th class="text-right">Action</th>';
							echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						foreach($characterList as $characterData) {
							if(!is_array($characterData)) continue;
							echo '<tr>';
								echo '<td>'.$characterData['name'].'</td>';
								echo '<td class="td-actions text-right">';
									echo '<a href="'.admincp_base('character/profile/name/'.$characterData['name']).'" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs" data-original-title="Profile"><i class="fa fa-user"></i></a>';
								echo '</td>';
							echo '</tr>';
						}
						echo '</tbody>';
						echo '</table>';
					} else {
						message('warning', 'No characters found in account.');
					}
				echo '</div>';
			echo '</div>';
			
		echo '</div>';
	echo '</div>';
	
	/*
	echo '<div class="row">';
		echo '<div class="col-sm-12 col-md-12 col-lg-6">';
			
			// ban history
			echo '<div class="card">';
				echo '<div class="header">Ban History</div>';
				echo '<div class="content table-responsive table-full-width">';
					if(is_array($banHistory)) {
						echo '<table class="table table-hover table-striped">';
						echo '<thead>';
							echo '<tr>';
								echo '<th>Date</th>';
								echo '<th>By</th>';
								echo '<th>Type</th>';
								echo '<th>Duration</th>';
								echo '<th>Reason</th>';
								echo '<th>Status</th>';
								echo '<th class="text-right">Action</th>';
							echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						foreach($banHistory as $banData) {
							$banDuration = $BanSystem->formatBanDuration($banData['ban_duration']);
							$banStatus = $banData['ban_lifted'] == 1 ? '<span class="label label-default">Lifted</span>' : '<span class="label label-success">Active</span>';
							
							echo '<tr>';
								echo '<td>'.databaseTime($banData['ban_date']).'</td>';
								echo '<td>'.$banData['ban_by'].'</td>';
								echo '<td>'.$banData['ban_type'].'</td>';
								echo '<td>'.$banDuration.'</td>';
								echo '<td><button type="button" class="btn btn-xs btn-default" data-container="body" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="'.$banData['ban_reason'].'">Reason</button></td>';
								echo '<td>'.$banStatus.'</td>';
								echo '<td class="text-right">'.($banData['ban_lifted'] == 0 ? '<a href="'.admincp_base('bans/lift/id/'.$banData['ban_id'].'/username/'.$accountData[_CLMN_USERNM_]).'" class="btn btn-xs btn-success">Lift Ban</a>' : null).'</td>';
							echo '</tr>';
						}
						echo '</tbody>';
						echo '</table>';
					} else {
						message('success', 'No bans found for account.');
					}
					
				echo '</div>';
			echo '</div>';
			
		echo '</div>';
		
	echo '</div>';
	*/
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}