<h1 class="nombre-pagina">Olvide mi Contraseña</h1>
<p class="descripcion-pagina">Completa los campos para reestablecer tu contraseña</p>
<?php include_once __DIR__ . "/../templates/alertas.php"; ?>
<form class="formulario" action="/olvide" method="POST">
<div class="campo">
        <label for="email">E-mail</label>
        <input
            type="email"
            id="email"
            placeholder="Tu E-mail"
            name="email"
        />
    </div>
    
    <input type="submit" class="boton" value="Reestablecer Cuenta">
</form>

<div class="acciones">
    <a href="/">Ya tenes una cuenta? Iniciar Sesión</a>
    <a href="/crear-cuenta">Aún no tienes una cuenta? Crear una</a>
</div>