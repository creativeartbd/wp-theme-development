<?php
/*
* Template Name: Sticky Posts
*/
?>

<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
        $sticky = get_option( 'sticky_posts ' );
        echo '<pre>'; 
            echo print_r( $sticky ); 
        echo '</pre>';
        
        $sticky = $sticky[0];
        $query = new WP_Query("p=$sticky");

        // Display just the first sticky post, if none return the last post published:
        $args = array(
            'posts_per_page'    => 1, 
            'post__in'  => get_option('sticky_posts'),
            'ignore_sticky_posts'    => 1,
        );

        // Exclude all sticky posts from the query:
        $args = array(
            'post__not_in'  => get_option('sticky_posts'),
        );

        // Exclude sticky posts from a category. Return ALL posts within the category, but don’t show sticky posts at the top. The ‘sticky posts’ will still show in their natural position (e.g. by date):
        $args = array(
            'ignore_sticky_posts'  =>   1, 
            'posts_per_page'    =>  -1,
            'cat'   =>  33,
        );

        $args_all_sticky = get_option( 'sticky_posts' );

        $query = new WP_Query( array( 'post__in' => $args_all_sticky ) );


        if( $query->have_posts() ) {
            while( $query->have_posts() ) {
                
                echo "<div class='border border-danger p-5 mb-3'>";
                    $query->the_post();
                    echo "<h3 class='". implode( ' ', get_post_class() )."'>" . get_the_title() . "</h3>";
                    echo '<br/>';
                    the_category( ' | ');
                    echo '<hr/>';
                echo "</div>";
            }
        }
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>