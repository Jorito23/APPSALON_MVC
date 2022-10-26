<h1 class="nombre-pagina">Panel de Administracion</h1>
<?php
    include_once __DIR__ . '/../templates/barra.php';
?>
<h2>Buscar Citas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo $fecha ?>"
            />    
        </div>
    </form>
</div>

<?php 
   if (count($citas) === 0) {
        echo "<h2>No hay Citas en esta fecha</h2>";
   }
?>

<div id="citas-admin">
    <ul class="citas">
        <?php
        $idCita = 0;
        foreach ($citas as $key=>$cita) { 
                if($idCita !== $cita->id) {     
                    $total = 0;
        ?>
            <li>
                <p> ID: <SPAN><?php echo $cita->id; ?></SPAN></p>
                <p> Hora: <SPAN><?php echo $cita->hora; ?></SPAN></p>
                <p> Cliente: <SPAN><?php echo $cita->cliente; ?></SPAN></p>
                <p> Email: <SPAN><?php echo $cita->email; ?></SPAN></p>
                <p> Telefono: <SPAN><?php echo $cita->telefono; ?></SPAN></p>

                <h3>Servicios</h3>
                
                <?php
                $idCita = $cita->id;
                    } //Fin de IF 
                        $total += $cita->precio;
                    ?>
                    <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>

        <?php
        $actual = $cita->id;
        $proximo = $citas[$key +1]->id ?? 0;

        if(esUltimo($actual,$proximo)) { ?>
            <p class="total">Total:<span>$ <?php echo $total; ?></span></p>
        
            <form action="/api/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                <input type="submit" class="boton-eliminar" value="Eliminar">
            </form>
        
        
        <?php     
            }

        ?>
            
      <?php } //Fin de Foreach ?>      
    </ul>
</div>

<?php $script = "<script src='build/js/buscador.js'></script>" ?>