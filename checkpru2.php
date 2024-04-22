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
    </style>
</head>


<body id ="top" style= "background-color: white;">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

    <main>
        <div class="container" style= "margin-top: 150px; margin-bottom: 50px;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
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
                                <div class="image-wrapper">
                                    <?php
                                    $imagen = "./imagenes/productos/" . $Id_prod . "/$Id_prod.png";
                                    if (!file_exists($imagen)) {
                                        $imagen = "./imagenes/no-photo.jpeg";
                                    }
                                    ?>
                                    <img src="<?php echo $imagen; ?>" style="height: auto; width: 180px;">
                                </div>
                                <div class="text-wrapper">
                                    <?php echo $Nomp; ?>
                                </div>
                            </td>
                            <td><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></td>
                            <td>
                                <input style="text-align: center;" type="number" min="1" max="10" step="1"
                                    value="<?php echo $cantidad?>" size="5"
                                    id="cantidad_<?php echo $Id_prod; ?>"
                                    onchange="actualizaCantidad(this.value, <?php echo $Id_prod; ?>)">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $Id_prod; ?>" name="subtotal[]"><?php echo MONEDA .
                                    number_format($subtotal, 2, '.', ','); ?></div>
                            </td>
                            <td><a href="#" id="eliminar" class="btn btn-warning btn-sm"
                                    data-bs-Id_prod="<?php echo $Id_prod; ?>" data-bs-toggle="modal"
                                    data-bs-target="#eliminaModal">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ',') ?></p>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>

            <?php if ($lista_carrito != null) { ?>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <a href="pago.php" class="btn btn-primary">Realizar pago</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar este producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Si</button>
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
      <script src="assets/js/script.js"></script>
    
      <!-- 
        - ionicon link
      -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function (event) {
            let button = event.relatedTarget
            let Id_prod = button.getAttribute('data-bs-Id_prod')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value = Id_prod
        })

        function actualizaCantidad(cantidad, Id_prod) {
            let url = 'prototipo2/ActuCarPrub2.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('Id_prod', Id_prod)
            formData.append('cantidad', cantidad)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
                .then(data => {
                    if (data.ok) {

                        let divsubtotal = document.getElementById('subtotal_' + Id_prod)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }

                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                    }
                });
        }

        function eliminar() {

            let buttonElimina = document.getElementById('btn-elimina')
            let Id_prod = buttonElimina.value

            let url = 'prototipo2/ActuCarPrub2.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('Id_prod', Id_prod)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload()
                    }
                })
        }
    </script>
</body>

</html>
