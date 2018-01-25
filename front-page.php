<?php
/**
 * The template for displaying the frontpage.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>
<div class="wrapper frontpage" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row overlap">
			<div class="col-md-7">
				<div class="row featured-report">
					<div class="col-md-7">
						<div class="featured-text">
							<h4>Get your 
							<strong class="light">free report</strong>
							from your area expert 
							on todays market Conditions</h4>
						</div>
						<a href="#" class="btn">Get My Report Now</a>
					</div>
					<div class="col-md-5 featured-ico">
						<img src="http://localhost/glen/wp-content/uploads/2018/01/Vector-Smart-Object.png">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12">
						<div class="consult-box">
							<h4>Get a FREE
							<strong class="dark">30 minute consult</strong>
							<strong>From your Expert</strong>
							on todays market Conditions</h4>
							<a href="#" class="btn">Get My Report Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row section">
			<div class="col-md-12">
				<h1 class="section-title">
					Whats Included
				</h1>
				<h5 class="section-subtitle">
					We will also provide you
				</h5>
				<div class="features">
					<div class="row">
						<div class="col-md-4">
							<div class="feature">
								<div class="feature-icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
								<div class="feature-title"><h3>Speed up Development</h3></div>
								<div class="feature-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature">
								<div class="feature-icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
								<div class="feature-title"><h3>Speed up Development</h3></div>
								<div class="feature-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature">
								<div class="feature-icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
								<div class="feature-title"><h3>Speed up Development</h3></div>
								<div class="feature-description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php get_footer( ); ?>


