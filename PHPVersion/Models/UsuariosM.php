<?php
    require_once "ConexionDB.php";

    class UsuariosM extends ConexionDB{
        static public function IniciarSesionM($tablaBD, $datosC){
            $pdo = ConexionDB::DBConnection()->prepare("SELECT * FROM $tablaBD WHERE usuario = :libreta");

            $pdo -> bindParam(':libreta', $datosC["libreta"], PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo->fetch(PDO::FETCH_ASSOC);

            $pdo = null;
        }
    }
?>