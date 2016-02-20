<?php get_header(); ?>

		<div class="row">
			<div class="col-md-offset-1 col-md-4">
				<div class="upper-left-rich-text">
				<!-- the code that says get_template_directory_uri inserts the file path to our template -->
					<?php the_field('description');?>
				
				</div>
			</div>
			<div class="col-md-7 slideshow">
				<!-- the code below is from our wordpress slideshow plugin, to edit the slide show sign into the back end-->
		<?php 
echo do_shortcode('[smartslider3 slider=3]');
?>
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
				<?php the_field('about_frc') ?>
				
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