<div class="content-wrapper">
    <section class="content">
        <div class="box-body">
            <?php
                $datos = new UsuariosController();
                $datos->VerMisDatosC();
            ?>

            <?php
                $guardar = new UsuariosController();
                $guardar->GuardarDatosC();
            ?>
        </div>
    </section>
</div>