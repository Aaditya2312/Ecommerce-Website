<?php

$conn = new mysqli();
try {
    $conn = new mysqli("localhost", "root", "", "acme24_march", 3306);
} catch (Exception $ex) {
    echo $ex;
    exit;    
}

?>