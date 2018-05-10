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

// module configs
$cfg = loadModuleConfig('account.profile');
if(!is_array($cfg)) throw new Exception(lang('error_66'));

// account information
$Account = new Account();
$Account->setUserid($_SESSION['userid']);
$accountInfo = $Account->getAccountData();
if(!is_array($accountInfo)) throw new Exception(lang('error_12'));

// account information
if($cfg['show_account_info']) {
	echo '<h4>'.lang('account_txt_1').'</h4>';
	echo '<table class="table account-table">';
		echo '<tr>';
			echo '<th>'.lang('account_txt_2').'</th>';
			echo '<td>'.$accountInfo['accountName'].'</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>'.lang('account_txt_3').'</th>';
			echo '<td>'.$accountInfo['email'].'<a href="'.Handler::websiteLink('account/email').'" class="btn btn-sm btn-primary float-right">'.lang('account_txt_6').'</a></td>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>'.lang('account_txt_4').'</th>';
			echo '<td>******<a href="'.Handler::websiteLink('account/password').'" class="btn btn-sm btn-primary float-right">'.lang('account_txt_6').'</a></td>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>'.lang('account_txt_27').'</th>';
			echo '<td>'.formatMongoDate($accountInfo['registrationDate']).'</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>'.lang('account_txt_28').'</th>';
			echo '<td>'.$accountInfo['family'].'</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>'.lang('general_currency_name').'</th>';
			echo '<td>'.number_format($accountInfo['cash']).'</td>';
		echo '</tr>';
	echo '</table>';
}