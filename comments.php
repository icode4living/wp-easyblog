<?php

//Get only the approved comments
$args = array(
    'status' => 'approve'
);
 
// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
 
// Comment Loop
if ( $comments ) {
 foreach ( $comments as $comment ) {
 echo '<div>' . $comment->comment_content . '</div>';
 }
} else {
 echo 'No comments found.';
}


?>