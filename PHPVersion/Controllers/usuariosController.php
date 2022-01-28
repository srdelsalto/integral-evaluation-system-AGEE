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
    }
?>