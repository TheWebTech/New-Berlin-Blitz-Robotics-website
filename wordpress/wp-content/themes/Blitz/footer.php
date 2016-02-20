<!-- beginning of footer -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img src="<?php echo get_template_directory_uri ()?>/images/image NB blitz.png" alt="Bootstrap Image Preview" width="174" class="center-block">
				</div>
			</div>
			<div class="row">
				<!-- social media icons -->
				<div class="col-md-6">
					<i class="fa fa-facebook"></i>
					</div>
				<div class="col-md-6">
					<i class="fa fa-twitter"></i>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="footer-copyright">
						<p>Copyright New Berlin Blitz
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- javascript files get placed just before the </body> (makes pages load faster)-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!--The script below allows us to use some of the javascript features of bootstrap to learn more http://getbootstrap.com/javascript/ -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri ()?>/scripts.js"></script>
	<!-- this allows wordpress(our back-end) to insert code at the bottom of our template if needed-->
	<?php wp_footer(); ?>

</body>

</html>