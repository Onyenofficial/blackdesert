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
	
	if(!check($_GET['template'])) throw new Exception('Email template not provided.');
	
	$Email = new Email();
	$Email->setTemplate($_GET['template']);
	$Email->deleteTemplate();
	
	redirect('email/templates');
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}