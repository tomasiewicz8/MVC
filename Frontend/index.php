<?php
    require("../backend/controller/ProductoController.php");
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="/backend/controller/ProductoController.php" method="post">
        <div>
            <label for="product">Introduce un producto:</label>
            <input type="text" name="product" required autocomplete="off">
            <button type="submit" value="">Buscar<img src="./assets/search.svg" alt="" srcset=""></button>
        </div>
    </form>

    <section>
    <?php
        $list = ProductoController::getAllProducts('../database/data.json');

        foreach ($list as $product) { 
            
        }
    ?> 
    </section>

</body>
</html>