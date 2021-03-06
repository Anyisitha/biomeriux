

	</div><!-- .site-content -->
<?php 
if(is_user_logged_in()){
  $acf_nombre = get_field('nombres', 'user_' . get_current_user_id());
  configurar_usuario();
}
?>

	<footer id="apus-footer" class="apus-footer" role="contentinfo">
		<?php if ( !empty($footer) ): ?>
			<div class="container">
				<?php studylms_display_footer_builder($footer); ?>
			</div>
		<?php else: ?>
			
			<div class="apus-copyright">
				<div class="container">
					<div class="copyright-content">
						<div class="text-copyright pull-left">
							<?php
								$allowed_html_array = array('strong' => array(),'a' => array('href' => array()));
								echo wp_kses(__('Copyright &copy; 2017 - Studylms. All Rights Reserved. <br/> Powered by <a href="//apusthemes.com">ApusThemes</a>', 'studylms'), $allowed_html_array);
							?>
						</div>
					</div>
				</div>
			</div>
		
		<?php endif; ?>
		
	</footer><!-- .site-footer -->
	<?php
	if ( studylms_get_config('back_to_top') ) { ?>
		<a href="#" id="back-to-top">
			<i class="mn-icon-536"></i>
		</a>
	<?php
	}
	?>

</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
