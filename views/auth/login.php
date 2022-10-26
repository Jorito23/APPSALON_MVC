<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina"> Inicia Sesion con tus datos</p>
<?php include_once __DIR__ . "/../templates/alertas.php"; ?>
<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            placeholder="Tu E-mail"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            placeholder="Tu Contraseña"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesion">
</form>
<div class="acciones">
    <a href="/crear-cuenta">Registrarse</a>
    <a href="/olvide">Olvide mi Contraseña</a>
</div>