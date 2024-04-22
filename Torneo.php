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
    <link rel="stylesheet" href="./assets/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="Casa.css" media="screen">
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
</head>

  <body data-home-page-title="Casa" data-include-products="false" class="u-body u-xl-mode" data-lang="es" id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

    <main>
    <section class="u-align-right u-clearfix u-image u-shading u-section-1" id="carousel_745c">
  <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-middle-xs u-sheet-1">
    <p class="u-text u-text-body-alt-color u-text-2"></p>
    <!-- El resto del contenido del banner -->
    <div class="text-center">
    <h1 class="h1 hero-title animate-on-scroll" style="font-size: 72px;">T O U R N A M E N T</h1>
      </div>
    </div>
  </div>
</section>

      <section class="u-align-center u-clearfix u-palette-5-light-2 u-section-3" id="carousel_e34b">
      <h2 class="u-custom-font u-font-playfair-display u-text u-text-1">Torneos oficiales</h>
      </section>
      <section class="u-align-center u-clearfix u-palette-5-light-2 u-section-3" id="carousel_e34b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                        <div class="u-layout-row">
                        <?php foreach ($resultado as $row) {
                    $tipo = $row['tipo'];
                    $img = $row['img'];
                    $imagen = "imagenes/Torneos/$img.png";

                    if (empty($imagen) || !file_exists($imagen)) {
                        $imagen = "imagenes/no-photo.png";
                    }

                    if (strpos($tipo, 'OF') !== false) {
                ?>
                            <div class="u-align-left u-container-style u-expand-resize u-layout-cell u-left-cell u-size-30 u-size-30-md u-white u-layout-cell-1">
                              <div class="u-container-layout u-container-layout-1">
                                    <a class="u-expanded-width u-image u-image-1 retorLink" href="Retor.php?idTor=<?php echo $row['idTor']; ?>&token=<?php echo hash_hmac('sha1', $row['idTor'], KEY_TOKEN); ?>">
                                        <img src="<?php echo $imagen; ?>" alt="<?php echo $row['NomTor']; ?>" class="card-img-top">
                                    </a>
                                </div>
                            </div>
                            <?php
                    }
                } ?>
                        </div>
            </div>
        </div>
    </div>
</section>

<section class="u-align-center u-clearfix u-palette-5-light-2 u-section-3" id="carousel_e34b">
      <div class="u-clearfix u-sheet u-sheet-2">
      <h2 class="u-custom-font u-font-playfair-display u-text u-text-1">Torneos Populares</h2>
        <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                        <div class="u-layout-row">
                        <?php foreach ($resultado as $row) {
                    $tipo = $row['tipo'];
                    $img = $row['img'];
                    $imagen = "imagenes/Torneos/$img.png";

                    if (empty($imagen) || !file_exists($imagen)) {
                        $imagen = "imagenes/no-photo.png";
                    }

                    if (strpos($tipo, 'OF') === false) {
                ?>
                            <div class="u-align-left u-container-style u-expand-resize u-layout-cell u-left-cell u-size-20 u-size-20-md u-white u-layout-cell-1">
                              <div class="u-container-layout u-container-layout-1">
                                    <a class="u-expanded-width u-image u-image-1 retorLink" href="Retor.php?idTor=<?php echo $row['idTor']; ?>&token=<?php echo hash_hmac('sha1', $row['idTor'], KEY_TOKEN); ?>">
                                        <img src="<?php echo $imagen; ?>" alt="<?php echo $row['NomTor']; ?>" class="card-img-top">
                                    </a>
                                    <h4 class="u-text u-text-2">
                                        <a style=""><?php echo $row['NomTor']; ?></a>
                                    </h4>
                                </div>
                            </div>
                            <?php
                    }
                } ?>
                        </div>
            </div>
        </div>
    </div>
</section>
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
    </section>
  
</body>
</html>