<?php
    class ConexionDB{
        public function DBConnection(){
            $host = 'localhost';
            $databaseName = 'sei_academia_guerra';
            $username = 'root';
            $password = '';


            $bd = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
            $bd -> exec("SET NAMES UTF8");

            return $bd;
        }
    }
?>