<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/torneofunciones.php';

$db = new Database();
$con = $db->conectar();

$idTor = isset($_GET['idTor']) ? $_GET['idTor'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
//print_r($_SESSION);
//print_r($idTor);

if ($idTor == '' || $token == '') {
    echo 'Error';
} else {
    $sql = $con->prepare("SELECT count(idTor) FROM inftor WHERE idTor=?");
    $sql->execute([$idTor]);
    if ($sql->fetchColumn() > 0) {
        $sql = $con->prepare("SELECT NomTor FROM tornG WHERE idTor=?");
        $sql->execute([$idTor]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $NomTor = $row['NomTor'];

        $errors = [];
        if (!empty($_POST)) {
            $gametag = trim($_POST['gametag']);
            $correoinst = trim($_POST['correoinst']);
            $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
            $idTor = $idTor;
            
            if (esNulo([$gametag, $correoinst])) {
                $errors[] = "Debe llenar todos los campos";
            }

            if(!esEmail($correoinst)){
                $errors[] = "La dirección de correo no es valida";
            }

            if (count($errors) == 0) {
                $idGamer = gamers([$correoinst, $id], $con);

                if ($idGamer !== 0) {
                    $idG = registrargt([$id, $idTor, $gametag], $con);
                } else {
                    $errors[] = "Error al registrar al jugardor";
                }
            } 
        }
    }
}
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
main {
    margin-top: 100px;
  }
  .col-md-6{
            color: white;
        }
</style>
</head>

<body id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

    <main>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <h2 style="color: white;"><?php echo $row['NomTor']; ?></h2>
                <?php mostrarMensajes($errors); ?>
                <i style="color: white;"><b>Nota: </b>Llene los campos para registrarse</i>

                <form action="Retor.php?idTor=<?php echo $idTor; ?>&token=<?php echo hash_hmac('sha1', $idTor, KEY_TOKEN); ?>" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="correoinst" class="form-label">Correo Institucional</label>
                        <input type="text" name="correoinst" id="correoinst" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="gametag" class="form-label">Gametag</label>
                        <input type="text" name="gametag" id="gametag" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <img src="Imagenes/Logo.png" alt="Logo" class="img-fluid">
            </div>
        </div>
    </div>
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