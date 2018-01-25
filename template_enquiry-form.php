<?php /* Template Name: Enquiry Form */ ?>

<?php get_header( ); ?>

<?php $container   = get_theme_mod( 'understrap_container_type' ); ?>

<div class="wrapper frontpage" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row overlap">
			<div class="col-md-12">
				<div class="enquiry-template">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

					<br>
					<h3 class="sep">About Your Property</h3>
					<p class="term">Required Fields to provide you with your FREE online property report.</p>
					<form action="<?php the_permalink(); ?>" method="post" class="enquiry-form">
						<div class="row">
							<!-- Property Type -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-property-type' );  ?>
							</div>
							<!-- Unit and Street-->
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<?php get_template_part( 'form-parts/ef-unit' );  ?>
									</div>
									<div class="col-md-6">
										<?php get_template_part( 'form-parts/ef-street' );  ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- Bedrooms -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-bedrooms' );  ?>
							</div>
							<!-- Street Name -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-street-name' );  ?>
							</div>							
						</div>
						<div class="row">
							<!-- Bathrooms -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-bathrooms' );  ?>
							</div>
							<!-- Suburbs -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-suburbs' );  ?>
							</div>							
						</div>
						<div class="row">
							<!-- Condition -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-conditions' );  ?>
							</div>
							<!-- State -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-state' );  ?>
							</div>							
						</div>
						<div class="row">
							<!-- Est Size -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-est-size' );  ?>
							</div>
							<!-- Relationship to Property -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-property-relationship' );  ?>
							</div>							
						</div>
						<div class="row">
							<!-- Parking -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-parking' );  ?>
							</div>
							<!-- Purpose of Request -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-purpose-of-request' );  ?>
							</div>							
						</div>
						<div class="row">
							<!-- Special Features -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-special-features' );  ?>
							</div>
							<!-- Currently Listed -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-currently-listed' );  ?>
							</div>
						</div>
						<div class="row">
							<!-- Other -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/ef-other' );  ?>
							</div>
						</div>
						<div class="mt-5">
							<h3 class="sep">About Your Property</h3>
							<br>
							<div class="row">
								<!-- First Name -->
								<div class="col-md-6">
									<?php get_template_part( 'form-parts/ef-first-name' );  ?>
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<?php get_template_part( 'form-parts/ef-email' );  ?>
								</div>
							</div>
							<div class="row">
								<!-- Surname -->
								<div class="col-md-6">
									<?php get_template_part( 'form-parts/ef-surname' );  ?>									
								</div>
								<!-- Confirm Email -->
								<div class="col-md-6">
									<?php get_template_part( 'form-parts/ef-confirm-email' );  ?>
								</div>
							</div>
							<div class="row">
								<!-- Telephone -->
								<div class="col-md-6">
									<?php get_template_part( 'form-parts/ef-telephone' );  ?>
								</div>
							</div>
							<br>
							<div class="row">
								<!-- Terms and Conditions -->
								<div class="offset-md-2 col-md-10">
									<?php get_template_part( 'form-parts/ef-terms-and-submit' );  ?>									
								</div>
							</div>
							<div class="row">
								<!-- Terms Text -->
								<div class="offset-md-2 col-md-10">
									<?php get_template_part( 'form-parts/ef-terms-text' );  ?>	
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer( ); ?>

