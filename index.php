<!DOCTYPE html>

<?php include 'conexion.php'; ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro a PHP</title>
</head>
    <body>
        <form action="store.php" method="POST">
            <label for="firstName">
                Nombre: <input type="text" name="firstName" id="firstName">
            </label><br>

            <label for="lastName">
                Apellidos: <input type="text" name="lastName" id="lastName">
            </label><br>
            
            <label for="email">
                Correo: <input type="email" name="email" id="email">
            </label><br>
            
            <label for="comments">
                Comentarios: <textarea name="comments" id="comments" cols="25" rows="3"></textarea>
            </label><br>

            <label for="masculino">Género:<br>
                <input type="radio" name="genre" id="masculino" value="M">Masculino
            </label><br>
            <label for="femenino">
                <input type="radio" name="genre" id="femenino" value="F">Femenino
            </label><br>
            <label for="otro">
                <input type="radio" name="genre" id="otro" value="O">Otro
            </label><br>
            
            <input type="submit" value="Enviar"><br>

            <?php
                $sql = "SELECT * FROM usuarios";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Correo</th><th>Comentarios</th><th>Género</th></tr>";
                foreach($stmt->FetchAll() as $miembro){
                    echo 
                    "<tr>
                        <td>", $miembro['id'], "</td>
                        <td>", $miembro['nombre'], "</td>
                        <td>", $miembro['apellidos'], "</td>
                        <td>", $miembro['correo'], "</td>
                        <td>", $miembro['comentarios'], "</td>
                        <td>", $miembro['genero'], "</td>
                    <t/r>";
                }
            ?>

        </form>
    </body>
</html>