<?php
//Conexion a base de datos 
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

//session_destroy();
$Id_prod = isset($_GET['Id_prod']) ? $_GET['Id_prod']: '';
$token = isset($_GET['token']) ? $_GET['token']: '';


if($Id_prod == ''  ||$token == ''){
  echo 'Error';
  exit;
} else{
  $token_tmp = hash_hmac('sha1', $Id_prod, KEY_TOKEN);


  if($token == $token_tmp){


    $sql = $con->prepare("SELECT count(Id_prod) FROM productos WHERE Id_prod=?");
    $sql ->execute([$Id_prod]);
    if ($sql->fetchColumn() > 0) {


      $sql = $con->prepare("SELECT Nomp, Descrip, precio FROM productos WHERE Id_prod=?");
      $sql ->execute([$Id_prod]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);
      $Nomp = $row['Nomp'];
      $Descrip = $row['Descrip'];
      $precio = $row['precio'];
      $dir_images = 'imagenes/productos/' . $Id_prod . '/';


      $rutaImg = $dir_images . "/$Id_prod.png";
      if (!file_exists($rutaImg)) {
        $rutaImg = 'imagenes/no-photo.png';
      }

      $imagenes = array();
      $dir = dir($dir_images);
      while(($archivo = $dir->read()) !=false){
        if($archivo !='1.png' && (strpos($archivo, 'png') || strpos($archivo, 'png'))){
          $imagenes[] = $dir_images . $archivo;
        }
      }
      $dir->close();
    }
  } else{
    echo 'Error';
    exit;
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
  main {
    background-color: white;
    margin-top: 150px;
    margin-bottom: 50px;
  }
.color-buttons-container {
    display: flex;
    flex-direction: row;
    margin-top: 5px;
  }
.color-button {
    margin-right: 10px;
  }

.wrapper {
    height: 50px;
    min-width: 80px;
    display: flex;
    align-items: center;
    background: #FFF;
    border-radius: 6px;
    box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.2);
  }

  .wrapper span {
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 109;
    cursor: pointer;
    user-select: none;
  }

    .wrapper span.num {
    font-size: 18px;
    border-right: 1px solid rgba(0, 0, 0, 0.2);
    border-left: 1px solid rgba(0, 0, 0, 0.2);
    pointer-events: none;
  }
</style>
</head>

<body id ="top" style= "background-color: white;">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>
</head> 
  <main>
  <div class="container">
    <div class="row">
      <div class="col-md-6 order-md-1">
        <img id="pic" class="d-block w-100" src="<?php echo $rutaImg; ?>" alt="pic">
      </div>
      <div class="col-md-6 order-md-2">
        <h2><?php echo $Nomp; ?></h2>
        <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
        <p class="lead">
          <?php echo $Descrip; ?>
        </p>

<div class="col-md-4 order-md-3">
          <div class="wrapper" style="height: 50px; margin-top: 10px;">
            <span class="minus">-</span>
            <span class="num">01</span>
            <span class="plus">+</span>
        </div>

          <script>
            const plus = document.querySelector(".plus");
            const minus = document.querySelector(".minus");
            let a = 1;

            let num = document.querySelector(".num");

            plus.addEventListener("click", () => {
              if (a < 10) {
                a++;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;
              }
            });
            minus.addEventListener("click", () => {
              if (a > 1) {
                a--;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;
              }
            });
          </script>
        </div>
        <div class="d-grid gap-3 col-20 mx-auto" style="margin-top: 15px; ">
          <button class="btn btn-primary" type="button" onclick="addProducto(<?php echo $Id_prod; ?>, '<?php echo $token_tmp; ?>', a)">Agregar al carrito</button>
        </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
              function addProducto(Id, token, num) {
                let url = 'prototipo2/carritoprub2.php';
                let formData = new FormData();
                num = Number(num);
                //idcol = Number(idColSeleccionado);
                formData.append('Id', Id);
                formData.append('token', token);
                formData.append('num', num);
                //formData.append('Id_col', idcol);

                console.log('Datos a enviar:', {
                  Id: Id,
                  token: token,
                  num: num,
                  //Id_col: idcol,
                });
                
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                  }).then(response => response.json())
                  .then(data => {
                    if (data.ok) {
                      let elemento = document.getElementById("C");
                      elemento.innerHTML = data.numero;
                    }
                  })
              }
            </script>
</body>
</html>