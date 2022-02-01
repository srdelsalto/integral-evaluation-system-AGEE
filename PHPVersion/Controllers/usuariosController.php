<?php
    class UsuariosController{
        public function IniciarSesionC(){
            if(isset($_POST["libreta"])){
                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["libreta"]) && preg_match('/^[a-zA-Z0-9.]+$/', $_POST["password"])){
                    $tablaBD = "users";
                    $datosC = array ("libreta"=>$_POST["libreta"], "password"=>$_POST["password"]);

                    $resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

                    if($resultado == null){
                        echo '<br> <div class="alert alert-danger">Error al ingresar</div>';
                    }else{
                        if($resultado["usuario"] == $_POST["libreta"] && $resultado["clave"] == $_POST["password"]){

                            $_SESSION["Ingresar"] = true;
                            $_SESSION["rol"] = $resultado["rol"];
                            $_SESSION["libreta"] = $resultado["libreta"];
                            $_SESSION["clave"] = $resultado["clave"];
                            $_SESSION["nombre"] = $resultado["nombre"];
                            $_SESSION["apellido"] = $resultado["apellido"];
                            $_SESSION["id"] = $resultado["id"];

                            echo '<script>
                            window.location = "inicio";
                            </script>';
                        }else{
                            echo '<br> <div class="alert alert-danger">Error al ingresar</div>';
                        }
                    }
                }else{
                    echo '<br> <div class="alert alert-warning">Algún dato está vacío</div>';
                }
            }
        }

        public function VerMisDatosC(){
            $tablaBD = "data";
            $id = $_SESSION["id"];
            $resultado = UsuariosM::VerMisDatosM($tablaBD, $id);

            echo '<form method="POST">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <h2>Fecha de Nacimiento:</h2>
                    <input type="text" class="input-lg" name="fechanac" value="'.$resultado["fechanac"].'">

                    <input type="hidden" name="uid" value="'.$_SESSION["id"].'">

                    <h2>Dirección:</h2>
                    <input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

                    <h2>Teléfono:</h2>
                    <input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

                    <h2>Contraseña:</h2>
                    <input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'">
                </div>

                <div class="col-md-6 col-xs-12">
                    <h2>Correo Electrónico:</h2>
                    <input type="email" class="input-lg" name="correo" value="'.$resultado["correo"].'">

                    <h2>Preparatoria:</h2>
                    <input type="text" class="input-lg" name="preparatoria" value="'.$resultado["preparatoria"].'">

                    <h2>País:</h2>
                    <input type="text" class="input-lg" name="pais" value="'.$resultado["pais"].'">

                    <br><br>

                    <button type="submit" class="btn btn-success">Guardar Datos</button>
                </div>
            </div>
        </form>';
        }

        //Actualizar Datos
        public function GuardarDatosC(){
            if(isset($_POST["uid"])){
                $tablaBD = "data";
                $datosC = array("id"=>$_POST["uid"], "fechanac"=>$_POST["fechanac"], "direccion"=>$_POST["direccion"], 
                "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "preparatoria"=>$_POST["preparatoria"],
                "pais"=>$_POST["pais"], "clave"=>$_POST["clave"]);

                $resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);

                if(isset($_POST["clave"])){
                    $resultado2 = UsuariosM::CambiarPasswordM("users",$datosC);
                }

                if($resultado == true){
                    echo '<script>
                            window.location = "mis-datos";
                            </script>';
                }
            }
        }
    }
