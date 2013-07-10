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

			<!-- mostri -->
			<canvas data-processing-sources="<?php echo get_stylesheet_directory_uri() ?>/pde/monsters.pde"></canvas>

		</div>


		<!-- javascript -->
		<script data-main="<?php echo get_stylesheet_directory_uri() ?>/js/application.js" 
						src="<?php echo get_stylesheet_directory_uri() ?>/vendor/require-jquery.js">
		</script>

		<!-- footer -->
		<?php wp_footer(); ?>
	</body>
</html>