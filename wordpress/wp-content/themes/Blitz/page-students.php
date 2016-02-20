<?php get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-md-4">
		<div class="sidebar"></div>
		</div>
		<div class="col-mid-8">
		<main>
				<?php if ( have_posts() ) : ?><!--check if the page has content -->
					<?php while ( have_posts() ) : the_post(); ?><!-- for all of the content that it has -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


						<header class="entry-header">
							<?php if ( is_single() ) : the_title( '<h1 class="entry-title">', '</h1>' ); else : the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' ); endif; ?>
						</header>
						<!-- .entry-header -->

						<div class="entry-content">
							<?php /* translators: %s: Name of current post */ the_content( sprintf( the_title( '<span class="screen-reader-text">', '</span>', false ) ) ); ?>
						</div>
						<!-- .entry-content -->

						<?php // Author bio. if ( is_single() && get_the_author_meta( 'description' ) ) : get_template_part( 'author-bio' ); endif; ?>

						<footer class="entry-footer">

							<?php edit_post_link(); ?>
						</footer>
						<!-- .entry-footer -->

					</article>
					<!-- #post-## -->

					<?php endwhile; ?>
					<?php endif; ?>
			</main>
			
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
	</div>
</div>

<?php get_footer( $name ); ?>