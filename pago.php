<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

//session_destroy();
//print_r($_SESSION);
$lista_carrito =  array();

if ($productos != null && is_array($productos)) {
    foreach ($productos as $Id_prod => $subArreglo) {
        if (is_array($subArreglo) && isset($subArreglo['num'])) {
            $cantidad = $subArreglo['num'];
            //echo "ID Producto: $Id_prod, cantidad: $cantidad <br>";

            // Realizar consulta SQL
            $sql = $con->prepare("SELECT Id_prod, Nomp, precio, :cantidad as cantidad FROM productos WHERE Id_prod=:Id_prod");
            $sql->bindParam(':Id_prod', $Id_prod);
            $sql->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $sql->execute();

            // Obtener resultados y agregarlos a la lista
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $lista_carrito[] = $row;
            }
        } 
    }
} else {
    header("Location: inter.php");
    exit;
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
        .image-wrapper {
            text-align: left;
        }

        .text-wrapper {
            text-align: left;
            margin-top: 10px;
        }
        #paypal-button-container {
        margin-top: 20px; /* O el valor que prefieras */
        position: relative;
        z-index: 1;
    }
    </style>
</head>

<body id ="top" style= "background-color: white;">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>
    
    <main>
    <div class="container" style= "margin-top: 150px; margin-bottom: 150px;">

        <div class="row">
            <div class="col-6">
                <h4>Detalles de pago</h4>
                <div id="paypal-button-container" style="margin-top: 20px;"> </div>
            </div>
            <div class="col-6">
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>SubTotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($lista_carrito)) {
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacía</b></td></tr>';
                            echo '<script>';
                            echo 'document.addEventListener("DOMContentLoaded", function() {';
                                echo '    var realizarPagoBtn = document.querySelector(".btn.btn-primary");';
                                echo '    realizarPagoBtn.addEventListener("click", function(event) {';
                                echo '        event.preventDefault();';
                                echo '        alert("El carrito se encuentra vacío");';
                                echo '    });';
                                echo '});';
                                echo '</script>';
                        } else {
                            $total = 0;
                            foreach ($lista_carrito as $producto) {
                                $Id_prod = $producto['Id_prod'];
                                $Nomp = $producto['Nomp'];
                                $precio = $producto['precio'];
                                $cantidad = $producto['cantidad'];
                                $subtotal = $cantidad * $precio;
                                $total += $subtotal;
                        ?>

                        <tr>
                            <td>
                                <div class="text-wrapper">
                                    <?php echo $Nomp; ?>
                                </div>
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $Id_prod; ?>" name="subtotal[]"><?php echo MONEDA .
                                    number_format($subtotal, 2, '.', ','); ?></div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ',') ?></p>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
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
      <script src="assets/js/script.js"></script>
    
      <!-- 
        - ionicon link
      -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AVQl17yfB70Wxcm0iZVqSYaz8GiUYZHu1cJ_Td686HO8YSuZ_c4IowtsKH1GN6fv545HPuqQW27XL3th&currency=MXN"></script>
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay',
            },
            createOrder: function(data, actions){ 
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },
            onCancel: function(data) {
                alert("Pago cancelado");
                console.log(data);
            },
            onApprove: function(data, actions){
                actions.order.capture().then(function (detalles) {
                    window.location.href="realizado.html"
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>
