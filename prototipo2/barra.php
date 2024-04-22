<div id="sidebar">
      <div class="toggle-btn">
        <span>&#9776;</span>
      </div>
      <div class="btn-group" style = "margin-left: 45px; margin-top: 10px;">
        <a href="inter.php" class="btn btn-outline-primary" style="color: white;">Inicio</a>
        <a href="prototipo2/checkpru2.php" class="btn btn-outline-primary" style="color: white;">carrito</a><span Id = "C" class="badge bg-secondary">0<?php echo $C;?></span>
      </div>
      <ul>
        <?php
        // Consulta para obtener todos los catálogos
        $sqlCat = $con->prepare("SELECT Id_cat, NomCat FROM cat");
        $sqlCat->execute();
        $catResult = $sqlCat->fetchAll(PDO::FETCH_ASSOC);

        foreach ($catResult as $cat) {
          $catId = $cat['Id_cat'];
          $catToken = hash_hmac('sha1', $catId, KEY_TOKEN);
          ?>
          <li>
          <div class="btn-group">
            <a href="Cat.php?Id_cat=<?php echo $catId; ?>&token=<?php echo $catToken; ?>" class="btn btn-link" style="color: white;"><?php echo $cat['NomCat']; ?></a>
          </div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <script src="./main.js"></script>