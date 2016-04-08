<?php 
/* 
Plugin Name: Recent Posts Plugin   
Plugin URI: http://www.sarawebdesigns.com 
Description: Displays a list of your latest posts. 
Version: 1.0 Author: Sara Kuntumalla 
Author URI: http://www.sarawebdesigns.com 
*/
function get_recent_posts(){
$recent_posts = wp_get_recent_posts();
echo "<ul>";
foreach($recent_posts as $recent){ 
			   //var_dump($recent);
			
		$permalink = get_permalink( $recent['ID']) ;  
			    
		if('attachment'== get_post_type($recent['ID'])){
			$permalink = wp_get_attachment_url( $recent['ID'] ) ;
			echo "<li><span class='post-link'><a href='".$permalink."' download>".$recent['post_title']."</a>";
		}
		else{
			echo "<li><span class='post-link'><a href='".esc_url($permalink)."'>".$recent['post_title']."</a>";
		}
		echo"</span><span class='post-date'>".mysql2date('d M Y', $recent['post_date'])."</span><span class='post-type'>".$recent['post_type']."</span></li>";
		
}
echo "</ul>";
wp_reset_post_data();

} 		 
?>
