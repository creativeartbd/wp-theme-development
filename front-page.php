<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Hello front-page Page c.</h1>
        <?php 
        var_dump(is_post_type_archive('post'));
        echo get_post_type();
        var_dump(post_type_exists('c'));

        // var_dump(is_home());
        // var_dump(is_front_page());

        if( have_posts() ) {
            while( have_posts() ) {
                the_post();
                echo '<a href="'.get_the_permalink().'"><p>'. get_the_title() . '</p></a>';
                the_category(', ');
                $tags = get_the_tags();
                if($tags) {
                    echo '<pre>';
                    foreach($tags as $tag) {
                        $link = get_tag_link($tag->term_id);
                        echo "<a href='$link'>$tag->name</a> | ";
                    }
                    echo '</pre>';
                }
            }
        }

        $new_query = new WP_Query('category_name=sport');

        if( $new_query->have_posts()) {
            while( $new_query->have_posts() ) {
                $new_query->the_post();
                echo '<p>'. get_the_title() . '</p>';
                the_category(', ');
            }
        } else {
            echo 'No post found';
        }
        wp_reset_postdata();

        echo '<hr/>';

        if( have_posts() ) {
            while( have_posts() ) {
                the_post();
                the_title();
                echo '<hr/>';
            }
        }

        rewind_posts();

        while( have_posts() ) {
            the_post();
            the_excerpt();
            echo '<hr/>';
        }


        echo '<hr/><hr/>';

        echo bloginfo('name');
        echo '<hr/>';
        echo bloginfo('title');
        echo '<hr/>';
        echo bloginfo('version');
        echo '<hr/>';
        echo '<hr/>';

        if( have_posts() ) {
            while ( have_posts() ) {
                if( in_category( 7 ) ) {
                    echo 'hello 2';
                }
                the_post();
                the_title(); 
                echo '<hr/>';
                the_shortlink();
                echo '<hr/>';
                echo get_the_author_posts_link();
            }
            next_post_link();
            previous_post_link();
        }

        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>