<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/Clientesfunciones.php';

$db = new Database();
$con = $db->conectar();

$errors = [];
if (!empty($_POST)){

    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $dni = trim($_POST['dni']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if(esNulo([$nombre, $apellidos, $email, $telefono, $dni, $usuario, $password, $repassword])){
        $errors[] = "Debe llenar todos los campos";
    }

    if(!esEmail($email)){
        $errors[] = "La dirección de correr no es valida";
    }

    if(!validaPassword($password, $repassword)){
        $errors[] = "Las contraseñas no coinciden";
    }

    if(usuarioExiste($usuario, $con)){
        $errors[] = "Este usuario $usuario ya existe";
    }

    if(emailExiste($email, $con)){
        $errors[] = "Este correo ya esta registrado";
    }

    if(count($errors) == 0){

    $id = registrar([$nombre, $apellidos, $email, $telefono, $dni], $con);
 
    if($id > 0){
        require 'clases/Mailer.php';
        $mailer = new Mailer();
        $token = generarToken();
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        $idUsuario = registrarUsuario([$usuario, $pass_hash, $token, $id], $con);
        if ($idUsuario > 0) {
            $url = SITE_URL . '/activarC.php?id=' . $idUsuario . '&token=' . $token;  //token de seguridad para que el usuario se pueda registrar
            $asunto = "Activar cuenta";
            $cuerpo = "$nombre, <br>para activar tu cuenta sigue este enlace: <a href='$url'>Activar cuenta</a>";
            $errors [] = $cuerpo;
            if ($mailer->enviarEmail($email, $asunto, $cuerpo)) {
                //echo "Para terminar el proceso de registro, sigue las instrucciones que te hemos enviado a tu correo electrónico.";
                exit;
            }
        }else {
            $errors[] = "Error al registrar usuario"; 
        }
    } else {
        $errors[] = "Error al registrar cliente";
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
        main {
            margin-top: 150px;
            margin-bottom: 50px;
        }
        .col-md-6{
            color: white;
        }
        body {
    background-image: url('assets/images/f2.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
}

    </style>
</head>

<body id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

    <main>
        <div class="container">
            <h2 style="color: white;">Registro</h2>

            <?php mostrarMensajes($errors); ?>
            <form class="row g-3" action="Re.php" method="post" autocomplete="off">
                <div class="col-md-6">
                    <label for="nombre"> Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="apellidos"> Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="email"> Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <span id="validaEmail" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                    <label for="telefono"> Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="dni"> Numero de boleta </label>
                    <input type="text" name="dni" id="dni" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="usuario"> Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control">
                    <span id="validaUsuario" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                    <label for="password"> Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="repassword"> Repetir contraseña</label>
                    <input type="password" name="repassword" id="repassword" class="form-control">
                </div>

                <div class="col-12">
                    <button href="<?php $url ?>" type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
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
    <script>
    let txtUsuario = document.getElementById('usuario');
    txtUsuario.addEventListener("blur", function(){
        existeUsuario(txtUsuario.value);
    }, false);
    
    let txtEmail = document.getElementById('email');
    txtEmail.addEventListener("blur", function(){
        existeEmail(txtEmail.value);
    }, false);
    
    function existeUsuario($usuario){
        let url = "clientesAjax.php";
        let formData = new FormData();
        formData.append("action", "existeUsuario");
        formData.append("usuario", $usuario);
        
        fetch(url, {
            method: 'POST', 
            body: formData
        }).then(response => response.json())
        .then(data => {
            if(data.ok){
                document.getElementById('usuario').value = '';
                document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible';
            } else {
                document.getElementById('validaUsuario').innerHTML = '';
            }
        });
    }
    
    function existeEmail($email){
        let url = "clientesAjax.php";
        let formData = new FormData();
        formData.append("action", "existeEmail");
        formData.append("email", $email);
        
        fetch(url, {
            method: 'POST', 
            body: formData
        }).then(response => response.json())
        .then(data => {
            if(data.ok){
                document.getElementById('email').value = '';
                document.getElementById('validaEmail').innerHTML = 'Email no disponible';
            } else {
                document.getElementById('validaEmail').innerHTML = '';
            }
        });
    }
    </script>
</body>

</html>
