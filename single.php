<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Hello single Page.</h1>
            <?php 
            if( have_posts() ) {
                while( have_posts() ) {
                    $wrapper_class = implode(' ', get_post_class('border border-success p-3 mb-3' ) ); 
                    echo "<div class='$wrapper_class'>";
                        the_post();
                        echo '<h3>'. get_the_title() . '</h3>';
                        the_content();
                        the_category(', ');
                    echo "</div>";
                }
            }
            
            echo '<hr/>';
            var_dump( comments_open() );
            echo '<hr/>';
            var_dump( pings_open() );

            echo '<hr/>';
            echo '<h1>Comments </h1>';
            // get comments
            if( comments_open() && get_comments_number() ) {
                comments_template();
            } else {
                comment_form();
            }

            // commetns form
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>