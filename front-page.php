<?php
/**
 * The template for displaying the frontpage.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$theme_options = get_option( 'dym_theme_options' );

?>
<div class="wrapper frontpage" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row overlap">
			<div class="col-md-7">
				<div class="row featured-report">
					<div class="col-md-7">
						<div class="featured-text">
							<h4><?php echo $theme_options['dym_homepage_report_box_text'] ?></h4>
						</div>
						<a href="http://wordpressmu-89599-418163.cloudwaysapps.com/enquiry-form" class="btn"><?php echo $theme_options['dym_homepage_report_button_text'] ?></a>
					</div>
					<div class="col-md-5 featured-ico">
						<img src="http://wordpressmu-89599-418163.cloudwaysapps.com/wp-content/uploads/2018/01/Vector-Smart-Object.png">
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12">
						<div class="consult-box">
							<h4><?php echo $theme_options['dym_homepage_consult_box_text'] ?></h4>
							<a href="#" class="btn get_my_report"><?php echo $theme_options['dym_homepage_consult_button_text'] ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row section">
			<div class="col-md-12">
				<h1 class="section-title"><?php echo $theme_options['dym_homepage_section_title'] ?></h1>
				<h5 class="section-subtitle"><?php echo $theme_options['dym_homepage_section_subtitle'] ?></h5>
				<div class="features">
					<div class="row">
						<div class="col-md-3">
							<div class="feature">
								<div class="feature-icon"><i class="fa <?php echo $theme_options['dym_homepage_section_feature_one_icon'] ?>" aria-hidden="true"></i></div>
								<div class="feature-title"><h3><?php echo $theme_options['dym_homepage_section_feature_one_heading'] ?></h3></div>
								<div class="feature-description"><p><?php echo $theme_options['dym_homepage_section_feature_one_text'] ?></p></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="feature">
								<div class="feature-icon"><i class="fa <?php echo $theme_options['dym_homepage_section_feature_two_icon'] ?>" aria-hidden="true"></i></div>
								<div class="feature-title"><h3><?php echo $theme_options['dym_homepage_section_feature_two_heading'] ?></h3></div>
								<div class="feature-description"><p><?php echo $theme_options['dym_homepage_section_feature_two_text'] ?></p></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="feature">
								<div class="feature-icon"><i class="fa <?php echo $theme_options['dym_homepage_section_feature_three_icon'] ?>" aria-hidden="true"></i></div>
								<div class="feature-title"><h3><?php echo $theme_options['dym_homepage_section_feature_three_heading'] ?></h3></div>
								<div class="feature-description"><p><?php echo $theme_options['dym_homepage_section_feature_three_text'] ?></p></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="feature">
								<div class="feature-icon"><i class="fa <?php echo $theme_options['dym_homepage_section_feature_four_icon'] ?>" aria-hidden="true"></i></div>
								<div class="feature-title"><h3><?php echo $theme_options['dym_homepage_section_feature_four_heading'] ?></h3></div>
								<div class="feature-description"><p><?php echo $theme_options['dym_homepage_section_feature_four_text'] ?></p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<?php get_template_part( 'form-parts/fp-modal' );  ?>
</div>
</div>

<?php get_footer( ); ?>


