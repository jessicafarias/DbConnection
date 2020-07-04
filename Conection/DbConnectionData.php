<?php namespace MyConnection;

    use MyConnection\DatabaseFactory;

    class socios {
        public $id ;
        public $type;
        public $nombre ;
        public $contraseña ;
        public $curp ;

        public function __construct($Id, $Type, $nombre, $Contraseña, $Curp)
        {
            $this->id = $Id;
            $this->type = $Type;
            $this->nombre = $nombre;
            $this->contraseña = $Contraseña;
            $this->curp = $Curp;
        }
        
        public function __construct2(){}
    }

    class DbConnectionData {
    
        private static function getConnection(){
            return DatabaseFactory::getDatabase();
        }

    
        public static function getById($Id){
            $results = self::getConnection()->executeQuery("SELECT *FROM socios WHERE Id = '?'", array($Id));

            if ($results){
               $row = $results->fetch_array();
               $obj = self::convertRowToObject($row);
                return $obj;
            } else {
                return false;
            }
        }

        public static function getAll(){
            $query = 'SELECT * from socios';
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
            return new socios(
                $row['id'],
                $row['nombre'],
                $row['type'],
                $row['contraseña'],
                $row['curp']
                );
        }

        public static function getName($Id){
            $results = self::getConnection()->executeQuery("SELECT * from socios WHERE id = '?'", array($Id));
            $row = $results->fetch_array();
            return $row['nombre'];
        }        

        public static function insert ($obj){
            self::getConnection()->executeQuery("INSERT INTO socios VALUES ('?', '?', '?', '?', '?')",
                array($obj->id, $obj->nombres, $obj->type, $obj->contraseña, $obj->curp));
        }

        public static function update($id_socio, $nombre){
            self::getConnection()->executeQuery("UPDATE socios SET nombre = ' $nombre ' WHERE id = $id_socio");}
    }
?>