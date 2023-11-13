<?php 
    $apiEndPoint = "https://restcountries.com/v2/all";

    $response = file_get_contents($apiEndPoint);
    
    echo $response;
?>