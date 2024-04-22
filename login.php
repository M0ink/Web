<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/Clientesfunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];
if (!empty($_POST)){

    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if(esNulo([$usuario, $password])){
        $errors[] = "Debe llenar todos los campos";
    }

    if(count($errors) == 0){
        $errors[] = login($usuario, $password, $con);
    }
}

$sql = $con->prepare("SELECT Id_prod, Nomp, precio FROM productos");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Ractech Esports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
     <!-- 
          - favicon link
        -->
        <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
        <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">

        <!-- 
          - custom css link
        -->
        <link rel="stylesheet" href="./assets/css/style.css">
      <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">

        <!-- 
          - google font link
        -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
          href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
          rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
    background-image: url('assets/images/f2.png');
    background-size: cover; /* Ajusta la imagen para cubrir todo el fondo */
    background-repeat: no-repeat; /* Evita la repetición de la imagen */
    background-attachment: fixed; /* Fija la imagen de fondo */
}
</style>
</head>

<body id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>
    <main class="form-login m-auto pt-4" style="max-width: 350px;">

    <form class="row g-3" action="login.php" method="post" autocomplete="off"style ="margin-top: 150px; margin-bottom: 50px;">
    <h2 style="color: white;">Iniciar sesión</h2>
    <?php mostrarMensajes($errors); ?>
        <div class="form-floating">
            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
            <label for="usuario">Usuario</label>
        </div>
        <div class="form-floating">
            <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required>
            <label for="password">Contraseña</label>
        </div>
        <div class="d-grid gap-3 col-12">
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
        <hr>
        <div class="col-12">
           <a href="Re.php">¿No tienes una cuenta?</a> 
        </div>
    </form>
</main>

<footer>
    <?php include 'footer.php'; ?>
    </footer>

    <!-- 
        - #GO TO TOP
      -->
    
      <a href="#top" class="btn btn-primary go-top" data-go-top>
        <ion-icon name="chevron-up-outline"></ion-icon>
      </a>
      <!-- 
        - custom js link
      -->
      <script src="./assets/js/jquery-3.5.1.min.js"></script>
      <script src="./assets/js/script.js"></script>
    
      <!-- 
        - ionicon link
      -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
