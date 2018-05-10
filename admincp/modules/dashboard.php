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

// check webengine version
@checkVersion();

echo '<div class="row">';
	
	// WebEngine Info
	echo '<div class="col-sm-12 col-md-6 col-lg-6">';
		echo '<div class="card">';
			echo '<div class="header">General Information</div>';
			echo '<div class="content table-responsive">';
				
				echo 'WebEngine CMS '.__WEBENGINE_VERSION__.' (core)<br />';
				echo '<a href="https://webenginecms.org/" target="_blank">https://webenginecms.org/</a><br /><br />';
				
				echo 'Base Url<br />';
				echo __BASE_URL__ . '<br /><br />';
				
				echo 'Master Cron Job Path<br />';
				echo __PATH_CRON__ . 'cron.php<br /><br />';
				
				echo 'WebEngine Database Path<br />';
				echo __PATH_INCLUDES__ . 'webengine.db<br /><br />';
				
				echo 'WebEngine Database Size<br />';
				echo readableFileSize(filesize(__PATH_INCLUDES__.'webengine.db')).'<br /><br />';
				
				echo 'PHP Version<br />';
				echo phpversion().'<br /><br />';
				
				echo 'Operating System<br />';
				echo PHP_OS.'<br /><br />';
				
			echo '</div>';
		echo '</div>';
	echo '</div>';
	
echo '</div>';