<?php 
if( post_password_required() ) 
    return;

echo '<div class="border border-primary p-3 mt-3">';
    wp_list_comments();
echo '</div>';

echo '<hr/>';

$args = array(
    'status' => 'approve'
);

$comments_query = new WP_Comment_Query();
$comments = $comments_query->query($args);
if( $comments ) {
    foreach( $comments as $comment ) {
        echo $comment->comment_content;
        echo '<hr class="border border-danger"/>';
        // echo '<pre>';
        // print_r( $comment );
        // echo '</pre>';
    }
} else {
    echo 'No comment found.';
}