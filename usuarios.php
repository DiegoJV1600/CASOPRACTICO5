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
        <h2>Usuarios</h2>
        <div class="container">
            <div class="search-container">
                <input type="text" id="userIdInput" placeholder="Ingrese el ID del usuario">
                <button id="searchButton" onclick="searchUser()"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <table id="tabla-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Avatar</th>
                    </tr>
                </thead>
                <tbody id="userTableBody"></tbody>
            </table>
        </div>
    </div>
    <script>
        function getUsers() 
        {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    var users = JSON.parse(this.responseText);
                    displayUsers(users.data);
                }
            };

            xhttp.open("GET", "config/usuarios/obtenerusuarios.php", true);
            xhttp.send();
        }

        function displayUsers(users)
        {
            var tableBody = document.getElementById("userTableBody");

            tableBody.innerHTML = '';

            for(var i = 0; i < users.length; i++)
            {
                var user = users[i];
                var newRow = tableBody.insertRow(tableBody.rows.length);

                newRow.insertCell(0).innerHTML = user.id;
                newRow.insertCell(1).innerHTML = user.first_name;
                newRow.insertCell(2).innerHTML = user.last_name;
                newRow.insertCell(3).innerHTML = user.email;
                newRow.insertCell(4).innerHTML = '<img src="' + user.avatar + '" alt="Avatar">';
            }
        }

        window.onload = getUsers;

        function searchUser()
        {
            var userIdInput = document.getElementById("userIdInput");
            var userId = userIdInput.value;

            if(userId != "")
            {
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function()
                {
                    if(this.readyState == 4 && this.status == 200)
                    {
                        var user = JSON.parse(this.responseText);
                        displayUsers([user.data]);
                    }
                };

                xhttp.open("GET", "config/usuarios/obtenerusuarioid.php?id=" + userId, true);
                xhttp.send();
            }
            else
            {
                getUsers();
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>