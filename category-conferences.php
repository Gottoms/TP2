<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

?>
	<section class="align-blog" id="blog">
        <div class="container">
            <?php
                
                echo "<h1>".category_description()."</h1>";
                /*Même si cette partie ci n'était pas requise pour le tp, nous voulions l'intégrer pour avoir un élément dans le site qui était géré avec l'API REST*/
                // The 2nd Loop
                $compte = 0;
                while (have_posts()) {
                   the_post();
                    
			        get_template_part( 'template-parts/content', 'conference' );
                    echo "<div class=conference_article>";
                    
                    echo "<h1>".get_the_title()."</h1>";
                    echo get_the_post_thumbnail(null,"thumbnail");
                    echo  the_excerpt();
                    echo '<input type="button" data-id='.get_the_ID().' class="lirePost" value="Lire la suite...">';
                    
                    echo "</div>";
                    $compte++;
                    
                  
                    }
                           
            ?>
        </div>
    </section>
<?php
get_footer();