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
		<script src="<?php echo get_stylesheet_directory_uri() ?>/vendor/prefixfree.min.js"></script>

		<?php wp_head(); ?>
	</head>
	<body>

		<div class="mostro-box">

			<!-- titolo -->
			<h1 class="main-title">
				<?php echo preg_replace("/_([^_]+)_/","<em>\$1</em>",get_bloginfo('description')); ?>
			</h1>

			<!-- thanks! -->
			<p style="display:none;" class="thanks-title">Thanks! Check your inbox for a welcome message.</p>

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

			<article id="intro">
				<a id="<?php $curpage = array_shift($pages); $curpage = get_post($curpage->object_id); echo $curpage->post_name; ?>" class="hook">sss</a>

				<header>
					<h1 class="title">
						<?php  echo $curpage->post_title; ?>
					</h1>
				</header>
				<div>
					<?php echo apply_filters("the_content", $curpage->post_content); ?>
				</div>			
			</article>

			<article id="conf-description">
				<a id="<?php $curpage = array_shift($pages); $curpage = get_post($curpage->object_id); echo $curpage->post_name; ?>" class="hook">sss</a>

				<header>
					<h1 class="title">
						<?php  echo $curpage->post_title; ?>
					</h1>
				</header>
				<div>
					<?php echo apply_filters("the_content", $curpage->post_content); ?>
				</div>			
			</article>

			<?php foreach ($pages as $curpage) { ?>
				<article class="event">
					<a id="<?php $curpage = get_post($curpage->object_id); echo $curpage->post_name; ?>" class="hook"></a>

					<div class="event-content">
						<header>
							<h2 class="event-date">
								<?php echo get_post_meta($curpage->ID, 'event-day', true); ?>
								<span class="event-year">
									<?php echo get_post_meta($curpage->ID, 'event-year', true); ?>
								</span>	
							</h2>
							<h1 class="event-title title">
								<?php  echo $curpage->post_title; ?>
							</h1>
						</header>
						<div>
							<?php echo apply_filters("the_content", $curpage->post_content); ?>
						</div>
					</div>					
				</article>
			<?php } ?>

		</div>
		<div id="slides">
			<?php 
				$attachments = get_attachments_by_id($post->ID);
				foreach ($attachments as $attachment):
					$attributes = wp_get_attachment_image_src($attachment->ID, "gallery");
			?>
				<img src="<?php echo $attributes[0]; ?>" alt="">
			<?php
				endforeach;
			?>
		</div>
		<div id="slides-pagination"></div>

		<div id="footer-container">
			<footer id="footer">
				<div id="call-for-paper">
					<p>
						Follow us to stay tuned with the latest updates about call for paper, registration and 
						more! 
					</p>
					<ul id="social">
						<li>
							<a target="_blank" href="https://twitter.com/nodejsconfit" title="">
								Twitter
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.facebook.com/nodejsconf" title="">
								Facebook
							</a>
						</li>
					</ul>
				</div>
			</footer>
		</div>

		<!-- javascript -->
		<script data-main="<?php echo get_stylesheet_directory_uri() ?>/js/application.js" 
				src="<?php echo get_stylesheet_directory_uri() ?>/vendor/require.js">
		</script>

		<!-- footer -->
		<?php wp_footer(); ?>
	</body>
</html>