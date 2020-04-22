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
               echo '<div class="oGrid">';
                // The 2nd Loop

                while (have_posts()) {
                   the_post();

			        get_template_part( 'template-parts/content', 'evenement' );
                    $oMois = (int)get_the_date("m");
                    $oJour = (int)get_the_date("j");
                    $oCollone = $oMois%9;
                    
                    
                    
                    echo "<div class=mois".$oCollone." style='grid-area:".$oJour."/".($oCollone + 1)."/".($oJour+1)."/".($oCollone + 1).";' id=".get_the_ID().">";
                    echo "<p>" . get_the_date("j") ." - ".get_the_date("m"). " - ".get_the_date("y") ."</p>";
                    echo "<p>".get_the_title()."</p>";
                    echo "<p>".$oJour."/".($oCollone + 1)."/".($oJour+1)."/".($oCollone + 1)."</p>";
                    echo "<a href='http://localhost/wordpress/category/".get_the_id()."' class=grid_link>Lire plus</a>";
                    echo "</div>";
                    

                   
                    
                    }
                           

                echo '</div>';
            ?>
        </div>
    </section>
<?php
get_footer();