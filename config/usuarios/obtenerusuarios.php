<?php
    $apiUrl = 'https://reqres.in/api/users';

    $response = file_get_contents($apiUrl);

    echo $response;
?>