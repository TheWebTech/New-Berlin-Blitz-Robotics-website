<!DOCTYPE html>
<html <?php language_attributes(); ?>class="no-js">
<!--beginning of header -->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
	<title>
		<?php wp_title(); ?>
	</title>
	<!-- our site's title is controlled in the back end-->

	<meta name="description" content="">
	<meta name="author" content="Students of New Berlin">
	<!-- below is a reference to bootstrap, this is what makes the rows and columns of our site work to learn more go to http://getbootstrap.com/css/ -->
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|Cabin+Condensed:400,700' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
		crossorigin="anonymous">
	<!-- below is the link to our stylesheet, where we  make things look prettyrific, css styles go in that file -->

	<link href="<?php echo get_template_directory_uri ()?>/style.css" rel="stylesheet">
	<script>new WOW().init();</script>
	
	
	
	<?php wp_head(); ?><!-- this code allows Wordpress to insert things into the header like stylesheets-->
</head>

<body <?php body_class(); ?>>
	<div class="bar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo-container wow bounceIn">

						<a class="" href="<?php echo home_url()?>"><!-- home_url prints the websites home page address -->
					<img src="<?php echo get_template_directory_uri ()?>/images/image NB blitz.png" class="header-logo" width="84">
					<span class="logo-text">
						<?php bloginfo('name'); ?><!-- this code prints the site name in wordpress settings "New Berlin Blitz Robotics" -->
					</span>
						</a>
						</div>
					

				</div>
			</div>
		</div>
	</div>
	<div class="main-menu">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default wow lightSpeedIn" data-wow-delay="0.5s" role="navigation">
						<div class="navbar-header">

							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<!-- this generates the site's menu, to add links to the menu, sign in and go to appearance > Menus -->

							<?php wp_nav_menu( array( 
								'theme_location'=>'top_menu',
								'depth' => 2,
								'container' => false,
								'menu_class' => 'nav navbar-nav',
								'fallback_cb' => 'wp_page_menu',
								'walker' => new wp_bootstrap_navwalker()) ); ?>

						</div>

					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- end of header -->