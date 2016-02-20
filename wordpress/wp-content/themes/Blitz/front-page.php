<?php get_header(); ?>
<div class="container">
		<div class="row">
			<div class="col-md-4">
				<!-- the code that says get_template_directory_uri inserts the file path to our template -->
				<img src="<?php echo get_template_directory_uri ()?>/images/image NB blitz.png" alt="Bootstrap Image Preview" width="174" class="center-block">
				<p>
					New Berlin Blitz is a joint FRC team between two schools: New Berlin West and New Berlin Eisenhower. The team was formed in 2013 and has been growing and developing since.
				</p>
			</div>
			<div class="col-md-8 slideshow">
				<!-- the code below is from our wordpress slideshow plugin, to edit the slide show sign into the back end-->
		<?php 
echo do_shortcode('[smartslider3 slider=3]');
?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12"><?php $uploads = wp_upload_dir();?>
			<img alt="Hexagonal horizontal rule" src="<?php echo get_site_url(); ?>
/wp-content/<?php echo wp_basename($uploads['baseurl'] );?>/2016/02/hexagon-horizontal-rule-01.svg">
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img alt="FIRST Logo" src="<?php echo get_template_directory_uri ()?>/images/FIRST_Horz_RGB.png" class="img-responsive">
				<p>
					Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et,
					pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum
					nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
				</p>
			</div>
			<div class="col-md-6">

				<!-- we need to talk to zach or Ms. Mckinnon to find out who has the twitter login info in order to get this to work.-->
				<?php echo do_shortcode( '[timeline-twitter-feed]' ); ?>

			</div>
		</div>
</div>	

		<div class="row">
			<div class="col-md-12">
				<!--the PHP code below pulls all of our sponsors logos from the sponsors page and displays them here -->
<?php

$sponsor_page = 16;

?>
<?php if( have_rows('sponsor',$sponsor_page) ): ?>

	<div class="sponsor-logo-parade">

	<?php while( have_rows('sponsor',$sponsor_page) ): the_row(); 

		// vars
		
		$link = get_sub_field('link_to_sponsors_website');

		?>

		<div class="logo-wrapper">

			<?php if( $link ): ?>
				<a href="<?php the_sub_field('link_to_sponsors_website');?>" target="_blank">
			<?php endif; ?>

				<img class="center-block" src="<?php the_sub_field('sponsor_logo'); ?>" alt="<?php the_sub_field('sponsor_name'); ?>" />

			<?php if( $link ): ?>
				</a>
			<?php endif; ?>

		  

		</div>

	<?php endwhile; ?>

	</div>

<?php endif; ?>
			</div>
		</div>
		

<?php get_footer( $name ); ?>