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

$config['admincp_sidebar'] = array(
	'home' => array(
		'title' => 'admincp_sidebar_1',
		'icon' => 'pe-7s-home',
	),
	'news' => array(
		'title' => 'admincp_sidebar_2',
		'icon' => 'pe-7s-news-paper',
		'modules' => array(
			'publish' => 'admincp_sidebar_3',
			'manager' => 'admincp_sidebar_4',
		),
	),
	'account' => array(
		'title' => 'admincp_sidebar_5',
		'icon' => 'pe-7s-id',
		'modules' => array(
			'search' => 'admincp_sidebar_6',
			'list' => 'admincp_sidebar_7',
			'unverified' => 'admincp_sidebar_45',
		),
	),
	'character' => array(
		'title' => 'admincp_sidebar_14',
		'icon' => 'pe-7s-users',
		'modules' => array(
			'search' => 'admincp_sidebar_6',
		),
	),
	'configuration' => array(
		'title' => 'admincp_sidebar_27',
		'icon' => 'pe-7s-config',
		'modules' => array(
			'website' => 'admincp_sidebar_29',
			'admins' => 'admincp_sidebar_32',
			'ipblock' => 'admincp_sidebar_31',
			'downloads' => 'admincp_sidebar_26',
			'recaptcha' => 'admincp_sidebar_51',
		),
	),
	'modulemanager' => array(
		'title' => 'admincp_sidebar_46',
		'icon' => 'pe-7s-photo-gallery',
		'modules' => array(
			'settingsmanager' => 'admincp_sidebar_24',
			'list' => 'admincp_sidebar_47'
		),
	),
	'language' => array(
		'title' => 'admincp_sidebar_36',
		'icon' => 'pe-7s-world',
		'modules' => array(
			'list' => 'admincp_sidebar_37',
			'phrases' => 'admincp_sidebar_38',
		),
	),
	'email' => array(
		'title' => 'admincp_sidebar_53',
		'icon' => 'pe-7s-mail',
		'modules' => array(
			'settings' => 'admincp_sidebar_30',
			'templates' => 'admincp_sidebar_54',
		),
	),
	'cron' => array(
		'title' => 'admincp_sidebar_42',
		'icon' => 'pe-7s-timer',
		'modules' => array(
			'new' => 'admincp_sidebar_43',
			'manager' => 'admincp_sidebar_44',
		),
	),
);