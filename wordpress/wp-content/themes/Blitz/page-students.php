<?php
/**
 * Template Name: Students
 */?>
	<?php get_header(); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="sidebar"></div>
			</div>
			<div class="col-md-8">
				<main>
					<?php if ( have_posts() ) : ?>
					<!--check if the page has content -->
					<?php while ( have_posts() ) : the_post(); ?>
					<!-- for all of the content that it has -->
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


				</main>


				<?php if( have_rows('student')): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="all-students">


							<?php while(have_rows('student')): the_row(); ?>

							<div class="student">
								<div class="row">
									<?php if(get_sub_field('photo')):?>
									<!-- if student has photo use this layout-->
									<div class="col-md-3">
										<img src="<?php the_sub_field('photo');?>" class="center-block" alt="<?php the_sub_field('first_name');?> <?php the_sub_field('last_name');?>" class="photo">
									</div>
									<div class="col-md-9">
										<div class="info">
											<h3 class="name">
												<?php the_sub_field('first_name');?>
												<?php the_sub_field('last_name');?>
											</h3>
											<div class="school">
												School: <?php the_sub_field('school');?>
											</div>
											<div class="years-on-team">
												Years on team: <?php the_sub_field('years_on_team');?>
											</div>
											<div class="roles">
												Roles: <?php the_sub_field('roles');?>
											</div>

										</div>

									</div>
									<?php else:?>
									<div class="col-md-12">
										<div class="info">
											<h3 class="name">
												<?php the_sub_field('first_name');?>
												<?php the_sub_field('last_name');?>
											</h3>
											<?php if(get_sub_field('school')):?>
											<div class="school">
												School: <?php the_sub_field('school');?>
											</div>
											<?php endif; ?>
											<?php if(get_sub_field('years_on_team')):?>
											<div class="years-on-team">
												Years on team: <?php the_sub_field('years_on_team');?>
											</div>
											<?php endif; ?>
											<?php if(get_sub_field('roles')):?>
											<div class="roles">
												Roles: <?php the_sub_field('roles');?>
											</div>
											<?php endif; ?>
										</div>

									</div>

									<?php endif;?>
								</div>
							</div>

							<?php endwhile; ?>
						</div>
					</div>

				</div>
				<?php endif;?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<?php get_footer( $name ); ?>