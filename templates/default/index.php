<?php
/**
 * WebEngine CMS
 * https://webenginecms.org/
 * 
 * @version 2.0.0
 * @author Lautaro Angelico <https://lautaroangelico.com/>
 * @copyright (c) 2013-2018 Lautaro Angelico, All Rights Reserved
 */

// Access
if(!defined('access') or !access) die();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo Handler::websiteTitle(); ?></title>
		<meta name="generator" content="WebEngine <?php echo Handler::getWebEngineVersion(); ?>"/>
		<meta name="author" content="<?php echo Handler::getWebEngineAuthor(); ?>"/>
		<meta name="description" content="<?php echo Handler::getWebsiteDescription(); ?>"/>
		<meta name="keywords" content="<?php echo Handler::getWebsiteKeywords(); ?>"/>
		
		<link rel="shortcut icon" href="<?php echo Handler::templateBase(); ?>favicon.ico"/>
		<link href="//fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
		<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		
		<link href="<?php echo Handler::templateCSS('main.css'); ?>" rel="stylesheet" media="screen">
		<script>
			var baseUrl = '<?php echo Handler::websiteLink(); ?>';
		</script>
	</head>
	<body>
		
		<header>
			<!-- Fixed navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarsExample07">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo Handler::websiteLink(); ?>"><?php echo lang('menu_txt_1'); ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo Handler::websiteLink('connect'); ?>"><?php echo lang('menu_txt_8'); ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo Handler::websiteLink('downloads'); ?>"><?php echo lang('menu_txt_7'); ?></a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo lang('menu_txt_2'); ?></a>
								<div class="dropdown-menu" aria-labelledby="dropdown01">
									<a class="dropdown-item" href="<?php echo config('website_forum_link'); ?>" target="_blank"><?php echo lang('menu_txt_9'); ?></a>
									<a class="dropdown-item" href="<?php echo config('discord_link'); ?>" target="_blank"><?php echo lang('menu_txt_10'); ?></a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav">
						<?php if(!isLoggedIn()) { ?>
							<li class="nav-item">
								<a class="nav-link navbar-red-link" href="<?php echo Handler::websiteLink('register'); ?>"><?php echo lang('menu_txt_3'); ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link navbar-red-link" href="<?php echo Handler::websiteLink('login'); ?>"><?php echo lang('menu_txt_4'); ?></a>
							</li>
						<?php } else { ?>
							<?php if(isAdmin()) { ?>
							<li class="nav-item">
								<a class="nav-link navbar-red-link" href="<?php echo Handler::websiteLink('admincp'); ?>/"><?php echo lang('admincp'); ?></a>
							</li>
							<?php } ?>
							<li class="nav-item dropdown">
								<a class="nav-link navbar-red-link dropdown-toggle" href="http://example.com" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo lang('menu_txt_5'); ?></a>
								<div class="dropdown-menu" aria-labelledby="dropdown02">
									<a class="dropdown-item" href="<?php echo Handler::websiteLink('account/profile'); ?>"><?php echo lang('menu_txt_11'); ?></a>
									<a class="dropdown-item" href="<?php echo Handler::websiteLink('account/characters'); ?>"><?php echo lang('menu_txt_12'); ?></a>
									<a class="dropdown-item" href="<?php echo Handler::websiteLink('logout'); ?>"><?php echo lang('menu_txt_6'); ?></a>
								</div>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		
		<div class="bg-content">
			<div class="header-logo">
				<a href="<?php echo Handler::websiteLink(); ?>"><img src="<?php echo Handler::templateIMG('logo.png'); ?>"></a>
			</div>
		</div>
		
		<!-- Begin page content -->
		<main role="main" class="container">
			<div class="main-title">
				<div class="row">
					<div class="col-6">
						<h1><?php echo Handler::getModuleTitle(); ?></h1>
					</div>
					<div class="col-6 text-right">
						
					</div>
				</div>
			</div>
			<div class="main-content">
				<?php Handler::loadModule(); ?>
			</div>
		</main>
		
		
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<p><?php echo lang('footer_txt_1', array(date("Y"), config('server_name'), Handler::websiteLink('terms-of-service'), Handler::websiteLink('privacy-policy'), Handler::websiteLink('contact'))); ?></p>
						<p><?php echo lang('footer_txt_2'); ?></p>
					</div>
					<div class="col-sm-4 text-right">
						<p><a href="<?php echo Handler::getWebEngineWebsite(); ?>" target="_blank" alt="Powered by WebEngine CMS">Powered by WebEngine CMS</a></p>
						<p><a href="<?php echo Handler::getWebEngineWebsite(); ?>" target="_blank" title="<?php echo Handler::getWebEngineVersion(true); ?>"><img src="<?php echo Handler::templateIMG('webengine_footer_logo.png'); ?>"/></a></p>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- JS -->
		<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
			$(function() {
				// Initiate bootstrap tooltips
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	</body>
</html>