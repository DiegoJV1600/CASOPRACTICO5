<?php
    if(isset($_GET['id']))
    {
        $userId = $_GET['id'];

        $apiUrl = "https://reqres.in/api/users/{$userId}";

        $response = file_get_contents($apiUrl);

        echo $response;
    }
    else 
    {
        echo json_encode(['error' => 'ID de usuario no encontrado']);
    }
?>