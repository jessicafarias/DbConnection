<?php namespace MyConnection;

    use MyConnection\DatabaseFactory;

    class productos {
        public $id;
        public $codigo;
        public $descripcion;
        public $price;

        public function __construct($Id, $Code, $Description, $Price)
        {
            $this->id = $Id;
            $this->codigo = $Code;
            $this->descripcion = $Description;
            $this->price = $Price;
        }
        
        public function __construct2(){}
    }

    class DbConnectionData {
    
        private static function getConnection(){
            return DatabaseFactory::getDatabase();
        }

    
        public static function getById($Id){
            $results = self::getConnection()->executeQuery("SELECT *FROM productos WHERE Id = '?'", array($Id));

            if ($results){
               $row = $results->fetch_array();
               $obj = self::convertRowToObject($row);
                return $obj;
            } else {
                return false;
            }
        }

        public static function getAll(){
            $query = 'SELECT * from productos';
            $results = self::getConnection()->executeQuery($query);
            $resultsArray = array();
            for ($i = 0; $i < $results->num_rows; $i++){
                $row = $results->fetch_array();
                $obj = self::convertRowToObject($row);
                $resultsArray[$i] = $obj;
            }
            return $resultsArray;
        }

        public static function convertRowToObject($row){
            return new productos(
                $row['id'],
                $row['codigo'],
                $row['descripcion'],
                $row['precio']
                );
        }

        public static function getName($Id){
            $results = self::getConnection()->executeQuery("SELECT * from productos WHERE id = '?'", array($Id));
            $row = $results->fetch_array();
            return $row['column'];
        }        

        public static function insert ($obj){
            self::getConnection()->executeQuery("INSERT INTO productos VALUES (?, '?', '?', '?')",
                array($obj->id, $obj->codigo, $obj->descripcin, $obj->precio));
        }

        public static function update ($numero){
            self::getConnection()->executeQuery("UPDATE productos SET precio = 4500 WHERE id =1;");}
    }
?>