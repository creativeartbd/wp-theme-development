<?php
get_header(); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_content();
                }
            } 
            ?>
        </div>
    </div>
</div>

<?php
get_footer();