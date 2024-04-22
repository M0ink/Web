        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Tienda en línea</strong>
                </a>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                </div>
            </div>
            
            <?php if(isset($_SESSION['user_id'])) {?>
              <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="btn_session" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['user_name']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btn_session">
                  <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                </ul>  
              </div>
            <?php } else  { ?>
                <a href= "./login.php" class="btn btn-success btn-sm"></i>ingresar</a>
            <?php } ?>
        </nav>
 