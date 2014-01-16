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
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

		<?php wp_head(); ?>

		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-46921107-1']);
		  _gaq.push(['_setDomainName', 'nodejsconf.it']);
		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(function() {
		    var pageTracker = _gat._getTrackerByName();
		    var iframe = document.getElementById('myIFrame');
		    iframe.src = pageTracker._getLinkerUrl('http://www.eventbrite.it/tickets-external?eid=9509179211&ref=etckt&v=2');
		  });

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>		
	</head>
	<body>

		<div class="mostro-box">

			<!-- titolo -->
			<h1 class="main-title">
				<?php echo preg_replace("/_([^_]+)_/","<em>\$1</em>",get_bloginfo('description')); ?>
			</h1>

			<div class="eventbrite">
				<a href="https://www.eventbrite.it/e/biglietti-nodejs-conf-it-2014-9509179211?ref=ebtnebtckt" target="_blank" onclick="_gaq.push(['_trackEvent', 'Click Out', 'Eventbrite']);_gaq.push(['_link', 'https://www.eventbrite.it/e/biglietti-nodejs-conf-it-2014-9509179211?ref=ebtnebtckt']); return false;
"><img src="http://www.eventbrite.com/custombutton?eid=9509179211" alt="Eventbrite - NodeJS Conf It 2014"></a>
			</div>

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
					<div class="event-title title">
						The Agenda!
					</div>
					<ul id="ws-speakers">
						<li>
							<div class="ws-speaker-bio">
								<h3>08:30 - 09:00: Registration</h3>
							</div>
						</li>
						<li>
							<div class="ws-speaker-bio">
								<h3>09:00 - 09:20: Welcome!</h3>
							</div>
						</li>						
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0002_fernandez.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									9:30 - 10:10: Alex Fernández -
									<a href="https://twitter.com/pinchito">
										@pinchito	
									</a>
								</h3>
								<h4>Scalability Lessons: Beyond 10K Requests per Second</h4>
								<p>
									For a startup with limited resources, scaling beyond 10K requests per second presents some unique technical challenges. In this talk I review some of the issues that we have faced while scaling our platform to five countries, tens of servers, and several MM requests per month.
								</p>
							</div>
						</li>					
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0000_mantione.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									10:20 - 11:00: Massimiliano Mantione -
									<a href="https://twitter.com/M_a_s_s_i">
										@M_a_s_s_i
									</a>
								</h3>
								<h4>Metascript: going beyond Javascript limitations</h4>
								<p>
									We all know that Javascript is not a perfect programming language, and several projects (Cofeescript, Typescript and many others) are addressing this problem.
									Each of them tries to solve one particular issue, and the problem I have with them is that I want all of them, plus a real metaprogramming framework (that almost none of them offers).
									Metascript is a new programming language that compiles to Javascript and tries to solve exactly these problems.
									In the talk I will give an overview of the language and show how metaprogramming can be used to provide solutions to issues like the nesting of functions in CPS code, clean "class" constructor definitions, dependency injection and others.
								</p>
							</div>
						</li>
						<li>
							<div class="ws-speaker-bio">
								<h3>11:00 - 11:30: Coffee Break</h3>
							</div>
						</li>						
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker_0000s_0000_bruyen.png" alt="">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker_0000s_0001_matrat.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									11:30 - 12:10: Mathieu Bruyen and Fabrice Matrat -
									<a href="https://twitter.com/mathbruyen">
										@mathbruyen	
									</a> <a>and</a>
									<a href="https://twitter.com/fabricematrat">
										@fabricematrat	
									</a>									
								</h3>
								<h4>
									World in conflict: my app is online!
								</h4>
								<p>
									You want your mobile JavaScript application to perfectly run as the user gets lost in the middle of the jungle. 
									How to use HTML5 offline capabilities in order for the application to locally progress?
									And then what happens when the user gets back to civilization? 
									Local modifications have to be sent to the backend and external changes must be visible. 
									How to synchronize server and client stores?
									In this session we will cover offline applications, algorithmic approach to synchronization, conflict issues and merge solutions.
									<br/><br/>
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0001_kezemier.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									12:20 - 13:00: Arnout Kazemier -
									<a href="https://twitter.com/3rdEden">
										@3rdEden
									</a>
								</h3>
								<h4>
									Transforming real-time with Primus
								</h4>
								<p>
									Primus is here to transform the way we build our real-time applications. Ever had to rewrite your app because the framework you used died, failed in production or your boss wanted to add feature Y? Primus solves that, it can transparently switch between SockJS, Engine.IO, SockJS and even pure WebSockets. With 1 Line Of Code.
									I've been core contributor to Socket.IO for a couple of years, co-maintainer of the populair `ws` library and now the creative mind behind. I've been at the front-line when it comes to real-time adoption and development and know how horrible it is to rewrite your application because the Open Source framework you're using was only designed for small projects instead of large scale production. Let me take you on journey where you'll learn about the problems of building a real-time application and how Primus solves these for you.
								</p>
							</div>
						</li>
						<li>
							<div class="ws-speaker-bio">
								<h3>13:00 - 14:10: Lunch</h3>
							</div>
						</li>																	
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/speaker__0000s_0003_collina.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									14:10 - 14:50: Matteo Collina -
									<a href="https://twitter.com/matteocollina">
										@matteocollina
									</a>
								</h3>
								<h4>
									How to cook a Graph database in a Night
								</h4>
								<p>
									Open Source is truly amazing. New packages are published every day, but I fell in love with LevelDB and LevelUp. LevelDB is an embeddable Key-Value store built by the Google’s engineers that built BigTable. LevelUp is the simplest API for reading such a database. Then, I decided to build a Graph database on top of them, LevelGraph.
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/MikeMcNeil.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									15:00 - 15:40: Mike McNeil -
									<a href="https://twitter.com/mikermcneil">
										@mikermcneil
									</a>
								</h3>
								<h4>
									Intro to Sails.js
								</h4>
								<p>
									In this talk, I give a brief introduction to Sails.js, a realtime, server-side MVC framework for Node.js. I’ll point out some of the problems that Node.js developers face when trying to build apps from scratch, and show how Sails helps solve them. I’ll also live-code examples of some tasks that are simplified by Sails.js. 
									Sails is an open-source framework built on top of Express, Socket.io, and other industry-standard node modules.  It is designed to resemble the MVC architecture from frameworks like Ruby on Rails, but with support for the more modern, data-oriented style of web app development. It’s aim is to make Node.js practical for production applications, by providing a familiar structure for an app’s back-end while remaining unopinionated about the front-end as well as database-agnostic. It’s especially good for creating realtime features,  such as chat.
								</p>
							</div>
						</li>
						<li>
							<div class="ws-speaker-bio">
								<h3>15:40 - 16:10: Coffee Break</h3>
							</div>
						</li>						
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/ForbesLindesay.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									16:10 - 16:50: Forbes Lindesay -
									<a href="https://twitter.com/ForbesLindesay">
										@ForbesLindesay
									</a>
								</h3>
								<h4>
									Patterns of Promise Use
								</h4>
								<p>
									So you've looked at making the switch from callbacks to promises, Maybe you've dipped your toe in the water and tried promises in a few places but you keep finding places where you've built the callback solution before and you're not quite sure how to do it with promises.
									This talk will cover many different patterns for using promises to solve simple application problems.  It will give you the why, not just the how, so you can extend these principles to develop patterns of your own.
								</p>
							</div>
						</li>											
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/MatteoBrunati.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									17:00 - 17:40: Matteo Brunati
								</h3>
								<h4>
									NodeJS Enterprise Apps - A Project Manager PoV
								</h4>
								<p>
The talk would like to be an overview of the use of NodeJS framework in CyBrain, since we chose it as our main framework to build Enterprise oriented applications.
We would like to share with the crowd these aspects of the everyday work with NodeJS based on our experience:<br/>
Why we chose NodeJS for our applications,<br/>
How to deal with the bad acceptance of (most of the time) unkown new technologies in the Enterprise - like NodeJS, MongoDB, ecc.<br/>
How to organize a NodeJS enterprise app: scalability, frameworks, DBs, testing,<br/>
How to organise apps, both server side only and web apps,<br/>
Concurrency and/vs Parallelism with NodeJS,<br/>
Pseudo real-time and/vs CPU intensive work: JS and C/C++, some real-world examples,<br/>
How to integrate in the NodeJS team people without NodeJS know how - i.e. JS programming skills, asynchronous programming skills, etc.<br/>
Developement tools: IDE, workflow tools, VCS, Continuous Integration, programming languages
								</p>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/img/alvaro_videla.png" alt="">
							<div class="ws-speaker-bio">
								<h3>
									17:50 - 18:30: Alvaro Videla - 
									<a href="https://twitter.com/old_sound">
										@old_sound
									</a>	
								</h3>
								<h4>
									Building a Distributed Data Ingestion System with RabbitMQ
								</h4>
								<p>
Your company has servers distributed around the world and you need to process data in a centralised location. The data is produced by applications using different technology stacks and comes from various sources, from web servers to sensors. How could you solve this problem? Enter RabbitMQ.
In this talk we are going to show how to build a system that can ingest data produced at separate geo located areas (think AWS and it's many regions) and replicate it to a central cluster where it can be further processed and analysed.
We will present an example of how to build a system like this one by using RabbitMQ Federation to replicate data across AWS Regions and RabbitMQ support for many protocols to produce/consume data.
To help with scalability we are going to show an interesting way to implement sharded queues with RabbitMQ by using the Consistent Hash Exchange.
If you want to learn what else has RabbitMQ to offer beyond simple messaging and queueing, then this is the talk for you.								</p>
							</div>
						</li>						
						<li>
							<div class="ws-speaker-bio">
								<h3>18:30 - 18:45: Thanks and Goodbye!</h3>
							</div>
						</li>						
					</ul>
					<div class="event-title title">
						Buy your tickets!
					</div>
					<div style="width:100%; text-align:left;" ><iframe id="myIFrame" src="http://www.eventbrite.it/tickets-external?eid=9509179211&ref=etckt&v=2" frameborder="0" height="261" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe><div style="font-family:Helvetica, Arial; font-size:10px; padding:5px 0 5px; margin:2px; width:100%; text-align:left;" ><a style="color:#ddd; text-decoration:none;" target="_blank" href="http://www.eventbrite.it/r/etckt">Registrazione dell'evento online</a><span style="color:#ddd;"> per </span><a style="color:#ddd; text-decoration:none;" target="_blank" href="https://nodejsconfit2014.eventbrite.it/?ref=etckt">NodeJS Conf It 2014</a> <span style="color:#ddd;">con tecnologia</span> <a style="color:#ddd; text-decoration:none;" target="_blank" href="http://www.eventbrite.it?ref=etckt">Eventbrite</a></div></div>
					<div class="event-title title">
						Hotel agreements
					</div>
					<ul id="hotels">
						<li>
							<div class="hotel">
								<h3>
									Hotel Cristallo <span>***</span>
								</h3>
								<p>
									Viale della Stazione, 12A<br>
									25122 Brescia<br>
									Italy
								</p>
								<h4>
									Conventions
								</h4>
								<p>
									The hotel will apply following prices for NodeJS Conf convention:<br>
									<b>single</b> room € 50,00<br>
									<b>double</b> room € 70,00<br>
									<b>triple</b> room € 90,00
								</p>
								<h4>
									Contacts
								</h4>
								<p>
									you can book your room <a href="http://www.hotelcristallobrescia.com/eng/prenotazione-eng.htm">here</a>
								</p>
							</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m5!3m3!1m2!1s0x4781766e48433fe1%3A0x9e10fa0c8bf9049b!2sHotel+Cristallo%2C+brescia!5e0!3m2!1sen!2s!4v1388743036693" width="400" height="300" frameborder="0" style="border:0"></iframe>
						</li>
						<li>
							<div class="hotel">
								<h3>
									NH Hotel Brescia <span>****</span>
								</h3>
								<p>
									Viale della Stazione, 15<br>
									25122 Brescia<br>
									Italy
								</p>
								<h4>
									Conventions
								</h4>
								<p>
									Thanks to the NodeJS Confconvention, the hotel will apply a <b>discount of 15% on room rates</b>.
								</p>
								<h4>
									Contacts
								</h4>
								<p>
									you can book your room by calling +3903044221 asking to get the agreed special price
								</p>
							</div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1397.4169030051944!2d10.213322190063904!3d45.53354985324733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x676a661f9f3c492d!2sNh+Brescia+Hotel!5e0!3m2!1sen!2s!4v1388743083684" width="400" height="300" frameborder="0" style="border:0"></iframe>
						</li>
					</ul>
					<div class="event-title title">
						The venue
					</div>	
					<div id="venue-pictures">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/venue_1.jpg" alt="">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/img/venue_2.jpg" alt="">
					</div>
					<p id="venue">
						Centro Pastorale Paolo VI a Brescia The conference will be held at Centro Paolo VI in Brescia, a large and modern congress center located within a beautiful palace from the 1500, close to the city historical center.<br><br>
						We chose this venue because of its position, <strong>easy to reach</strong> both by train and by car, but primarily for the size of its meeting rooms, with the aim to accommodate as many attendees as possible.<br><br>
						The main room can seat up to 190 people, there are also other spaces which suits well for chatting, discussions and feedbacks. The beautiful cloister is going to host (weather permitting) lunch and coffee breaks.<br><br>
						<u>The address is Via Calini 30 - Brescia.</u>
					</p>
					<div class="event-title title">
						Directions
					</div>	
					<iframe id="directions" src="https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d2794.808222020641!2d10.219464448710106!3d45.53406465979114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!1i0!3e3!4m3!3m2!1d45.5330618!2d10.2123262!4m5!1s0x478176113971fad3%3A0x7a51c32e355c04f6!2sVia+Gezio+Calini%2C+30%2C+25121+Brescia+BS%2C+Italy!3m2!1d45.5348142!2d10.228482099999999!5e0!3m2!1sen!2s!4v1388741415944" width="640" height="450" frameborder="0" style="border:0"></iframe>
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