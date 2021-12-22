<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Hello single Page.</h1>
        <?php 
        if( have_posts() ) {
            while( have_posts() ) {
                the_post();
                echo '<p>'. get_the_title() . '</p>';
                the_category(', ');
            }
        }
        
        echo '<hr/>';
        var_dump( comments_open() );
        echo '<hr/>';
        var_dump( pings_open() );
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>