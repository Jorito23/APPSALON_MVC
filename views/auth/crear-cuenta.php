<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Completa el formulario con tus datos para crear una cuenta nueva</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form class="formulario" method="POST" action="/crear-cuenta">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text"
            id="nombre"
            placeholder="Tu Nombre"
            name="nombre"
            value="<?php echo s($usuario->nombre); ?>"
            />
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text"
            id="apellido"
            placeholder="Tu Apellido"
            name="apellido"
            value="<?php echo s($usuario->apellido); ?>"
            />
    </div>

    <div class="campo">
        <label for="Telefono">Teléfono</label>
        <input 
            type="tel"
            id="telefono"
            placeholder="Tu Teléfono"
            name="telefono"
            value="<?php echo s($usuario->telefono); ?>"
            />
    </div>

    <div class="campo">
        <label for="email">E-mail</label>
        <input 
            type="email"
            id="email"
            placeholder="Tu E-mail"
            name="email"
            value="<?php echo s($usuario->email); ?>"
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

    <input type="submit" class="boton" value="Crear Cuenta">


</form>

<div class="acciones">
    <a href="/">Ya tenes una cuenta? Iniciar Sesión</a>
    <a href="/olvide">Olvide mi Contraseña</a>
</div>