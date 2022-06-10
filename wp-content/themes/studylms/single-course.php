<?php

get_header();

$sidebar_configs = studylms_get_course_layout_configs();

studylms_render_breadcrumbs();

global $wpdb;
$curso_id = get_the_ID();
//echo '<p>' . $curso_id . '</p>' ;
$user_id = get_current_user_id();
//echo '<p>' . $user_id . '</p>' ;
$progreso = array();
//$cursos = $wpdb->get_results("SELECT `course_id` FROM `wprueba_edr_entries` WHERE `user_id` = ". get_current_user_id() ."");
$entry_id = $wpdb->get_results("SELECT `ID` FROM `wprueba_edr_entries` WHERE `course_id`= ". $curso_id ." AND `user_id` = ". $user_id ." ");
//echo '<p>' . sizeof($entry_id) . '</p>';
if(sizeof($entry_id) > 0){
$entries = $entry_id[0];
foreach ($entries as $valor){
  $entry_id = $valor;
}

//echo '<p>' . $entry_id . '</p>' ;

$quizes = $wpdb->get_results("SELECT `lesson_id` FROM `wprueba_edr_grades` WHERE `entry_id` = ". $entry_id . " and `user_id` = ". $user_id );
$quizes_ids = [];
$quiz_ids = array();
foreach($quizes as $llaves){
  foreach($llaves as $key => $valor){
    array_push($quizes_ids, $valor); 
  }
}

//echo '<p>' . var_dump($quizes_ids) . '</p>' ;
foreach($quizes_ids as $valor){
  //echo '<p>'. $valor . '</p>';
  $quiz_ids[$valor] = array();
  $preguntas = $wpdb->get_results("SELECT `ID` FROM `wprueba_edr_questions` WHERE `lesson_id` = ". $valor);
  foreach($preguntas as $v){
    foreach($v as $key => $id){
        array_push( $quiz_ids[$valor], $id);
    }
  }
}
//echo '<pre>'. var_dump($quiz_ids) . '</pre>';

foreach($quiz_ids as $quiz => $qq){
    $cant_preguntas = sizeof($qq);
    //echo '<p>'. $quiz . "=". $cant_preguntas .'</p>';
    $respuestas_bien = 0;
    $progreso[$quiz]['cant-preguntas'] = $cant_preguntas;
  foreach($qq as $q => $p){
    $respuesta = $wpdb->get_results("SELECT `correct` FROM `wprueba_edr_answers` WHERE `entry_id` = ". $entry_id ." AND `question_id` = ". $p);
    foreach($respuesta as $ll){
      foreach($ll as $key => $valor){
        //echo '<p>'. $p . '=' . $valor .'</p>';
        if($valor == 1){
          $respuestas_bien += 1;
        }
      }
    }
  }
  $nota = (intval($respuestas_bien) * 100) / intval($cant_preguntas);
  $progreso[$quiz]['nota'] = $nota;
  $progreso[$quiz]['respuestas-bien'] = $respuestas_bien;
  $wpdb->update('wprueba_edr_grades',
    array('grade'=> $nota),
    array('entry_id'=> $entry_id, 'lesson_id'=> $quiz, 'user_id'=> $user_id)
  );
  if($nota >= 80){
    $wpdb->update('wprueba_edr_grades',
      array('status'=> 'approved'),
      array('entry_id'=> $entry_id, 'lesson_id'=> $quiz, 'user_id'=> $user_id)
    );
  }
  else{
    $wpdb->update('wprueba_edr_grades',
      array('status'=> 'draft'),
      array('entry_id'=> $entry_id, 'lesson_id'=> $quiz, 'user_id'=> $user_id)
    ); 
  }
}
//echo '<p>'. var_dump($quizes_ids) .'</p>';
$num_quizes = $wpdb->get_results("SELECT `meta_value` FROM `wprueba_postmeta` WHERE `post_id` = ". $curso_id ." AND `meta_key` = 'numero_de_quiz'");
$quiez_aprobados = 0;
//echo '<p>'. $num_quizes .'</p>';
foreach($quizes_ids as $q ){
  $aprobado = $wpdb->get_results("SELECT `status` FROM `wprueba_edr_grades` WHERE `entry_id` = ". $entry_id ." and `user_id` = ". $user_id . " and `lesson_id` = " . $q );
  //echo '<p>'. $aprobado[0]->status .'</p>';
  if($aprobado[0]->status == 'approved'){
    $quiez_aprobados += 1;
  }
}
  //echo '<p>'. $quiez_aprobados .'</p>';
  $nota_curso = round((intval($quiez_aprobados) * 100) / intval($num_quizes[0]->meta_value),2);
  //echo '<p>'. $nota_curso .'</p>';
  $wpdb->update('wprueba_edr_entries',
    array('grade'=> $nota_curso),
    array('course_id'=> $curso_id, 'user_id'=> $user_id)
  );
  if($nota_curso >= 90){
    $wpdb->update('wprueba_edr_entries',
      array('entry_status'=> "complete"),
      array('course_id'=> $curso_id, 'user_id'=> $user_id)
    ); 
  }
}
?>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
  if(document.querySelector('.single-edr_course div#apus-main-content section#main-container #main-content div#primary div#content [onclick]')){
    document.querySelector('.single-edr_course div#apus-main-content section#main-container #main-content div#primary div#content [onclick]').id = 'boton-certificado';
    document.querySelector('#boton-certificado').removeAttribute("onclick");
    var f = new Date();
    var meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre']
    var fecha = f.getDate() + ' de ' + meses[f.getMonth()] + ' de ' + f.getFullYear() ;
<?php

  $curso_titulo = $wpdb->get_results("SELECT `post_title` FROM `wprueba_posts` WHERE `ID` = ". $curso_id );
  $curso_titulo = $curso_titulo[0]->post_title;
  echo 'let nombre ="' . $curso_titulo .'";';
  $usuario = $wpdb->get_results("SELECT `meta_value` FROM `wprueba_usermeta` WHERE `meta_key` = 'first_name' AND `user_id` =" . $user_id);
  $usuario = $usuario[0]->meta_value;
  $user_last_name =  $wpdb->get_results("SELECT `meta_value` FROM `wprueba_usermeta` WHERE `meta_key` = 'last_name' AND `user_id` =" . $user_id );
  $user_last_name = $user_last_name[0]->meta_value;
  echo 'let cRusuario ="' . ucfirst($usuario) .' '. ucfirst($user_last_name) .'";';
  $user_institucion = $wpdb->get_results("SELECT `meta_value` FROM `wprueba_usermeta` WHERE `meta_key` = 'apus_edr_info_institucion' AND `user_id` = " . $user_id);
  $user_institucion = $user_institucion[0]->meta_value;
  echo 'let institucion = "' . $user_institucion . '";';
  $duracion_curso =  $wpdb->get_results("SELECT `meta_value` FROM `wprueba_postmeta` WHERE `meta_key` = 'apus_educator_duration' AND `post_id` = " . $curso_id);
  $duracion_curso = $duracion_curso[0]->meta_value;
  echo 'let duracion = "' . $duracion_curso . '";';
?>
    document.querySelector('#boton-certificado').addEventListener('click', function(){doPDFCertificate(nombre, fecha, cRusuario, institucion, duracion)});
  }
});
</script>
<section id="main-container" class="main-content <?php echo apply_filters( 'studylms_course_content_class', 'container' ); ?> inner">
	<div class="row">
		<?php if ( isset($sidebar_configs['left']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['left']['class']) ;?>">
			  	<aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			   		<?php if ( is_active_sidebar( $sidebar_configs['left']['sidebar'] ) ): ?>
				   		<?php dynamic_sidebar( $sidebar_configs['left']['sidebar'] ); ?>
				   	<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>
		<div id="main-content" class="col-xs-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<div id="primary" class="content-area">
				<div id="content" class="site-content detail-post" role="main">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							get_template_part( 'educator/content', 'single-course' );
							
						// End the loop.
						endwhile;
					?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>	
		<?php if ( isset($sidebar_configs['right']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['right']['class']) ;?>" >
			  	<aside class="sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			   		<?php if ( is_active_sidebar( $sidebar_configs['right']['sidebar'] ) ): ?>
				   		<?php dynamic_sidebar( $sidebar_configs['right']['sidebar'] ); ?>
				   	<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>
	</div>	
</section>
<?php get_footer(); ?>
