<!-- 
      - overlay
    -->
    <div class="overlay" data-overlay></div>

    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/Ractech1.png" alt="LIE logo" style="width: 260px; height: auto;">
      </a>
      
        <!-- Botón del carrito -->
  <div class="btn-group" style="margin-left: auto; margin-top: 0px; position: relative;">
    <a href="checkpru2.php" style="color: white; width: 30px; height: 30px; padding: 0; position: relative; display: inline-block;">
      <img src="Imagenes/car.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%;">
    </a>
    <h2 id="C" class="text" style="position: absolute; top: 10%; left: 90%; transform: translate(-50%, -50%); color: white; font-size: 20px;">0<?php echo $C; ?></h2>
  </div>

      <button class="nav-open-btn" data-nav-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-nav>

        <div class="navbar-top">

          <a href="#" class="logo">
            <img src="./readme-images/project-logo.png" alt="LIE logo">
          </a>

          <button class="nav-close-btn" data-nav-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="./index.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="./transmision.php" class="navbar-link">Streaming</a>
          </li>

          <li>
            <a href="./Torneo.php" class="navbar-link">Tournament</a>
          </li>

          <li>
            <a href="./inter.php" class="navbar-link">Market</a>
          </li>

          <li>
            <a href="./Comunidad.php" class="navbar-link">Community</a>
          </li>

          <li>
            <a href="./Depolovers1/index.html" class="navbar-link">Developers</a>
          </li>

        </ul>

        <ul class="nav-social-list">

          <li>
            <a href="./index.html" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>
        </ul>
      </nav>

      <div class="header-actions">

    <button class="btn-sign_in">
        <div class="icon-box">
            <ion-icon name="log-in-outline"></ion-icon>
        </div>
        <?php if(isset($_SESSION['user_id'])) { ?>
            <span><?php echo $_SESSION['user_name']; ?></span>
        <?php } else { ?>
            <span>Login</span>
            <!-- carrito de compra -->
        </button>





        <style>
        .pop-up-title p {
  text-align: center;
}
</style>

        <div class="pop-up">
            <div class="pop-up-wrap">
                <div class="pop-up-title">
                    <h2>Ractech</h2>
                    <p>EXPERIENCE JUST FOR GAMERS ALWAYS</p>
                </div>
                <div class="subcription">
                    <div class="line"></div>
                    <span class="close" id="close">
                        <img src="./assets/images/times-circle-solid.svg">
                    </span>
                    <div class="sub-content" id="loginForm">
                        <h2>Inicia sesión</h2>
                        <div class="centrado">
                       <p>Liga interuniversitaria de E-Sports</p>
                       </div>
                        <form action="login.php" method="post" id="headerLoginForm">
                            <input class="subs-email" name="usuario" id="usuario" placeholder="Escriba su usuario">
                            <input class="subs-email" type="password" name="password" id="password" placeholder="Escribe tu contraseña"><br>
                            <button class="subs-send" type="submit">Iniciar</button>
                            <p>¿No tienes cuenta?<a href="Re.php">Crea una aquí</a></p>
                        </form>
                    </div>
                </div>


                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="errorModalLabel">Error de inicio de sesión</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p id="errorModalMessage">Hubo un error al iniciar sesión. Por favor, inténtalo de nuevo.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    <?php } ?>
</div>



<!-- Botón para controlar la música -->
<button id="volumeButton" onclick="toggleMusic()" style="margin-top: 10px;">
    <ion-icon name="volume-high-outline" class="volume-icon"></ion-icon>
</button>

<!-- Reproductor de música -->
<div id="music-player" style="margin-top: 10px;"></div>

<!-- Barra de volumen -->
<input type="range" min="0" max="100" value="50" class="volume-slider" onchange="setVolume(this.value)" style="margin-top: 10px;">

    <style>




      /* Estilos para hacer los logotipos responsivos */
      .logos {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4%; /* Espacio entre los logotipos */
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: hidden; /* Oculta el desplazamiento vertical */
        padding: 0 20px; /* Agrega un espacio alrededor de las imágenes */
      }
  
      /* Estilos para las imágenes */
      .logos img {
        width: 100%; /* Las imágenes ocuparán todo el ancho del contenedor */
        max-width: 150px; /* Ancho máximo para evitar que las imágenes sean excesivamente grandes */
        height: auto;
        filter: brightness(0) invert(1);
        transition: transform 0.3s ease;
      }
  
      /* Efecto de zoom al pasar el mouse */
      .logos img:hover {
        transform: scale(1.2);
      }
  
      /* Estilos responsivos para el texto */
      .hero-subtitle {
        font-size: 25px;
      }
  
      .hero-title {
        font-size: 145px;
      }
  
      /* Media queries para ajustar los tamaños en pantallas más pequeñas */
      @media screen and (max-width: 768px) {
        .hero-subtitle {
          font-size: 24px; /* Conserva el tamaño original */
        }
  
        .hero-title {
          font-size: 60px; /* Conserva el tamaño original */
        }
      }
    </style>
    <script>
  var player; // Variable global para el reproductor
 // Función para alternar la reproducción/pausa de la música y cambiar el color del ícono
 function toggleMusic() {
      var volumeButton = document.getElementById('volumeButton');
      var volumeIcon = volumeButton.querySelector('.volume-icon');

      if (player.getPlayerState() == YT.PlayerState.PLAYING) {
        player.pauseVideo();
        volumeIcon.classList.remove('active'); // Remover la clase 'active' cuando se pausa la música
      } else {
        player.playVideo();
        volumeIcon.classList.add('active'); // Añadir la clase 'active' cuando se reproduce la música
      }
    }

    // Función para cargar la API de YouTube y luego inicializar el reproductor
    function inicializarReproductor() {
      var tag = document.createElement('script');
      tag.src = 'https://www.youtube.com/iframe_api';
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      window.onYouTubeIframeAPIReady = function () {
        cargarReproductor();
      };
    }

    // Función para cargar el reproductor de YouTube con la lista de reproducción proporcionada
    function cargarReproductor() {
      player = new YT.Player('music-player', {
        height: '0',
        width: '0',
        playerVars: {
          listType: 'playlist',
          list: 'PLIwv-CmVkeJzcX3oSMEGb_1qfGzbEGiNy',
          autoplay: 1
        },
        events: {
          'onReady': onPlayerReady
        }
      });
    }

    // Función para reproducir la lista de reproducción
    function onPlayerReady(event) {
      var playlistLength = event.target.getPlaylist().length;
      var randomIndex = Math.floor(Math.random() * playlistLength);
      event.target.playVideoAt(randomIndex);
    }

    // Función para configurar el volumen con la barra de desplazamiento
    function setVolume(volume) {
      if (!player.isMuted()) {
        player.setVolume(volume);
      }
    }

    // Llamar a la función de inicialización al cargar la página
    window.onload = inicializarReproductor;
</script>

  <script>
  //error en inicio de sesión
  function submitLoginForm() {
        let form = document.getElementById('headerLoginForm');
        let formData = new FormData(form);

        fetch('login.php', {
            method: 'POST',
            body: formData
        })
         .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Si el inicio de sesión es exitoso, realiza las acciones necesarias
                window.location.href = 'index.php';
            } else {
              window.location.href = 'index.php';
            }
        })
        .catch(error => console.error('Error:', error));
    }
  </script>


<style>
.volume-button {
  margin-right: 10px; /* Ajusta este valor según sea necesario */
}

/* Espacio entre elementos */
.header-actions {
  display: flex;
  align-items: center;
}

.btn-sign_in {
  margin-right: 20px; /* Ajusta el margen entre el botón de inicio de sesión y el botón de volumen */
  
}

/* Estilo por defecto para el icono de volumen (blanco) */
.volume-icon {
  font-size: 24px;
  color: #fff; /* Blanco */
}

/* Estilo para el icono de volumen cuando está activo (verde) */
.volume-icon.active {
  color: #00ff00; /* Verde */
}

.volume-slider {
  width: 100px; /* Ajusta el ancho de la barra según sea necesario */
  height: 6px;
  opacity: 0; /* La barra de volumen estará oculta inicialmente */
  transition: opacity 0.3s ease-in-out; /* Efecto de transición para mostrar la barra al pasar el cursor */
  background-color: #4285f4; /* Color azul de la barra */
  border-radius: 3px; /* Borde redondeado */
}

.volume-slider:hover {
  opacity: 1; /* Muestra la barra de volumen al pasar el cursor sobre el área */
}


/* Estilos para el botón de volumen */
.volume-button {
  position: relative;
}


/* Estilo para el botón de volumen */
#volumeButton {
  margin-right: 10px; /* Ajusta el margen derecho según sea necesario */
}

/* Barra de volumen */
.volume-slider {
  /* ... (estilos anteriores) */
  margin-left: 10px; /* Ajusta el margen izquierdo según sea necesario */
}

/* Estilos para la barra de volumen visible al pasar el cursor sobre el botón */
.volume-slider-visible {
  position: absolute;
  top: -10px; /* Ajusta la posición según sea necesario */
  left: 20px; /* Ajusta la posición según sea necesario */
  width: 100px; /* Ancho de la barra de volumen visible */
  height: 6px;
  background-color: #ccc; /* Color de fondo de la barra de volumen */
  z-index: 9999;
}

</style>
