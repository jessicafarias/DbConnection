<!DOCTYPE html>
<html>
    <body>
        <?php 
            include 'DbConnection.php';
            include 'DbFactory.php';
            include 'DbConnectionData.php';
            use MyConnection\DbConnectionData as conn;
            conn::update(1);
        ?>
    </body>

</html>