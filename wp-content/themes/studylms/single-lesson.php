<?php

get_header();
global $wpdb;
function return_url(){
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
  else  
    $url = "http://";   
  // Append the host(domain name, ip) to the URL.   
  $url.= $_SERVER['HTTP_HOST'];   

  // Append the requested resource location to the URL   
  $url.= $_SERVER['REQUEST_URI'];    

  return $url;  
}
$urlTarget = return_url();
$userId = get_current_user_id();
$pageId = get_the_ID();
$edr_quizzes = Edr_Quizzes::get_instance();
$entry_id = $wpdb->get_results("SELECT `entry_id` FROM `wprueba_edr_grades` WHERE `user_id` = '{$userId}' AND `lesson_id` = '{$pageId}'");
$sidebar_configs = studylms_get_course_layout_configs();

if(strpos($urlTarget, '?edr-message=quiz-submitted') !== false){
$entry_id = $entry_id[0]->entry_id;
//echo $urlTarget . "  ";
//echo $userId . "  ";
//echo $pageId . "  ";
//echo $entry_id . "  ";
		$pre_an = $wpdb->get_results("SELECT `intentos` FROM `wprueba_edr_grades` WHERE `user_id` = '{$userId}' AND `entry_id`= '{$entry_id}'  AND `lesson_id` = {$pageId} ");
		$an = intval($pre_an[0]->intentos);
    //echo $an;
    //echo ' Abajo ';
    $an += 1;
    //echo $an;
		$update_attempts_number = $wpdb->get_results("UPDATE `wprueba_edr_grades` SET `intentos` = '{$an}' WHERE `user_id` = '{$userId}' AND `entry_id`= '{$entry_id}' AND `lesson_id` = '{$pageId}'");
}
?>

<section id="main-container" class="single-lesson">
		
		<div id="main-content">
			<div id="primary" class="content-area">
				<div id="content" class="site-content detail-post container" role="main">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							get_template_part( 'educator/content-lesson' );

							
						// End the loop.
						endwhile;
					?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
</section>
<?php get_footer(); ?>
