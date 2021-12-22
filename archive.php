<?php 
/*
* Template Name: Archive Page
*/
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Archive Page template</h1>
        <?php 
        var_dump(is_page_template('archive.php')); 
        var_dump(is_tag());
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>