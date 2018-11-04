<?php

function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    $text = get_the_content('');
 
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    /***Add the allowed HTML tags separated by a comma.***/
    $allowed_tags = '<p>,<a>,<em>,<strong>';  
    $text = strip_tags($text, $allowed_tags);
     
    /***Change the excerpt word count.***/
    $excerpt_word_count = 100; 
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
     
    /*** Change the excerpt ending.***/
    $excerpt_end = ' <div class="ex-button"><a href="'. get_permalink($post->ID) . '">' . 'Continue Reading. &raquo;' . '</a></div>'; 
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');

?>
