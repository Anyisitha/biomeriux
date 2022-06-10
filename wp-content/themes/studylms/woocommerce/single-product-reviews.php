<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div id="comments">

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'studylms' ); ?></p>

		<?php endif; ?>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="col-sm-12">
			<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

				<div id="review_form_wrapper">
					<div id="review_form">
						<?php
							$commenter = wp_get_current_commenter();

							$comment_form = array(
								'title_reply'          => have_comments() ? esc_html__( 'Agregar una reseña', 'studylms' ) : sprintf( esc_html__( 'Se el primero en comentar &ldquo;%s&rdquo;', 'studylms' ), get_the_title() ),
								'title_reply_to'       => esc_html__( '
Dejar una respuesta a %s', 'studylms' ),
								'comment_notes_before' => '',
								'comment_notes_after'  => '',
								'fields'               => array(
									'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Nombre', 'studylms' ) . ' <span class="required">*</span></label>' .
									            '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
									'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'studylms' ) . ' <span class="required">*</span></label>' .
									            '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
								),
								'label_submit'  => esc_html__( 'Enviar', 'studylms' ),
								'logged_in_as'  => '',
								'comment_field' => ''
							);

							if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
								$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( esc_html__( 'Usted debe estar <a href="%s">conectado</a> para publicar un comentario.', 'studylms' ), esc_url( $account_page_url ) ) . '</p>';
							}

							if ( wc_review_ratings_enabled() ) {
								
								$comment_form['comment_field'] = '<div><div><label class="you-rating" for="rating">' . esc_html__( 'Clasificación', 'studylms' ) .'</label><div class="comment-form-rating list-rating input-rating">
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
							}

							$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Su comentario *', 'studylms' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true" placeholder="Su comentario" ></textarea></p>';

							comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
						?>
					</div>
				</div>

			<?php else : ?>

				<p class="woocommerce-verification-required"><?php esc_html_e( 'Solo los clientes registrados que hayan adquirido este curso pueden dejar un comentario.', 'studylms' ); ?></p>

			<?php endif; ?>
		</div>
	</div>
	
</div>