<?php 
$title = the_title('','',false);
if (empty($title)) { 
_e('Post ID','soliloquy');
the_ID(); 
} else { 
    the_title();
}                              
?>