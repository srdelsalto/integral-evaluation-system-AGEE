<?php
    require_once "ConexionDB.php";

    //Iniciar Sesión
    class UsuariosM extends ConexionDB{
        static public function IniciarSesionM($tablaBD, $datosC){
            $pdo = ConexionDB::DBConnection()->prepare("SELECT * FROM $tablaBD WHERE usuario = :libreta");

            $pdo -> bindParam(':libreta', $datosC["libreta"], PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo->fetch(PDO::FETCH_ASSOC);

            $pdo = null;
        }

        //Ver mis Datos
        static public function VerMisDatosM($tablaBD, $id){
            $pdo = ConexionDB::DBConnection()->prepare("SELECT D.fechanac, D.direccion, D.telefono, D.correo, D.pais, D.preparatoria, D.idUser, U.clave FROM $tablaBD D, users U WHERE U.id = :id");

            $pdo -> bindParam(':id', $id, PDO::PARAM_INT);

            $pdo -> execute();

            return $pdo->fetch(PDO::FETCH_ASSOC);

            $pdo = null;
        }

        //Guardar mis Datos
        static public function GuardarDatosM($tablaBD, $datosC){
            $pdo = ConexionDB::DBConnection()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion =:direccion, telefono = :telefono, correo = :correo, preparatoria = :preparatoria, pais = :pais WHERE id = :id");

            $pdo -> bindParam(':id', $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam(':fechanac', $datosC["fechanac"], PDO::PARAM_STR);
            $pdo -> bindParam(':direccion', $datosC["direccion"], PDO::PARAM_STR);
            $pdo -> bindParam(':telefono', $datosC["telefono"], PDO::PARAM_STR);
            $pdo -> bindParam(':correo', $datosC["correo"], PDO::PARAM_STR);
            $pdo -> bindParam(':preparatoria', $datosC["preparatoria"], PDO::PARAM_STR);
            $pdo -> bindParam(':pais', $datosC["pais"], PDO::PARAM_STR);

            if($pdo -> execute()){
                return true;
            }

            $pdo = null;
        }

        //Cambiar password 
        static public function CambiarPasswordM($tablaBD, $datosC){
            $pdo = ConexionDB::DBConnection()->prepare("UPDATE $tablaBD SET clave = :clave WHERE id = :id");

            $pdo -> bindParam(':id', $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam(':clave', $datosC["clave"], PDO::PARAM_STR);

            if($pdo -> execute()){
                return true;
            }

            $pdo = null;
        }
    }
?>