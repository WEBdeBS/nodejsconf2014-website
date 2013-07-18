<?php
	$locations = get_nav_menu_locations();
	$pages = wp_get_nav_menu_items($locations['primary_menu']);
?>
<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class=""> <!--<![endif]-->
	<head>
		<title><?php bloginfo('name') ?></title>

		<!-- meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >

		<!-- stylesheet -->
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" 
					type="text/css" 
					href="<?php echo get_stylesheet_directory_uri() ?>/style.css"
		>

		<!-- modernizr -->
		<script src="<?php echo get_stylesheet_directory_uri() ?>/vendor/modernizr.js"></script>

		<?php wp_head(); ?>
	</head>
	<body>

		<div class="mostro-box">

			<!-- titolo -->
			<h1 class="main-title">
				<?php echo preg_replace("/_([^_]+)_/","<em>\$1</em>",get_bloginfo('description')); ?>
			</h1>

			<!-- Begin LaunchRock Widget -->
			<div id="lr-widget" rel="MTBE93HI"></div>
			<script type="text/javascript" src="//ignition.launchrock.com/ignition-current.min.js"></script>
			<!-- End LaunchRock Widget -->

			<!-- mostri -->
			<canvas id="monsters-canvas" data-processing-sources="<?php echo get_stylesheet_directory_uri() ?>/pde/monsters.pde"></canvas>

		</div>

		<div id="header-container">
			<header id="header">

				<?php wp_nav_menu(array(  
					'theme_location' => 'primary_menu',
					'container' => 'nav',
					'container_id' => 'navigation',
					'menu_id' => 'menu'
				)); ?>

				<a href="/" title="<?php bloginfo('name') ?>">
					<img id="logo" src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.png" alt="<?php bloginfo('name') ?>">
				</a> 	
			</header>
		</div>
		<div id="main">

			<article id="intro" data-load="<?php $curpage = array_shift($pages); echo get_permalink($curpage->object_id); ?>">
			</article>

			<article id="conf-description" data-load="<?php $curpage = array_shift($pages); echo get_permalink($curpage->object_id); ?>">
			</article>

			<?php foreach ($pages as $curpage) { ?>
				<article class="event" data-load="<?php echo get_permalink($curpage->object_id); ?>">
				</article>
			<?php } ?>

		</div>
		<div id="slides">
			<div class="slide">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
			</div>
			<div class="slide">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
			</div>
			<div class="slide">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cirpo.png" alt="">
			</div>
		</div>
		<div id="footer-container">
			<footer id="footer">
				<div id="call-for-paper">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a eros tortor. Nunc ipsum erat, cursus et dictum vitae, bibendum at tortor. Vivamus aliquam, nibh eu feugiat lacinia, sapien leo placerat urna, at vulputate purus mi et libero. Proin vel ullamcorper massa. Donec sollicitudin fringilla nunc, ac egestas ligula ultrices nec. Proin quis tortor non erat faucibus eleifend. Ut luctus arcu nisl, id varius elit egestas at.
					</p>
					<ul id="social">
						<li>
							<a href="#" title="">
								Twitter
							</a>
						</li>
						<li>
							<a href="#" title="">
								Facebook
							</a>
						</li>
					</ul>
				</div>
				<span>
					Social
				</span>
				<span>
					Seguici
				</span>
			</footer>
		</div>

		<!-- javascript -->
		<script src="<?php echo get_stylesheet_directory_uri() ?>/vendor/prefixfree.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri() ?>/vendor/jquery.slides.min.js"></script>
		<script data-main="<?php echo get_stylesheet_directory_uri() ?>/js/application.js" 
				src="<?php echo get_stylesheet_directory_uri() ?>/vendor/require.js">
		</script>

		<!-- footer -->
		<?php wp_footer(); ?>
	</body>
</html>