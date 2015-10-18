<!DOCTYPE HTML>
<html>
	<head>
		<title>Teachoo</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?php echo PublicFile; ?>images/favicon.png">
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="<?php echo PublicFile; ?>js/jquery.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/jquery.dropotron.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/jquery.scrolly.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/jquery.scrollgress.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/jquery.validate.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/skel.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/skel-layers.min.js"></script>
		<script src="<?php echo PublicFile; ?>js/init.js"></script>

		<link rel="stylesheet" href="<?php echo PublicFile; ?>css/skel.css" />
		<link rel="stylesheet" href="<?php echo PublicFile; ?>css/style.css" />
		<link rel="stylesheet" href="<?php echo PublicFile; ?>css/style-wide.css" />
		<link rel="stylesheet" href="<?php echo PublicFile; ?>css/style-noscript.css" />
		<link rel="stylesheet" href="<?php echo PublicFile; ?>css/profile.css" />
		<link rel="stylesheet" href="<?php echo PublicFile; ?>css/rating.css" />
		<style>
			img {
    			opacity: 0.4;
    			filter: alpha(opacity=40); /* For IE8 and earlier */
			}

			img:hover {
    			opacity: 1.0;
    			filter: alpha(opacity=100); /* For IE8 and earlier */
			}
		</style>
	</head>
	<body class="<?php if(!isset($_GET['page'])) echo 'index'; else echo 'contacts'; ?>">

		<!-- Header -->
			<header id="header" class="<?php if(!isset($_GET['page'])) echo 'alt'; else echo 'skel-layers-fixed'; ?>">
				<h1 id="logo"><a href="<?php echo app_url; ?>"><strong>//TeaCh</strong>oo</a></h1>
				<nav id="nav">
					<ul>
						<li <?php if(!isset($_GET['page'])) echo 'class="current"'; ?>><a href="<?php echo app_url; ?>">Начало</a></li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == 'contacts') echo 'class="current"'; ?>><a href="<?php echo app_url; ?>contacts">Контакти</a></li>
						<?php if(!isset($GLOBALS['user'])) { ?>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == 'signin') echo 'class="current"'; ?>><a href="<?php echo app_url; ?>signin">Вход</a></li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == 'signup') echo 'class="current"'; ?>><a href="<?php echo app_url; ?>signup" class="button special">Регистрация</a></li>
						<?php } else { ?>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == 'teachers') echo 'class="current"'; ?>><a href="<?php echo app_url; ?>teachers">Учители</a></li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == 'rate') echo 'class="current"'; ?>><a href="<?php echo app_url; ?>rate">Рейтинг</a></li>
						<li <?php if(isset($_GET['page']) && $_GET['page'] == 'profile') echo 'class="current"'; ?>><a href="<?php echo app_url; ?>profile" class="button special"><?php echo $GLOBALS['user']->getName(); ?></a></li>
						<li><a href="<?php echo app_url; ?>signout">Изход</a></li>
						<?php } ?>
					</ul>
				</nav>
			</header>