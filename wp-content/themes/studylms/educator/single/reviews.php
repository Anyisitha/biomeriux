<?php

global $post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}
$total_rating = studylms_get_total_rating( get_the_ID() );
$comment_ratings = studylms_get_detail_ratings( get_the_ID() );
$total = studylms_get_total_reviews( get_the_ID() );
?>
<div id="course-review">
	<div id="reviews">
		<h3 class="title-tab"><?php esc_html_e( 'Comentarios', 'studylms' ); ?></h3>

		<div id="comments">
			<?php
			if ( have_comments() ) : ?>
				<ol class="commentlist">
					<?php wp_list_comments( array( 'callback' => 'studylms_room_comments' ) ); ?>
				</ol>
				
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
					echo '<nav class="apus-pagination">';
					paginate_comments_links( apply_filters( 'apus_comment_pagination_args', array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'list',
					) ) );
					echo '</nav>';
				endif; ?>
				
			<?php else : ?>
				<p class="apus-noreviews"><?php esc_html_e( 'Aún no hay comentarios para este curso.', 'studylms' ); ?></p>
			<?php endif; ?>
		</div>
			
		<div class="clear"></div>

		<h3 class="title-tab"><?php esc_html_e( 'Agregue un comentario', 'studylms' ); ?></h3>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();
					$comment_form = array(
						'title_reply'          => have_comments() ? '': sprintf( esc_html__( 'Se el primero en comentar &ldquo;%s&rdquo;', 'studylms' ), get_the_title() ),
						'title_reply_to'       => esc_html__( 'Deje un comentario %s', 'studylms' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="comment-form-author">' . '<label for="author">' . esc_html__( 'Nombre', 'studylms' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
							'email'  => '<div class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'studylms' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div>',
						),
						'label_submit'  => esc_html__( 'Enviar', 'studylms' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					
					$comment_form['comment_field'] = '<div class="forrating"><label for="rating">' . esc_html__( 'Clasificación', 'studylms' ) .'</label><div><div class="comment-form-rating rating-print-wrapper">
						<ul class="review-stars">
							<li><span class="fa fa-star-o"></span></li>
							<li><span class="fa fa-star-o"></span></li>
							<li><span class="fa fa-star-o"></span></li>
							<li><span class="fa fa-star-o"></span></li>
							<li><span class="fa fa-star-o"></span></li>
						</ul>
						<ul class="review-stars filled" style="width: 100%">
							<li><span class="fa fa-star"></span></li>
							<li><span class="fa fa-star"></span></li>
							<li><span class="fa fa-star"></span></li>
							<li><span class="fa fa-star"></span></li>
							<li><span class="fa fa-star"></span></li>
						</ul>
						<input type="hidden" value="5" name="rating" id="apus_input_rating"></div></div></div>';
					

					$comment_form['comment_field'] .= '<div class="comment-form-comment"><label for="comment">' . esc_html__( 'Su comentario', 'studylms' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';
 					
 					studylms_comment_form($comment_form);
				?>
			</div>
		</div>

		
	</div>
</div>