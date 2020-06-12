<?php namespace MyConnection;
    use mysqli;
    class Database{

        protected $url;
        protected $user;
        protected $passw;
        protected $db;
        protected $connection = null;

        public function __construct($url,$user,$passw,$db){
            $this->url = $url;
            $this->user = $user;
            $this->passw = $passw;
            $this->db = $db;
        }

        public function __destruct() {
            if ($this->connection != null) {
                $this->closeConnection();
            }
        }

        public function makeConnection(){
            $this->connection = new mysqli($this->url,$this->user,$this->passw,$this->db);
                if ($this->connection->connect_error) {
                    echo "FAIL:" . $this->connection->connect_error;
                }
                else{
                        echo "CONECTADO MADAFAKA";}
        }

        protected function closeConnection() {
            if ($this->connection != null) {
                $this->connection->close();
                $this->connection = null;
            }
        }

        protected function cleanParameters($p) {
            //prevent SQL injection
            $result = $this->connection->real_escape_string($p);
            return $result;
        }

        public function executeQuery($q, $params = null){
            $this->makeConnection();        
            if ($params != null) {
                $queryParts = preg_split("/\?/", $q);
                if (count($queryParts) != count($params) + 1) {
                    return false;
                }
                $finalQuery = $queryParts[0];
                for ($i = 0; $i < count($params); $i++) {
                $finalQuery = $finalQuery . $this->cleanParameters($params[$i]) . $queryParts[$i + 1];
                }
                $q = $finalQuery;
            }
            $results = $this->connection->query($q);
            return $results;
        }
    }
?>