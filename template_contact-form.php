<?php /* Template Name: Contact Form */ ?>

<?php get_header( ); ?>

<?php $container   = get_theme_mod( 'understrap_container_type' ); ?>

<div class="wrapper frontpage" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row overlap">
			<div class="col-md-12">
				<div class="enquiry-template">
					<h3 class="sep">Get in Touch</h3>
					<br>
					<form action="<?php the_permalink(); ?>" method="post" class="enquiry-form">
						<div class="row">
							<!-- Name -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/cf-name' );  ?>
							</div>
							<!-- Email-->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/cf-email' );  ?>
							</div>
						</div>
						<div class="row">
							<!-- Phone -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/cf-phone' );  ?>
							</div>
							<!-- Address -->
							<div class="col-md-6">
								<?php get_template_part( 'form-parts/cf-address' );  ?>
							</div>							
						</div>	
						<div class="row">
							<!-- Phone -->
							<div class="col-md-12">
								<?php get_template_part( 'form-parts/cf-message' );  ?>
							</div>						
						</div>					
						<br>
						<div class="row">
							<!-- Terms and Conditions -->
							<div class="col-md-12">
								<?php get_template_part( 'form-parts/cf-submit' );  ?>									
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer( ); ?>

