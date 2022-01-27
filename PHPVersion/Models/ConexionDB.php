<?php
    class ConexionDB{
        public function DBConnection(){
            $bd = new PDO("mysql:host=localhost; dbname=sei_academia_guerra", "root", "");
            $bd -> exec("set names utf8");

            return $bd;
        }
    }
?>