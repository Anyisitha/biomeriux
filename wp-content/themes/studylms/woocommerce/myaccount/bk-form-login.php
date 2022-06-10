<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>


<section class="vc_section vc_custom_1590276479900 vc_section-has-fill vc_section-o-content-middle vc_section-flex" id="divLogin">
	<div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_center">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img src="/wp-content/uploads/2020/06/logo.svg" class="vc_single_image-img attachment-thumbnail" alt="" height="150.76" width="421.03"></div>
		</figure>
	</div>
</div></div></div></div><div class="vc_row wpb_row vc_row-fluid title-block"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<h1>Plataforma de<br>
Formación online</h1>

		</div>
	</div>
</div></div></div></div>


	<div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">

			<div id="erf_form_container_77" class="erf-container erf-label-top erf-layout-one-column erf-style-rounded-corner  ">
        <div class="erf-reg-form-container" style="">

    <div class="erf_front_administration">
        <div class="erf_form_layout_admin_dialog" style="display: none;" title="Change Form Layout">
            <form method="post">
                <div class="erf-row">
                            <div class="erf-control-label">
                                <label>Layout</label>
                            </div>
                            <div class="erf-control">
                                <select name="layout">
                                     <option selected="" value="one-column">One Column</option>
                                     <option value="two-column">Two Column</option>
                                </select>
                            </div>
                </div>

                <div class="erf-row">
                            <div class="erf-control-label">
                                <label>Label Position</label>
                            </div>
                            <div class="erf-control">
                                <select name="label_position">
                                    <option selected="" value="top">Top</option>
                                    <option value="inline">Inline</option>
                                    <option value="no-label">No Label</option>
                                </select>
                            </div>
                </div>
                <input type="hidden" name="action" value="erf_change_form_layout">
                <input type="hidden" name="erform_id" value="77">
                <input type="hidden" name="change_form_layout_nonce" value="3a3ab2f128">
            </form>

        </div>
    </div>



                            <div class="erf-content-above">
                    Register with us by filling out the form below.                </div>

                        </div>

				<form method="post" class="erf-form erf-front-form" role="form">

				<?php do_action( 'woocommerce_login_form_start' ); ?>



                    <div class="erf-form-html" id="erf_form_77">
                        <div class="rendered-form"><div custom-type="page-break" class="page-break" style="display: none;">Page Break</div>
                        <div class="erf-email form-group field-text-hQjpoY erf-element-width-12"><label for="username" class="erf-email-label">Email<span class="erf-required">*</span></label>

							<input placeholder="Email" type="text" class="form-control" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" required="1" />
							</div>

							<div class="erf-password form-group field-text-22jsGG erf-element-width-12"><label for="password" class="erf-password-label">Password<span class="erf-required">*</span></label>
								<input required="1" placeholder="Contraseña" class="form-control" type="password" name="password" id="password">

								<div class="pass-wrapper" style="display: none;"><div class="pass-graybar"><div class="pass-colorbar"></div></div><span class="pass-text">Type your password.</span></div></div><div class="erf-richtext erf-element-width-12"><div data-non-input="1" data-ref-label="ref-rwudMTDZ" data-ref-id="ref-WiVRi370" class="erf-rich-text"><p>¿Aún no tiene cuenta? <a onclick="doShowRegisterForm();" style="cursor:pointer;">Regístrese aquí</a> y pronto recibirá acceso a la plataforma de formación online.</p></div></div>                        </div>
                    </div>

				<span for="rememberme" class="pull-left" style="visibility: hidden;">
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'studylms' ); ?>
					</span>

                    <!-- Single page form button -->
                    <div class="erf-submit-button clearfix"><div class="erf-button form-group field-button-dlLAUR erf-element-width-12">

<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
<input type="hidden" name="_wp_http_referer" value="/home1">

<button type="submit" class="btn-rounded" name="login" id="button-dlLAUR">Acceder</button></div></div>

                    <input type="hidden" name="erform_id" value="77">
                    <input type="hidden" name="erform_submission_nonce" value="c5a006bd58">
                    <input type="hidden" name="action" value="erf_submit_form">
                    <input type="hidden" name="redirect_to" id="erform_redirect_to" value="/home1">

                                            <input type="hidden" name="erf_user" value="1">


				<!--?php do_action( 'woocommerce_login_form_end' ); ?-->
			</form>

</div>



		</div>
	</div>
</div></div></div></div>

</section>

<section class="vc_section vc_custom_1590276479900 vc_section-has-fill vc_section-o-content-middle vc_section-flex"
    id="divRegister" style="display: none;">
      <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
            <div class="wpb_wrapper">
              <div class="wpb_single_image wpb_content_element vc_align_center">
                <figure class="wpb_wrapper vc_figure">
                  <div class="vc_single_image-wrapper vc_box_border_grey">
                    <img src="/wp-content/uploads/2020/06/logo.svg"
                    class="vc_single_image-img attachment-thumbnail" alt="" height="150.76" width="421.03" />
                  </div>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vc_row wpb_row vc_row-fluid title-block">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
            <div class="wpb_wrapper">
              <div class="wpb_text_column wpb_content_element">
                <div class="wpb_wrapper">
                  <h1>Registro</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
            <div class="wpb_wrapper">
              <div class="wpb_text_column wpb_content_element">
                <div class="wpb_wrapper">
                  <div id="erf_form_container_111"
                  class="erf-container erf-label-top erf-layout-one-column erf-style-rounded-corner">
                    <div class="erf-reg-form-container" style="">
                      <div class="erf-content-above">Register with us by filling out the form below.</div>

						<form method="post" class="erf-form erf-front-form" role="form" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
						  <?php do_action( 'woocommerce_register_form_start' ); ?>


							<div class="erf-form-html" id="erf_form_111">
                        <div class="rendered-form">
                          <div custom-type="page-break" class="page-break" style="display: none;">Page Break</div>
                          <div class="erf-text form-group field-field-WKRLplNOOBbQd8k erf-element-width-12">
                            <label for="field-WKRLplNOOBbQd8k" class="erf-text-label">Nombre</label>
                            <input type="text" class="form-control" name="field-WKRLplNOOBbQd8k" placeholder="Nombre"
                            id="field-WKRLplNOOBbQd8k" />
                          </div>
                          <div class="erf-text form-group field-field-YF68AQWtCmEToCb erf-element-width-12">
                            <label for="field-YF68AQWtCmEToCb" class="erf-text-label">Text Field</label>
                            <input type="text" class="form-control" name="field-YF68AQWtCmEToCb" placeholder="Apellidos"
                            id="field-YF68AQWtCmEToCb" />
                          </div>
                          <div class="erf-email form-group field-text-hQjpoY erf-element-width-12">
                            <label for="reg_username" class="erf-email-label">Email
                            <span class="erf-required">*</span></label>
                            <input type="text" required="1" class="form-control" name="username" id="reg_username" placeholder="Email" onchange="copyEmail()" />
                          </div>
                          <div class="erf-password form-group field-text-22jsGG erf-element-width-12">
                            <label for="reg_password" class="erf-password-label">Password
                            <span class="erf-required">*</span></label>
                            <input type="password" required="1" placeholder="Contraseña" class="form-control" name="password" id="reg_password" />
                            <div class="pass-wrapper" style="display: none;">
                              <div class="pass-graybar">
                                <div class="pass-colorbar"></div>
                              </div>
                              <span class="pass-text">Type your password.</span>
                            </div>
                          </div>
                          <div class="erf-text form-group field-field-iedBgCUYCYD3l9M erf-element-width-12">
                            <label for="field-iedBgCUYCYD3l9M" class="erf-text-label">Cargo</label>
                            <input type="text" class="form-control" name="field-iedBgCUYCYD3l9M" placeholder="Cargo"
                            id="field-iedBgCUYCYD3l9M" />
                          </div>
                          <div class="erf-text form-group field-field-ddC5pNQf7JHl56t erf-element-width-12">
                            <label for="field-ddC5pNQf7JHl56t" class="erf-text-label">Institución</label>
                            <input type="text" class="form-control" name="field-ddC5pNQf7JHl56t" placeholder="Institución"
                            id="field-ddC5pNQf7JHl56t" />
                          </div>
                          <div class="erf-text form-group field-field-mgorf90yfZc9yAW erf-element-width-12">
                            <label for="field-mgorf90yfZc9yAW" class="erf-text-label">Celular</label>
                            <input type="text" class="form-control" name="field-mgorf90yfZc9yAW" id="field-mgorf90yfZc9yAW" placeholder="Celular" />
                          </div>
                          <div class="erf-text form-group field-field-0icwrENSsIRBmKQ erf-element-width-12">
                            <label for="field-0icwrENSsIRBmKQ" class="erf-text-label">Ciudad</label>
                            <input type="text" class="form-control" name="field-0icwrENSsIRBmKQ" placeholder="Ciudad"
                            id="field-0icwrENSsIRBmKQ" />
                          </div>
                          <div class="erf-richtext erf-element-width-12">
                            <div data-non-input="1" data-ref-label="ref-rwudMTDZ" data-ref-id="ref-WiVRi370" class="erf-rich-text">
                              <p>Recuerde debe ser profesional sanitario para acceder a esta web.</p> Si ya tiene cuenta <a onclick="doShowLoginForm();" style="cursor:pointer;">Inicie Sesión</a>
                            </div>
                          </div>
                        </div>
                      </div>
							<input type="email" required="1" class="form-control" name="email" id="reg_email" placeholder="Repetir Email" style="visibility:hidden;" />
                      <div class="erf-external-form-elements">
                        <div class="erf-errors" style="display:none">
                          <span class="erf-errors-head erf-error-row">Error occured. Please confirm your data and submit
                          again:</span>
                          <div class="erf-errors-body"></div>
                        </div>
                      </div>
                      <!-- Contains multipage Next,Previous buttons -->
                      <div class="erf-form-nav clearfix" current-page-index="0"></div>
                      <!-- Single page form button -->

							<?php do_action( 'woocommerce_register_form' ); ?>
<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
<input type="hidden" name="_wp_http_referer" value="/home1">

                      <div class="erf-submit-button clearfix">
                        <div class="erf-button form-group field-button-dlLAUR erf-element-width-12">
                          <button type="submit" class="btn-rounded" name="register" id="register">Enviar
                          solicitud</button>
                        </div>
                      </div>
                      <input type="hidden" name="erform_id" value="111" />
                      <input type="hidden" name="action" value="erf_submit_form" />
                      <input type="hidden" name="redirect_to" id="erform_redirect_to"
                      value="/home1" />



							<?php do_action( 'register_form' ); ?>
              <?php do_action( 'woocommerce_register_form_end' ); ?>

						</form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<div id="background-image-content" class="vc_row wpb_row vc_row-fluid vc_custom_1590276452590 vc_row-has-fill"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1590276745697">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="2560" height="1440" src="/wp-content/uploads/2020/06/introImage@2x-80-scaled.jpg" class="vc_single_image-img attachment-full" alt=""></div>
		</figure>
	</div>
</div></div></div></div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>


<script type="text/javascript">

	function copyEmail() {
  var x = document.getElementById("reg_username");
  var y = document.getElementById("reg_email");
  y.value = x.value;
}

function doShowRegisterForm() {

	jQuery("#divLogin").hide();
	jQuery("#divRegister").show();
}

	function doShowLoginForm() {

	jQuery("#divRegister").hide();
	jQuery("#divLogin").show();
}

</script>
