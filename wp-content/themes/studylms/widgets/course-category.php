<?php

extract( $args );
extract( $instance );
$title = apply_filters('widget_title', $instance['title']);

if ( $title ) {
    echo ($before_title)  . trim( $title ) . $after_title;
}
?>
<div class="course-category-widget widget-content">
<?php
$terms = get_terms( array(
    'taxonomy' => EDR_TX_CATEGORY,
    'hide_empty' => true
) );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	?>
	<ul class="terms-list">
	<?php
	foreach ($terms as $term) {
		?>
		<li>
			<a href="<?php echo esc_url( get_term_link($term, EDR_TX_CATEGORY) ); ?>">
				<?php echo trim($term->name); ?>
				<?php if ($post_count == 'yes') { ?>
					<span>(<?php echo trim($term->count); ?>)</span>
				<?php } ?>
			</a>
		</li>
		<?php
	}
	?>
	</ul>
	<?php
}
?>
</div>