<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/Clientesfunciones.php';
//$db = new Database();
//$con = $db->conectar();

//$sql = $con->prepare("SELECT Id_prod, Nomp, precio FROM productos");
//$sql->execute();
//$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
//session_destroy();
//print_r($_SESSION);

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

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header">
    <?php include 'header.php'; ?>
  </header>





  <main>
    <article>

    
      <!-- 
        - #HERO
      -->
      <!--Aqui esta el home, osea el video-->
      <section class="hero" id="hero">
        <div class="container">
      
          <!-- Aquí reemplaza el contenido actual con la etiqueta de video -->
          <video autoplay muted loop>
            <source src="./assets/images/STAY1.mp4" type="video/mp4">

            <!-- Agrega más sources si deseas soportar múltiples formatos de video -->
            Tu navegador no soporta el elemento de video.
          </video>
      
          <!-- El resto del contenido del banner -->
          <p class="hero-subtitle animate-on-scroll">Liga Interuniversitaria de</p>
          <h1 class="h1 hero-title animate-on-scroll">e-sports</h1>
          <div class="btn-group animate-on-scroll">

            <a href="transmision.html" class="btn btn-primary">
              <span>Directo/Streaming</span>
              <ion-icon name="play-circle"></ion-icon>
          </a>
            </button>
            <a href="https://www.twitch.tv/k3soju" target="_blank" class="btn btn-link">Twitch</a>


          </div>
      
        </div>
      </section>
<!--Seccion de patrocinadores-->
<section class="patrocinadores">
  <div class="container">
    <div class="logos">
    
      <a href="https://mx.msi.com" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/MSI-Logo-2019.png" alt="MSi">
    </a>
    
    <a href="https://rog.asus.com/mx/" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/asus rog.png" alt="ASUS ROG">
    </a>
    
    <a href="https://www.logitech.com/es-mx" class="logi-logo" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/logi2.svg" alt="Logitech">
    </a>
    
    <a href="https://www.corsair.com/es/es/s/icue" class="corsair-logo" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/Corsair.png" alt="Corsair">
    </a>
    
    <a href="https://www.dell.com/en-us/gaming/alienware" class="alienware-logo" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/alien4.png" alt="Alienware">
    </a>
    
    <a href="https://www.razer.com/latam-es/pc/software" class="razer-logo" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/razer2.png" alt="Razer">
    </a>
    
    <a href="https://www.gigabyte.com/mx" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/Gigabyte.png" alt="Gigabyte">
    </a>
    
    <a href="https://row.hyperx.com/?loc=MX&lang=EN" class="hyperx-logo" target="_blank" rel="noopener noreferrer">
        <img src="./assets/images/HyperX.png" alt="HyperX">
    </a>
      
      
 
      <!-- Agrega el resto de logos aquí -->
    </div>
  </div>
</section>




      <div class="section-wrapper">

        <!-- 
          - #ABOUT
        -->

        <section class="about" id="about">
          <div class="container">

            <figure class="about-banner">

              <img src="./assets/images/about-img.png" alt="M shape" class="about-img">

              <img src="./assets/images/character-1.png" alt="Game character" class="character character-1">

              <img src="./assets/images/character-2.png" alt="Game character" class="character character-2">

              <img src="./assets/images/character-3.png" alt="Game character" class="character character-3">

            </figure>

            <div class="about-content">

              <p class="about-subtitle" style="color: white; text-shadow: 2px 2px 4px black;">Somos ESPORTS - Somos tu LIGA</p>


              <h2 class="about-title"> Experience just for gamers <strong> ALWAYS </strong> </h2>

              <p class="about-text">
                "Explora un mundo de competición en nuestra plataforma: torneos personalizados, 
                transmisiones en vivo de eventos oficiales, tienda con productos de la comunidad y 
                la oportunidad de formar parte del futuro del gaming académico. 
                 
                 ¡Únete y disfruta de todo lo que ofrecemos!"
              </p>

              <p class="about-bottom-text">
                <ion-icon name="arrow-forward-circle-outline"></ion-icon>

                <span> <a href="./login.php" class="register-button">Regístrate Ahora</a>
 </span>
              </p>

            </div>

          </div>
        </section>





  <!-- 
    - #FOOTER
  -->

  <footer>

<div class="footer-top">
  <div class="container">

    <div class="footer-brand-wrapper">

      <a href="#" class="logo">
        <img src="./assets/images/lie3.png" alt="LIE logo" style="width: 400px; height: auto;">
    </a>
    
    

      <div class="footer-menu-wrapper">

       <!--<div class="footer-input-wrapper">
          <input type="text" name="message" required placeholder="Find Here Now" class="footer-input">

          <button class="btn btn-primary">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </div>-->

        <div class="footer-acerca">
          <h2 class="about-title" data-content="Acerca de nosotros" style="color: white;">Acerca de nosotros</h2>

         
          
          <p class="about-text">Somos un grupo de jóvenes con la idea de fusionar los
            ámbitos académicos y de videojugos, para crear una comunidad basada en los
            intereses de los estudantes, integrando la diversión de los videojuegos con el aprendizaje, 
            y promoviendo la participación y el compañerismo.
          </p>

        </div>

      </div>

    </div>

    <div class="footer-quicklinks">

      <ul class="quicklink-list" >

        <li>
          <a href="#" class="quicklink-item">Faq</a>
        </li>

        <li>
          <a href="#" class="quicklink-item">Help center</a>
        </li>

        <li>
          <a href="#" class="quicklink-item">Terms of use</a>
        </li>

        <li>
          <a href="#" class="quicklink-item">Privacy</a>
        </li>

      </ul>

      <ul class="footer-social-list">

        <li>
          <a href="https://discord.gg/4rMcrBmS" class="footer-social-link" target="_blank">
            <ion-icon name="logo-discord"></ion-icon>
          </a>
        </li>
        

        <li>
          <a href="#" class="footer-social-link">
            <ion-icon name="logo-twitch"></ion-icon>
          </a>
        </li>

        <li>
          <a href="https://www.xbox.com/es-mx/xbox-game-pass/pc-game-pass/direct?ef_id=_k_CjwKCAiA1MCrBhAoEiwAC2d64eeXxvshZmjElaFL_Xy4OTp8E1OxILw40hfTRKHlqlF2m9tb4SbzCxoCoTkQAvD_BwE_k_&OCID=AIDcmmadpldw2u_SEM__k_CjwKCAiA1MCrBhAoEiwAC2d64eeXxvshZmjElaFL_Xy4OTp8E1OxILw40hfTRKHlqlF2m9tb4SbzCxoCoTkQAvD_BwE_k_&gad_source=1&gclid=CjwKCAiA1MCrBhAoEiwAC2d64eeXxvshZmjElaFL_Xy4OTp8E1OxILw40hfTRKHlqlF2m9tb4SbzCxoCoTkQAvD_BwE" class="footer-social-link" target="_blank">
            <ion-icon name="logo-xbox"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="footer-social-link">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>
        </li>

      </ul>

    </div>

  </div>
</div>

<div class="footer-bottom">
  <div class="container">
    <p class="copyright" style="text-align: center;">
      Copyright &copy; 2023 <a href="#">LIGA-INTERUNIVERSITARIA-ESPORTS</a>. RACTECH 
    </p>
    <span style="float: left;">  <p class="copyright" style="text-align: center;">Página con fines académicos</p></span>

    <!--<figure class="footer-bottom-img">
      <img src="./assets/images/footer-bottom-img.png" alt="Online payment companies logo">
    </figure>-->
  </div>
</div>

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

  <!--<script src="https://kit.fontawesome.com/cd33816f91.js" crossorigin="anonymous"></script>-->
  <script src="https://kit.fontawesome.com/265ee29cb5.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


  

</body>

</html>