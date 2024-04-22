<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$Id_cat = isset($_GET['Id_cat']) ? $_GET['Id_cat'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($Id_cat == '' || $token == '') {
  echo 'Error';
  exit;
} else {
  $sql = $con->prepare("SELECT Id_prod, Nomp, precio FROM prodc WHERE Id_cat = :Id_cat");
  $sql->bindParam(':Id_cat', $Id_cat);
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet">
    <style>
  main {
    margin-top: 150px;
  }
</style>
</head>

<body id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

  <main>
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($resultado as $row) { ?>
          <div class="col">
            <div class="card shadow-sm">
              <?php
              $Id_prod = $row['Id_prod'];
              $imagen = "imagenes/productos/" . $Id_prod . "/$Id_prod.png";
              if (!file_exists($imagen)) {
                $imagen = "imagenes/no-photo.png";
              }
              ?>
              <img src="<?php echo $imagen; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['Nomp']; ?></h5>
                <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="det.php?Id_prod=<?php echo $row['Id_prod']; ?>&token=<?php echo hash_hmac('sha1', $row['Id_prod'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
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