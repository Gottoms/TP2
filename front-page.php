<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astral
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			

		endwhile; // End of the loop.
	
 
  
 /* Restore original Post Data 
  * NB: Because we are using new WP_Query we aren't stomping on the 
  * original $wp_query and it does not need to be reset with 
  * wp_reset_query(). We just need to set the post data back up with
  * wp_reset_postdata().
  */
 wp_reset_postdata();
 
 $args2 = array(
    "category_name"=>"evenement",
    "order"=>"ASC",
    "posts_per_page"=>3,
    "orderby"=>"date");

 /*The 2nd Query (without global var) */
 $query2 = new WP_Query( $args2 );
  

$category = get_the_category($query2->post->ID);

echo "<h1>".category_description($category[0])."</h1>";
 // The 2nd Loop
 while ( $query2->have_posts() ) {
     $query2->the_post();
     echo '<div class="divConference" style="background-color:white; padding:1%;">';
     echo '<h4><a href='.get_the_permalink().'>' . get_the_title() . ' - ' . get_the_date() . '</a></h4>';
     echo get_the_post_thumbnail(null,"thumbnail");
     echo  the_excerpt();
     echo '</div>';
 }
  
 // Restore original Post Data
 wp_reset_postdata();


 $args = array(
    "category_name"=>"nouvelle",
    "order"=>"DESC",
    "posts_per_page"=>3,
    "orderby"=>"date");
// The Query


$query1 = new WP_Query( $args );


$category = get_the_category($query1->post->ID);

echo "<h6>".category_description($category[0])."</h6>";
    echo '<div class="oFlex">';
   while ( $query1->have_posts() ) {
        echo '<div class ="oPost">';
       $query1->the_post();
       
       echo '<a  style="font-size:1.2em"href='.get_the_permalink().'>' . get_the_title()  . '</a>';
       echo get_the_post_thumbnail(null,"thumbnail");
       echo '</div>';
   }
   echo '</div>';


   echo '<div class="animation1"><p>Ceci est le premier élément animé</p></div>';

   echo '<div class="animation2"><p>Ceci est un deuxième élément animé</p></div>';

   echo '<div class="experience" id="experience1">
   <div class="rectangle1"></div>
  
   <div class=animtrois><h3>Ceci est un troisième élément animé</h3></div><div class="rectangle2"></div></div>';
 ?>

 

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
