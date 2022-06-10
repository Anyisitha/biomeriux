<?php
/**
 * Edit account form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php echo do_shortcode('[avatar_upload]'); ?>

<form action="" method="post" class="edit-account">
	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<p class="form-group form-row form-row-first">
		<label for="account_first_name" style="display: block !important;">Nombre(s)</label>
		<input type="text" class="input-text form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="form-group form-row form-row-last">
		<label for="account_last_name" style="display: block !important;">Apellido(s)</label>
		<input type="text" class="input-text form-control" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<p class="form-group form-row form-row-last">
		<label for="account_skype" style="display: block !important;">Skype</label>
		<input type="text" class="input-text form-control" name="account_skype" id="account_skype" value="<?php echo esc_attr( $user->apus_edr_info_skype ); ?>" />
	</p>
	<p class="form-group form-row form-row-first">
		<label for="account_phone" style="display: block !important;">Teléfono</label>
		<input type="text" class="input-text form-control" name="account_phone" id="account_phone" value="<?php echo esc_attr( $user->apus_edr_info_mobile ); ?>" />
	</p>
	<p class="form-group form-row form-row-last">
		<label for="account_cargo" style="display: block !important;">Cargo</label>
		<input type="text" class="input-text form-control" name="account_cargo" id="account_cargo" value="<?php echo esc_attr( $user->apus_edr_info_cargo ); ?>"/>
	</p>
	
	<p class="form-group form-row form-row-first">
		<label for="account_institucion" style="display: block !important;">Institución</label>
		<input type="text" class="input-text form-control" name="account_institucion" id="account_institucion" value="<?php echo esc_attr( $user->apus_edr_info_institucion ); ?>" />
	</p>
	<p class="form-group form-row form-row-last">
		<label for="account_ciudad" style="display: block !important;">Ciudad</label>
		<input type="text" class="input-text form-control" name="account_ciudad" id="account_ciudad" value="<?php echo esc_attr( $user->apus_edr_info_ciudad ); ?>"/>
	</p>
	<p class="form-group form-row form-row-wide">
		<label for="account_description" style="display: block !important;">Biografía</label>
		<textarea class="input-text form-control" name="account_description" id="account_description">
			<?php echo esc_attr( $user->description ); ?>
		</textarea>
	</p>
	<p class="form-group form-row form-row-wide">
		<label for="account_display_name" style="display: block !important;">Nombre de Usuario</label>
		<input type="text" class="input-text form-control" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'Este será el nombre que se mostrará en los cursos y comentarios que se realicen', 'woocommerce' ); ?></em></span>
	</p>
	<p class="form-group form-row form-row-wide">
		<label for="account_email" style="display: block !important;">Email</label>
		<input type="email" class="input-text form-control" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>
	<fieldset>
		<legend>Redes Sociales</legend>
		<p class="form-group form-row form-row-first">
			<label for="account_facebook" style="display: block !important;">Facebook</label>
			<input type="text" class="input-text form-control" name="account_facebook" id="account_facebook" value="<?php echo esc_attr( $user->apus_edr_info_facebook ); ?>" />
		</p>
		<p class="form-group form-row form-row-first">
			<label for="account_linkedin" style="display: block !important;">LinkedIn</label>
			<input type="text" class="input-text form-control" name="account_linkedin" id="account_linkedin" value="<?php echo esc_attr( $user->apus_edr_info_linkedin ); ?>" />
		</p>
		<p class="form-group form-row form-row-last">
			<label for="account_youtube" style="display: block !important;">Youtube </label>
			<input type="text" class="input-text form-control" name="account_youtube" id="account_youtube" value="<?php echo esc_attr( $user->apus_edr_info_youtube ); ?>" />
		</p>
		<p class="form-group form-row form-row-first">
			<label for="account_twitter" style="display: block !important;">Twitter </label>
			<input type="text" class="input-text form-control" name="account_twitter" id="account_twitter" value="<?php echo esc_attr( $user->apus_edr_info_twitter ); ?>" />
		</p>
		
		
	</fieldset>
  <?php if(false):;?>	
	<fieldset>
		<legend>Contraseña</legend>
		<p class="form-group form-row form-row-thirds">
			<label for="password_current" style="display: block !important;">Contraseña actual (dejar en blanco para mantenerla)</label>
			<input type="password" class="input-text form-control" name="password_current" id="password_current" />
		</p>
		<p class="form-group form-row form-row-thirds">
			<label for="password_1" style="display: block !important;">Nueva Contraseña (dejar en blanco para mantener el actual)</label>
			<input type="password" class="input-text form-control" name="password_1" id="password_1" />
		</p>
		<p class="form-group form-row form-row-thirds">
			<label for="password_2" style="display: block !important;">Confirmar contraseña</label>
			<input type="password" class="input-text form-control" name="password_2" id="password_2" />
		</p>
	</fieldset>
  <?php endif;?>	
	<!-- <div class="clear"></div> -->
	
	<p class="form-group">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<input type="submit" class="button btn-theme-color-second btn-block radius-0" name="save_account_details" value="Guardar Cambios" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>
	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>
