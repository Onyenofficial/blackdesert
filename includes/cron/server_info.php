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
	
	$Account = new Account();
	$totalAccounts = $Account->getTotalAccountCount();
	
	$db = Handler::loadDB('BDO');
	$totalPlayers = $db->gameserver->players->count();
	
	$result = array(
		'total_accounts' => $totalAccounts,
		'total_players' => $totalPlayers
	);
	
	$cacheData = encodeCache($result);
	updateCache('server_info.cache', $cacheData);
	
} catch(Exception $ex) {
	// TODO: logs system
}