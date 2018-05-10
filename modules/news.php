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
$cfg = loadModuleConfig('news');
if(!is_array($cfg)) throw new Exception(lang('error_66'));

// news object
$News = new News();
if(check($_GET['read'])) {
	$News->setRequestUrl($_GET['read']);
	$cfg['news_expanded'] = 1;
}
$newsList = $News->getNewsList();
if(!is_array($newsList)) throw new Exception(lang('error_78'));

// news list
$newsCount = 0;
foreach($newsList as $newsArticle) {
	if($newsCount >= $cfg['news_list_limit']) continue;
	
	$news_id = $newsArticle['id'];
	$news_title = $newsArticle['title'];
	$news_author = $newsArticle['author'];
	$news_date = $newsArticle['date'];
	$news_url = Handler::websiteLink('news/read/'.$newsArticle['file']);
	$news_content = $News->loadNewsContentCache($newsArticle['file']);
	if(!check($news_content)) continue;
	
	echo '<article class="news">';
			// news title
			echo '<h2><a href="'.$news_url.'">'.$news_title.'</a></h2>';
			
			// expanded news
			if($newsCount < $cfg['news_expanded']) {
				echo $news_content;
				
				echo '<div class="float-right newsdate">';
					echo lang('news_txt_1', array($news_author, $news_date));
				echo '</div>';
				
				echo '<div class="news-separator"></div>';
			}
	echo '</article>';
	
	$newsCount++;
}