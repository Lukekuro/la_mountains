<?php
/**
 * Mountain builder part
 *
 * @package la_mountainser
 */

$title_of_schedule = get_sub_field( 'title_of_schedule' );

$list_of_la_mountains = get_sub_field( 'list_of_mountains' );
if ( ! $list_of_la_mountains ) {
	$args  = [
		'post_type'      => 'mountain',
		'posts_per_page' => 10,
		'order'          => 'ASC',
	];
	$query = new WP_Query( $args );
	if ( $query->posts ) {
		$list_of_la_mountains = $query->posts;
	}
}

?>
<section class="m-mountain">
	<div class="container">
		<?php get_template_part( 'template-parts/builder/components/title_text' ); ?>
	</div>

	<?php if ( $list_of_la_mountains ) : ?>
		<div class="js-tabs tabs">
			<div class="tabs__main-titles">
				<div class="container">
					<div class="tabs__titles">
						<?php $i = 0; foreach ( $list_of_la_mountains as $post_ids ) :
							$title = get_the_title( $post_ids );
							?>
							<?php if ( $title && have_rows( 'schedule', $post_ids ) ) : ?>
								<h5 data-item="tab-<?php echo $i; ?>" class="js-tab-title<?php echo $i === 0 ? ' is-active' : ''; ?>">
									<?php echo wp_kses_post( $title ); ?>
								</h5>
							<?php endif; ?>
						<?php $i++; endforeach; ?>
					</div>
				</div>
			</div>

			<div class="tabs__contents">
				<?php $i = 0; foreach ( $list_of_la_mountains as $post_ids ) :
					$bg_image = get_post_thumbnail_id( $post_ids );
					?>
					<?php if ( have_rows( 'schedule', $post_ids ) ) : ?>
						<div class="js-tab-content<?php echo $i === 0 ? ' is-active' : ''; ?>" id="tab-<?php echo $i; ?>">
							
							<?php if ( has_post_thumbnail( $post_ids ) ) : ?>
								<div class="tabs__contents__bg">
									<?php echo wp_get_attachment_image( $bg_image, 'full', false, [ 'class' => 'img-cover' ] ); ?>
								</div>
							<?php endif; ?>

							<div class="container">
								<div class="tabs__contents__block">
									<?php if ( $title_of_schedule ) : ?>
										<h2 class="color-primary">
											<?php echo wp_kses_post( $title_of_schedule ); ?>
										</h2>
									<?php endif; ?>

									<div class="tabs__contents__list">
										<?php while ( have_rows( 'schedule', $post_ids ) ) : the_row(); 
											$date          = get_sub_field( 'date' );
											$team          = get_sub_field( 'team' );
											$other_team    = get_sub_field( 'other_team' ); 
											$today         = new DateTime();
											$datetime_date = new DateTime($date);
											$today->setTime(0, 0, 0);
											$datetime_date->setTime(0, 0, 0);
											?>

											<?php if ( $date && ( $today <= $datetime_date ) ) : ?>
												<div class="items">
													<span>
														<?php echo wp_kses_post( $date ); ?>
													</span>

													<?php if ( $team || $other_team ) : ?>
														<span>
															<?php if ( $team !== 'other' ) : ?>
																<?php echo $team; ?>
															<?php else: ?>
																<?php if ( $other_team ) : ?>
																	<?php echo wp_kses_post( $other_team ); ?>
																<?php endif; ?>
															<?php endif; ?>
														</span>
													<?php endif; ?>
												</div>
											<?php endif; ?>

										<?php endwhile; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php $i++; endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</section>