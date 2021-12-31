<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Image Page.</h1>
        <div class="entry-attachment">
                <?php 

                echo get_attachment_template();
                
                $image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
                        echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
            
                    <?php if ( has_excerpt() ) : ?>
                    
                    <div class="entry-caption">
                            <?php the_excerpt(); ?>
                    </div><!-- .entry-caption -->
                <?php endif; ?>
            </div><!-- .entry-attachment -->
        </div>
    </div>
</div>

<?php get_footer(); ?>