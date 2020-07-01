<!DOCTYPE html>
<html>
    <body>
        <?php 
            $nombre= $_POST["nombre"];
            echo "SU NOMBRE nuevo es ES"+ $nombre;
            include 'DbConnection.php';
            include 'DbFactory.php';
            include 'DbConnectionData.php';
            use MyConnection\DbConnectionData as conn;
            conn::update(1,$nombre);
        ?>
    </body>

</html>