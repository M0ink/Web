<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/Clientesfunciones.php';
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet">

    <title>ExpertD.</title>
  </head>
 
<body id="top">

    <!-- 
      - #HEADER
    -->
  
    <header class="header">
      <?php include 'header.php'; ?>
    </header>

      <!--Aqui esta el home, osea el video-->
<section class="hero" id="hero">
    <div class="container">
  
      <!-- Aquí reemplaza el contenido actual con la etiqueta de video -->
      <video autoplay muted loop>
        <source src="./assets/images/fondo.mp4" type="video/mp4">

        <!-- Agrega más sources si deseas soportar múltiples formatos de video -->
        Tu navegador no soporta el elemento de video.
      </video>
  
      <!-- El resto del contenido del banner -->
      <p class="hero-subtitle animate-on-scroll">V I D E O G A M E S</p>
      <h1 class="h1 hero-title animate-on-scroll">COMMUNITY</h1>
      </div>
    </div>
  </section>
  
<section class="d-flex flex-column justify-content-center align-items-center pt-5  text-center w-50 m-auto" id="intro">
  <h1 class="p-3 fs-2 border-top border-3">
    <span class="text-primary" style="font-weight: bold; color: white !important;">
        A&nbsp;N&nbsp;U&nbsp;N&nbsp;C&nbsp;I&nbsp;O&nbsp;S
    </span>
</h1>

    </section>
<!-- Carrusel de imágenes -->
<div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
            <a href="https://www.songofnunu.com/es-mx/" target="_blank">
                <img src="./assets/images/sonf-nunu.jpg" class="d-block w-100 img-fluid carousel-image" alt="">
            </a>
        </div>
          
        <div class="carousel-item" data-bs-interval="3000">
            <a href="https://lolesports.com/article/estado-del-juego-esports-de-lol-en-2024/blt2d30ff1e12862524" target="_blank">
                <img src="./assets/images/max.jpg" class="d-block w-100 img-fluid carousel-image" alt="...">
            </a>
        </div>
        
        <div class="carousel-item" data-bs-interval="3000">
            <a href="https://www.youtube.com/watch?v=KJHK-AaR1G0" target="_blank">
                <img src="./assets/images/latamREMIX.jpg" class="d-block w-100 img-fluid carousel-image" alt="...">
            </a>
        </div>

        <div class="carousel-item" data-bs-interval="3000">
            <a href="https://playvalorant.com/es-mx/news/announcements/rp-y-vp-al-alcance-de-un-clic-con-yape/" target="_blank">
                <img src="./assets/images/VALOR.jpg" class="d-block w-100 img-fluid carousel-image" alt="....">
            </a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<style>
    .carousel-image {
        width: 1200px; /* Ajusta el ancho deseado */
        height: 600px; /* Ajusta el alto deseado */
        object-fit: cover; /* Esto ayuda a mantener la proporción */
    }
</style>


<section class="d-flex flex-column justify-content-center align-items-center pt-5 text-center w-50 m-auto" id="intro" style="color: white;">
  <h1 class="p-3 fs-2 border-top border-3">
      <span style="font-weight: bold;">League of Legends / VALORANT / Teamfight Tactics</span>
      <span class="text-primary"></span>
  </h1>
</section>
    <br><br>

    <style>
        #equipo {
            width: 100%; /* Ajusta el ancho deseado */
            margin: 0 auto; /* Establece márgenes automáticos a los lados */
        }
    </style>
    
    <section class="widgets-section">
        <!-- Widget de Discord -->
        <div class="widget">
            <widgetbot
                server="1108564314320797779"
                channel="1192672242929242163"
                width="1200"
                height="800"
            ></widgetbot>
            <script src="https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"></script>
        </div>
    
        <!-- Widget de Spotify -->
        <div class="widget">
            <iframe src="https://open.spotify.com/embed/playlist/5zVHxuusXDZZ3nAZctvfG8" width="400" height="800" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </section>
    
    <!-- Enlace del servidor de Discord y de Spotify -->
    <div class="buttons-container">
        <div class="discord-banner">
            <a href="https://discord.com/invite/riotgameslatam" target="_blank" class="discord-link">
                <img src="./assets/images/discord-logo-2.svg" alt="Unirse a nuestro servidor Discord" class="discord-logo">
            </a>
        </div>
        
        <div class="spotify-banner">
            <a href="https://open.spotify.com/user/riotrecords" target="_blank" class="spotify-link">
                <img src="./assets/images/Spotify_logo_with_text.svg.png" alt="Abrir enlace de Spotify" class="spotify-logo">
            </a>
        </div>
    </div>
     
    <style>
    .widgets-section {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin-bottom: 5px; /* Espacio entre los widgets y el botón */
    }
    
    .widget {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 10px; /* Reducción del espacio entre widgets */
        height: 600px; /* Ajustar la altura según sea necesario */
    }
    
    .discord-banner {
        display: flex;
        justify-content: center;
        margin-top: 20px; /* Reducción del espacio entre widgets y el botón */
    }
    
    .discord-link {
        width: 200px;
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .discord-logo {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }
    
    .discord-logo:hover {
        transform: scale(1.1);
    }

    .buttons-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 5px; /* Espacio entre widgets y botones */
}

.discord-banner,
.spotify-banner {
    margin: 0 20px; /* Espacio entre los botones */
}

.discord-link,
.spotify-link {
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.discord-logo,
.spotify-logo {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease-in-out;
}

.discord-logo:hover,
.spotify-logo:hover {
    transform: scale(1.1);
}
    </style>
    
    

<br><br><br><br><br><br><br><br>

<section id="seccion-contacto" class="border-bottom border-secondary border-2">
  <div id="bg-contactos">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1b2a4e" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
  </div>


  <div class="container  border-top border-primary " style="max-width: 500px" id="contenedor-formulario">
      <div class="text-center mb-4" id="titulo-formulario">
        <div><img src="./assests/img/support.png" alt="" class="img-fluid ps-5"></div>
        <br>
        <h2>Contactanos</h2>
        <p class="fs-5">Se parte como desarrollador</p>
      </div>

     

      <form method="POST" data-netlify="true" id="contactForm">
        <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="David Marcelo Hernandez Davalos" required>
        </div>
        <div class="mb-3">
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="565555555555" required pattern="[0-9]{10}">
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="message" id="message" rows="4" placeholder="Escribe por qué estás interesado en ser parte del proyecto LIE" required></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100 fs-5">Enviar Mensaje</button>
        </div>
    </form>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
    
            // Validar el formulario
            if (this.checkValidity()) {
                // Si el formulario es válido, enviarlo a Netlify Forms
                fetch('/', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams(new FormData(this)).toString(),
                })
                    .then(() => {
                        // Limpiar el formulario después del envío exitoso
                        document.getElementById('contactForm').reset();
                        alert('Mensaje enviado correctamente');
                    })
                    .catch((error) => alert('Hubo un error al enviar el mensaje:', error));
            } else {
                // Si el formulario no es válido, mostrar un mensaje de error
                alert('Por favor completa correctamente todos los campos del formulario.');
            }
        });
    </script>
    

  </div>
</section>

<footer>
  <?php include 'footer.php'; ?>
  </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Original -->
    
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

  
  </body>
</html>