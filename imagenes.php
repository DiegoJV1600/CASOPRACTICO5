<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo API Rest</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="diseño.css">
</head>
<body>
    <div id="menu">
        <h1><a href="index.php">Consumo de API Rest</a></h1>
        <a href="usuarios.php">Usuarios</a>
        <a href="paises.php">Países</a>
        <a href="imagenes.php">Imagénes</a>
    </div>
    <div id="contain">
        <h2>Imagénes</h2>
        <div class="container-img">
        <?php
            $apiEndpoint = "https://picsum.photos/v2/list";

            $response = file_get_contents($apiEndpoint);

            $images = json_decode($response, true);

            if ($images !== null) 
            {
                foreach ($images as $image) 
                {
                    echo '<div class="image-card">';
                    echo "<img src='{$image['download_url']}' alt='Imagen'>";
                    echo '<div class="image-details">';
                    echo "Autor: {$image['author']}<br>";
                    echo "Ancho: {$image['width']} | Altura: {$image['height']}<br>";
                    echo '</div>';
                    echo '</div>';
                }
            } 
            else 
            {
                echo "Error al obtener la lista de imágenes.";
            }
        ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>