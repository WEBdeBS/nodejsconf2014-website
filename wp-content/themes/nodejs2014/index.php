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

			<?php $curpage = array_shift($pages); ?>
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
					<ul id="ws-speakers">
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0000_mantione.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									Massimiliano Mantione -
									<a href="https://twitter.com/M_a_s_s_i">
										@M_a_s_s_i
									</a>
								</h3>
								<p>
									Massimiliano is a former V8 developer in Google where he worked on new optimisations for the JavaScript engine that is at the very core of NodeJS. He's also a long-time speaker and rumours says he's working on some new kind of language...
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0003_collina.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									Matteo Collina -
									<a href="https://twitter.com/matteocollina">
										@matteocollina
									</a>
								</h3>
								<p>
									Matteo Collina is a software engineer, a NodeJS developer and a well known speaker who has performed at many national and international events. He's going to share with us a special recipe including NodeJS, LevelDB and other secrets ingredients...
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0001_kezemier.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									Arnout Kazemier -
									<a href="https://twitter.com/3rdEden">
										@3rdEden
									</a>
								</h3>
								<p>
									Arnout is founder of 3rd-eden.com and observe.it and lead developer at Nodejitsu. He's also a widely recognised open source contributor to projects such as the everyone-has-used-it-at-least-once Socket.io. By the way, did you ever heard about Primus? No? That's a good reason to attend!
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0002_fernandez.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									Alex Fernández -
									<a href="https://twitter.com/pinchito">
										@pinchito	
									</a>
								</h3>
								<p>
									Alex Fernández is a Spanish software engineer and a former Java developer that wandered into the crazy world of JavaScript and Node.js. Nowadays he delivers thousands of requests per second and builds his own DevOps platform at MediaSmart Mobile. If you're curious about it just grab a ticket!
								</p>
							</div>
						</li>
					</ul>
				</div>					
			</article>

			<?php $curpage = array_shift($pages); ?>
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
						<img id="ws-logo" src="<?php echo get_stylesheet_directory_uri() ?>/img/logo-ws.png" alt="">
						<h1 id="ws-title" class="event-title title">
							<?php  echo $curpage->post_title; ?>
						</h1>
					</header>
					<div>
						<?php echo apply_filters("the_content", $curpage->post_content); ?>
					</div>
					<div id="ws-info">
						<iframe id="ws-map" width="350" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Talent+Garden+Brescia,+Via+Cipro,+Brescia,+Italy&amp;aq=1&amp;oq=talent+garden&amp;sll=37.0625,-95.677068&amp;sspn=58.816238,72.949219&amp;ie=UTF8&amp;hq=Talent+Garden&amp;hnear=Via+Cipro,+Brescia,+Lombardia,+Italy&amp;t=m&amp;cid=3778282868842465887&amp;ll=45.524751,10.210762&amp;spn=0.015033,0.029955&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
						<h3>
							When
						</h3>
						<p>
							14th December 2013
						</p>
						<h3>
							Where
						</h3>
						<p>
							Talent Garden - Brescia<br>
							Via Cipro, 66 Brescia Italy
						</p>
						<h3>
							How
						</h3>
						<p>
							<a href="http://www.eventbrite.it/e/biglietti-workshop-nodejs-conf-2013-9189422811">
								Buy your tickets
							</a>
						</p>
					</div>
					<ul id="ws-speakers">
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/lana.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									Gabriele Lana -
									<a href="https://twitter.com/gabrielelana">
										@gabrielelana
									</a>
								</h3>
								<p>
									I proudly call myself “Software Craftsman”. I began to love this profession as a child at the end of the ’80s and this feelings never left me since then. Now I have more than 15 years of professional experience in many fields such as: industrial automation (soft realtime), medical, banks, insurance, monitoring, servers for MMO realtime games, distributed search engine, mobile games, online/mobile payment platform and others.
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/paganotti.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									Sandro Paganotti -
									<a href="https://twitter.com/sandropaganotti">
										@sandropaganotti
									</a>
								</h3>
								<p>
									Sandro Paganotti (1983) is co-founder and software architect at Comparto Web. He loves developing web interfaces that showcase the full power of HTML5 and CSS3. He's author of "Designing next generation web Projects with CSS3" for Packt Publishing, technical writer for html.it, teacher at Accademia di belle arti Santa Giulia, Google Developer Expert in HTML5 and speaker at various technical events.
								</p>
							</div>
						</li>
					</ul>
				</div>					
			</article>

			<?php $curpage = array_shift($pages); ?>
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

		<article id="supportersdiv">
			<a id="<?php $curpage = array_shift($pages); $curpage = get_post($curpage->object_id); echo $curpage->post_name; ?>" class="hook">sss</a>

			<?php echo apply_filters("the_content", $curpage->post_content); ?>
		</article>

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