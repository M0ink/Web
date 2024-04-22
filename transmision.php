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
        <title>Transmisión-Ractech</title>
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
      
      <body id ="top">
    <header class="header">
    <?php include 'header.php'; ?>
    </header>

    <style>
    /* Estilos CSS para los logos de videojuegos */
    .game-logos {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative; /* Para que los logos estén por encima de la barra */
    z-index: 2; /* Asegura que estén encima de la barra */
    margin-top: 20px; /* Ajusta el margen para separar la barra de los logos */
}

.game-logos img {
    width: 170px; /* Ancho definido */
    height: auto; /* Altura automática para mantener la proporción */
    margin: 0 15px; /* Espacio entre las imágenes */
    max-width: 100%; /* Ancho máximo al 100% del contenedor */
    transition: transform 0.3s ease-in-out; /* Transición para el efecto de zoom */
    cursor: pointer; /* Cambia el cursor al interactuar con las imágenes */
}

.game-logos img:hover {
    transform: scale(1.1); /* Aplica un zoom al pasar el cursor sobre las imágenes */
}

</style>

<!-- Coloca tus elementos HTML aquí -->
<section class="twitch-stream">
  <div class="twitch-embed" id="twitch-embed"></div>
  <br>
  <section class="game-logos">
      <img src="./assets/images/valorant.p.png" alt="Valorant" onclick="cambiarValorant()">
      <img src="./assets/images/lol.png" alt="League of Legends" onclick="cambiarLoL()">
      <img src="./assets/images/TFT_new.png" alt="Teamfight Tactics" onclick="cambiarTFT()">
      <img src="./assets/images/music-logo.png" alt="YouTube" onclick="cambiarYoutube()">
      <!-- Agregar más logos de videojuegos aquí -->
  </section>
</section>



<!-- Sección de videos recomendados -->
<section class="recommended-videos">
    <h2 style="color: white;">Videos Recomendados</h2>
</BR>
    <div class="video-list">
        <!-- Aquí puedes agregar los videos recomendados -->
        <div class="video">
          <!-- Video 2 -->
          <iframe width="560" height="315" src="https://www.youtube.com/embed/k9ImuDpeNa8" frameborder="0" allowfullscreen></iframe>
          <h3 style="color: white;">LEGUE-OF-LEGENDS</h3>
          <p class="about-text">¡Smolder-llega-a-la-grieta-del-invocador!</p>
      </div>
      


      <div class="video">
        <!-- Video 1 -->
        <iframe width="560" height="315" src="https://www.youtube.com/embed/EUv987eNYUc" frameborder="0" allowfullscreen></iframe>
        <h3 style="color: white;">LEGUE-OF-LEGENDS</h3>
        <p class="about-text">SESON-2024</p>
    </div>
    


        <div class="video">
            <!-- Video 1 -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/lsMcRYDpoX8" frameborder="0" allowfullscreen></iframe>
            <h3 style="color: white;">VALORANT</h3>
            <p class="about-text">PLAYS-WORLDS2023</p>
        </div>
  
        <div class="video">
            <!-- Video 2 -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/HPFBmpY8E6g" frameborder="0" allowfullscreen></iframe>
            <h3 style="color: white;">LEGUE-OF-LEGENDS</h3>
            <p class="about-text">PLAYS-WORLDS2023</p>
        </div>
        <div class="video">
          <!-- Video 3 -->
          <iframe width="560" height="315" src="https://www.youtube.com/embed/KkWcsskG4Y8" frameborder="0" allowfullscreen></iframe>
          <h3 style="color: white;">REMIX-RUMBLE</h3>
          <p class="about-text">NEW-UPDATE-TFT</p>
      </div>
        <!-- Puedes seguir añadiendo más videos recomendados aquí -->
    </div>
</section>


<!-- Script para insertar el reproductor de Twitch -->
<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script type="text/javascript">
   function cambiarTransmision(channelName) {
    var embed = document.getElementById('twitch-embed');
    embed.innerHTML = ''; // Limpia el contenido actual del contenedor
    new Twitch.Embed("twitch-embed", {
        width: "100%",
        height: "100%",
        channel: channelName, // Utiliza el nombre del canal pasado como parámetro
        layout: "video",
        autoplay: true,
        parent: ["tu-sitio-web.com"], // Cambia esto con tu dominio permitido
        createEl: true
    });
}

function cambiarValorant() {
    cambiarTransmision('valorant_la'); // Reemplaza con el nombre de canal de Valorant
}

function cambiarLoL() {
    cambiarTransmision('lla'); // Reemplaza con el nombre de canal de League of Legends
}

function cambiarTFT() {
    cambiarTransmision('tftlatam'); // Reemplaza con el nombre de canal de Teamfight Tactics
}

function cambiarYoutube() {
    cambiarTransmision('abormini'); // 
}

// Esta función se encarga de cargar la transmisión de kubomusic al inicio
function cargarTransmisionPredefinida() {
    cambiarTransmision('kubomusic'); // Reemplaza 'kubomusic' con el nombre de tu canal predefinido
}

// Llama a la función al cargar la página para cargar la transmisión predefinida
window.onload = cargarTransmisionPredefinida;


</script>


<!-- 
    - #FOOTER
  -->

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