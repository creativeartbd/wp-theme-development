<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Hello Home Page.</h1>
            <?php 
            var_dump(is_home());
            var_dump(is_front_page());
            var_dump(is_post_type_archive());

            echo '<hr/>';

            if( have_posts() ) {
                while( have_posts() ) {
                    echo '<div class="border border-primary p-3 mb-3">';
                        the_post();
                        echo '<a href="'.get_the_permalink().'"><h3>'. get_the_title() . '</h3></a>';
                        the_excerpt();
                        echo '<hr/>';
                        echo get_the_author() . ' | ';
                        echo get_the_date() . ' | ';
                        the_category(', ');
                    echo '</div>';
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