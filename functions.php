<?php
function clean_data($string) {
    $string = filter_var($string, FILTER_SANITIZE_STRING);
    $string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
    return $string;
}
?>
