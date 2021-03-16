
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "php-d13";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if(!empty($_POST['firstName'])){
        // Recibir datos
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];
        $genre = $_POST['genre'];

        // Validar datos

        // Guardar a DB
        $sql = "INSERT INTO usuarios(nombre, apellidos, correo, comentarios, genero) VALUES ('$firstName', '$lastName', '$email', '$comments', '$genre')";;
        $conn->exec($sql);

        // Redireccionar
        header('Location: index.php');
    }
    else{
        echo "No hay datos";
    }
?>