<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astral
 * @since 0.1
 */
get_header();
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' );
/* 
* Functions hooked into astral_breadcrumb_area action
* 
* @hooked astral_breadcrumb
*/
do_action( 'astral_breadcrumb_area' );
?>

<!--Cette partie du code est utilisé pour répondre a la partie "description-evenement" du TP-->
<div id="content">
    <section class="align-blog" id="blog">
        <div class="container">
            <div class="row">
                <!-- left side -->
                <div class="col-lg-8 single-left mt-lg-0 mt-4">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
						/*Code utilisé pour démarquer les posts de type evenement des postes de type nouvelle*/
						if(has_category('evenement')){
							
							echo '<h2>'.get_the_title().'</h2>';
							echo the_excerpt();
							echo "<p> La date de l'evenement est le : ".get_the_date('j')." - ".get_the_date('m')." - ".get_the_date('y')."</p>";
							
							echo '<p> Le responsable est : '.get_the_author(). '</p>';
						}
						else{
							get_template_part( 'post', 'content' );
						}
						
						
					endwhile;
					endif;

					/*
					* Functions hooked into astral_pagination action
					*
					* @hooked astral_navigation
					*/
					do_action( 'astral_single_blog_navigation' );

					
					?>
                </div>
                <!-- right side -->
                <div class="col-lg-4 event-right">
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();