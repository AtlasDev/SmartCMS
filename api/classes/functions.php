<?php

function log_error($text) {
    $file = "config/error.log";
    $current = file_get_contents($file);
    $current .= date("Y-m-d H:i:s").$text."\n";
    file_put_contents($file, $current);
}

?>