<?php
/**
 * WebEngine CMS (Black Desert Online)
 * https://webenginecms.org/
 * 
 * @version 2.0.0
 * @author Lautaro Angelico <https://lautaroangelico.com/>
 * @copyright (c) 2013-2018 Lautaro Angelico, All Rights Reserved
 */

$Player = new Player();
$Player->setUserid($_SESSION['userid']);
$accountCharacters = $Player->getAccountPlayerList();

if(is_array($accountCharacters)) {
	echo '<table class="table table-striped account-character-table">';
		echo '<thead>';
			echo '<tr>';
				echo '<th></th>';
				echo '<th>Name</th>';
				echo '<th>Zodiac</th>';
				echo '<th>Level</th>';
				echo '<th>Exp</th>';
				echo '<th>Creation Date</th>';
			echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($accountCharacters as $characterData) {
			echo '<tr>';
				echo '<td>'.returnPlayerAvatar($characterData['classType'], true, true, 'rounded-image-corners').'</td>';
				echo '<td>'.$characterData['name'].'</td>';
				echo '<td>'.zodiacSignName($characterData['zodiac']).'</td>';
				echo '<td>'.$characterData['level'].'</td>';
				echo '<td>'.number_format($characterData['exp']).'</td>';
				echo '<td>'.formatMongoDate($characterData['creationDate']).'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
	echo '</table>';
} else {
	message('warning', lang('error_46'));
}