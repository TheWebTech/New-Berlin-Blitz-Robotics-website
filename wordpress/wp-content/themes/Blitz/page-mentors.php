<?php
/**
 * Template Name: Mentors
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


				<?php if( have_rows('mentor')): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="all-mentors">


							<?php while(have_rows('mentor')): the_row(); ?>

								<div class="mentor">
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
													<?php the_sub_field('job_title');?>
												</div>
												<div class="employer">
													<?php if(get_sub_field('employers_website')):?>
													<a href="<?php the_sub_field('employers_website');?>">
														<?php endif; ?>
														<?php the_sub_field('employers');?>
													<?php if(get_sub_field('employers_website')):?>
													</a>
													<?php endif; ?>
												</div>
													<?php if(get_sub_field('robot_doctor')):?>
														<div class="roles">
															If you were a Robot Doctor what would you specialize in?
															<br>
															<?php the_sub_field('robot_doctor');?>
														</div>
													<?php endif;?>
												
												<?php else:?>
												<div class="info">
													<h3 class="name">
													<?php the_sub_field('first_name');?>
													<?php the_sub_field('last_name');?>
												</h3>
													<div class="school">
														<?php the_sub_field('job_title');?>
													</div>
													<div class="years-on-team">
														 <?php if(get_sub_field('employers_website')):?>
														<a href="<?php the_sub_field('employers_website');?>">
															<?php endif; ?>
															<?php the_sub_field('employers');?>
															<?php if(get_sub_field('employers_website')):?>
														</a>
														<?php endif; ?>
													</div>
													<?php if(get_sub_field('robot_doctor')):?>
													<div class="roles">
														If you were a Robot Doctor what would you specialize in?
														<br>
														<?php the_sub_field('robot_doctor');?>
													</div>
															<?php endif;?>
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