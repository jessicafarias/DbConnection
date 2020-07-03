<?php 
use MyConnection\DbConnectionData as conn;
if (!$_POST){

}

else{
    $nombre= $_POST["nombre"];
    echo "hola $nombre ";
    include 'DbConnection.php';
    include 'DbFactory.php';
    include 'DbConnectionData.php';
    conn::update(1,$nombre);
}
?>