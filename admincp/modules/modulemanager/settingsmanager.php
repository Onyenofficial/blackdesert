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

$settingsList = array(
	array('title' => 'News', 'config_module' => 'news'),
	array('title' => 'Register', 'config_module' => 'register'),
	array('title' => 'Login', 'config_module' => 'login'),
	array('title' => 'Downloads', 'config_module' => 'downloads'),
	array('title' => 'Contact Form', 'config_module' => 'contact'),
	//array('title' => 'Rankings', 'config_module' => 'rankings'),
	array('title' => 'Account Profile', 'config_module' => 'account.profile'),
	array('title' => 'Account Email', 'config_module' => 'account.email'),
	array('title' => 'Account Password', 'config_module' => 'account.password'),
);

echo '<div class="row">';
	echo '<div class="col-sm-12 col-md-6 col-lg-6">';
		echo '<div class="card">';
			echo '<div class="header">Settings Manager</span></div>';
			echo '<div class="content">';
			if(is_array($settingsList)) {
				echo '<table class="table table-striped table-hover">';
				echo '<tbody>';
				foreach($settingsList as $setting) {
					echo '<tr>';
						echo '<td>'.$setting['title'].'</td>';
						echo '<td class="text-right"><a href="'.admincp_base('modulemanager/settings/id/'.$setting['config_module']).'" class="btn btn-xs btn-primary">Settings</a></td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			}
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</div>';