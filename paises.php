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
        <h2>Países</h2>
        <div class="container">
            <table id="tabla-paises">
                <thead>
                    <tr>
                        <th>País</th>
                        <th>Capital</th>
                        <th>Región</th>
                        <th>Subregión</th>
                        <th>Población</th>
                    </tr>
                </thead>
                <tbody id="countryTableBody"></tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function getCountries() 
        {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var countries = JSON.parse(this.responseText);
                    displayCountries(countries);
                }
            };

            xhttp.open("GET", "config/paises/obtenerpaises.php", true);
            xhttp.send();
        }

        function displayCountries(countries) 
        {
            var tableBody = document.getElementById("countryTableBody");

            tableBody.innerHTML = '';

            for(var i = 0; i < countries.length; i++)
            {
                var country = countries[i];
                var newRow = tableBody.insertRow(tableBody.rows.length);

                newRow.insertCell(0).innerHTML = country.name;
                newRow.insertCell(1).innerHTML = country.capital;
                newRow.insertCell(2).innerHTML = country.region;
                newRow.insertCell(3).innerHTML = country.subregion;
                newRow.insertCell(4).innerHTML = country.population;
            }
        }

        window.onload = getCountries;
    </script>
</body>
</html>