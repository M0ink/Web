<?php
function esNulo(array $parametros) {
    foreach ($parametros as $parametro) {
        if (strlen(trim($parametro)) < 1) {
            return true;
        }
    }
    return false;
}

function esEmail($correoinst){
    if(filter_var($correoinst, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}

function gamers(array $datos, $con)
{
    $sql = $con->prepare("INSERT INTO gamers(correoinst, id) VALUES(?,?)");
    if($sql->execute($datos)){
        return $con->lastInsertId();
    }
    return 0;
}

function registrargt(array $datos, $con){

    $sql = $con->prepare("INSERT INTO relaciongt(id, idTor, gametag) VALUES(?,?,?)");
    if($sql->execute($datos)){
        return $con->lastInsertId();
    }
    return 0;
}

function mostrarMensajes(array $errors){
    if(count($errors) > 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" style= "background-color: #add8e6; color: #000000;" role="alert"><ul>'; 
        foreach($errors as $error)
        {
            echo '<li>' . $error . '</li>';
        }
        echo '<ul>'; 
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
