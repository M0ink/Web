<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/torneofunciones.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT fechaT, NomTor, idTor, img, tipo, estatus FROM tornG");
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
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
}
main {
    margin-top: 150px;
    margin-bottom: 50px;
  }
  .card {
        background-color: rgba(255, 255, 255, 0.0); /* Ajusta el último valor para controlar la opacidad */
        transition: background-color 0.3s ease; /* Agrega una transición suave */
    }

    .card:hover {
        background-color: rgba(255, 255, 255, 0.0); /* Cambia el color de fondo al pasar el ratón */
    }

    .card:hover img {
        transform: scale(1.1); /* Aumenta el tamaño de la imagen al pasar el ratón */
    }
    .align-items {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white; /* Cambia el color del texto a blanco */
        }
    .align-items img {
            width: 200px;
            height: 88.5px;
        }
</style>
</head>

<body id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

    <main>
    <div class="container">
        <div class="align-items">
            <h2>Torneos</h2>
            <img src="Imagenes/letras.png" alt="Logo" class="img-fluid">
        </div>

        <hr style="border-top: 3px solid white; margin-top: 20px;">

        <div id="alertPlaceholder1"></div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($resultado as $row) {
                $tipo = $row['tipo'];
                $img = $row['img'];
                $imagen = "imagenes/logos/$img.png";

                if (empty($imagen) || !file_exists($imagen)) {
                    $imagen = "imagenes/no-photo.png";
                }

                if (strpos($tipo, 'OF') !== false) {
            ?>
                    <div class="col-md-6">
                    <div class="card shadow-sm h-50 d-flex flex-column align-items-center">
                        <a href="Retor.php?idTor=<?php echo $row['idTor']; ?>&token=<?php echo hash_hmac('sha1', $row['idTor'], KEY_TOKEN); ?>" class="retorLink">
                            <img src="<?php echo $imagen; ?>" alt="<?php echo $row['NomTor']; ?>" class="card-img-top">
                        </a>
                        <div class="card-body justify-content-center">
                            <h5 style="color: white;" class="card-title"><?php echo $row['NomTor']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php }
            } ?>
        </div>

        <hr style="border-top: 5px solid white; margin-top: 20px;">

        <div id="alertPlaceholder2"></div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($resultado as $row) {
                $tipo = $row['tipo'];
                $img = $row['img'];
                $imagen = "imagenes/logos/$img.png";

                if (empty($imagen) || !file_exists($imagen)) {
                    $imagen = "imagenes/no-photo.png";
                }

                if (strpos($tipo, 'OF') === false) {
            ?>
                    <div class="col-md-4">
                    <div class="card shadow-sm h-50 d-flex flex-column align-items-center">
                        <a href="Retor.php?idTor=<?php echo $row['idTor']; ?>&token=<?php echo hash_hmac('sha1', $row['idTor'], KEY_TOKEN); ?>" class="retorLink">
                            <img src="<?php echo $imagen; ?>" alt="<?php echo $row['NomTor']; ?>" class="card-img-top">
                        </a>
                        <div class="card-body justify-content-center">
                            <h5 style="color: white;" class="card-title"><?php echo $row['NomTor']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php }
            } ?>
        </div>
    </div>
</main>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advertencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Por favor, inicie sesión para continuar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

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
    
    <script>
     document.addEventListener('DOMContentLoaded', function () {
        var retorLinks = document.querySelectorAll('.retorLink');

        retorLinks.forEach(function (retorLink) {
            retorLink.addEventListener('click', function (event) {
                // Verificar si la sesión está vacía y mostrar el modal
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    event.preventDefault();
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                    myModal.show();
                <?php } ?>
            });
        });
    });
</script>
</body>
</html>
