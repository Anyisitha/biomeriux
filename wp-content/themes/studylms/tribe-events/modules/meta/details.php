<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */
?>


<?php
do_action( 'tribe_events_single_meta_details_section_start' );

$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

// All day (multiday) events
if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
	?>
	<div class="date_wrapper">
		<div class="media upper">
			<div class="media-left">
				<i class="mn-icon-1111"></i>
			</div>
			<div class="media-body ">
				<div class="media-info-inner">
					<h3><?php echo esc_html__('Start Time :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php echo esc_html( $start_date ) ?>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="date_wrapper">
		<div class="media ">
			<div class="media-left">
				<i class="mn-icon-1216"></i>
			</div>
			<div class="media-body">
				<div class="media-info-inner">
					<h3 class="d"><?php echo esc_html__('Finish Time :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php echo esc_html( $end_date ) ?>
					</span>
				</div>
			</div>
		</div>
	</div>

<?php
// All day (single day) events
elseif ( tribe_event_is_all_day() ):
	?>
	<div class="date_wrapper">
		<div class="media upper">
			<div class="media-left">
				<i class="mn-icon-1111"></i>
			</div>
			<div class="media-body">
				<div class="media-info-inner">
					<h3><?php echo esc_html__('Date :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php echo esc_html( $start_date ) ?>
					</span>
				</div>
			</div>
		</div>
	</div>
<?php
// Multiday events
elseif ( tribe_event_is_multiday() ) :
	?>
	
	<div class="date_wrapper">
		<div class="media upper">
			<div class="media-left">
				<i class="mn-icon-1111"></i>
			</div>
			<div class="media-body">
				<div class="media-info-inner">
					<h3><?php echo esc_html__('Start Time :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php echo esc_html( $start_datetime ) ?>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="date_wrapper">
		<div class="media upper">
			<div class="media-left">
				<i class="mn-icon-1216"></i>
			</div>
			<div class="media-body">
				<div class="media-info-inner">
					<h3><?php echo esc_html__('Finish Time :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php echo esc_html( $end_datetime ) ?>
					</span>
				</div>
			</div>
		</div>
	</div>
<?php
// Single day events
else :
	?>
	<div class="date_wrapper">
		<div class="media upper">
			<div class="media-left">
				<i class="mn-icon-1111"></i>
			</div>
			<div class="media-body">
				<div class="media-info-inner">
					<h3><?php echo esc_html__('Date :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php echo esc_html( $start_date ) ?>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="date_wrapper">
		<div class="media upper">
			<div class="media-left">
				<i class="mn-icon-1216"></i>
			</div>
			<div class="media-body">
				<div class="media-info-inner">
					<h3><?php echo esc_html__('Date :', 'studylms'); ?></h3>
					<span class="media-content">
						<?php if ( $start_time == $end_time ) {
							echo esc_html( $start_time );
						} else {
							echo esc_html( $start_time . $time_range_separator . $end_time );
						} ?>
					</span>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>