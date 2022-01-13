<?php 
/*
* Template Name: About Page
*/
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 id="about-heading"><?php echo get_theme_mod('shibbir_about_settings', __( 'About Page Heading', 'shibbir' ) ); ?></h2>
            <div id="about-description">
                <?php echo apply_filters( 'the_content', get_theme_mod( 'shibbir_about_description_settings') ); ?>
            </div>
            <div>
                <?php echo get_theme_mod('slider_setting'); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();