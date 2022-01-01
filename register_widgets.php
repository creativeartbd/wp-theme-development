<?php 

class My_Widget extends WP_Widget {

    public function __construct()
    {
        parent::__construct(
            'shibbir_widget_id',
            'Shibbir Widget',
            array( 
                'description' => __( 'Shibbir Widget Description will goes to here', 'shibbir')
            )
         );
    }

    public function widget( $args, $instance )
    {
        // echo '<pre>'; 
        //     print_r( $args );
        //     print_r( $instance );
        // echo '</pre>';

        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title']);
        echo $before_widget;
            if( ! empty( $title ) ) {
                echo $before_title . $title . $after_title;
            }
        echo $after_widget;
        
    }

    public function form ( $instance ) {
        // echo '<pre>'; 
        //     print_r( $instance ); 
        // echo '</pre>';

        if( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'shibbir');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e( 'Title', 'shibbir' ) ?></label>
            <input type="text" class="widget" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
        </p>
        <?php
        
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

add_action( 'widgets_init', 'shibbir_test_register_widget' );
function shibbir_test_register_widget() {
    register_widget( 'My_Widget' );
}