<?php


namespace Model;

class Usuario extends ActiveRecord{
    //Base de datos

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','telefono','email','token','confirmado','admin','password'];
   
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $token;
    public $confirmado;
    public $admin;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->admin = $args['admin'] ?? '0';
        $this->password = $args['password'] ?? '';
    }
    
    //Mensajes de validacion

    public function validarNuevaCuenta(){
    
    if(!$this->nombre) {
        self::$alertas['error'][] = "El nombre es obligatorio";
    }

    if(!$this->apellido) {
        self::$alertas['error'][] = "El apellido es obligatorio";
    }

    if(!$this->email) {
        self::$alertas['error'][] = "El E-mail es obligatorio";
    }

    if(!$this->password) {
        self::$alertas['error'][] = "La contraseña es obligatoria";
    }
    if(strlen($this->password) < 6 ) {
        self::$alertas['error'][] = "La contraseña debe contener al menos 6 caracteres";
    }

    return self::$alertas;
    }

    public function validarLogin(){
        if(!$this->email) {
            self::$alertas['error'][] = 'El E-mail es obligatorio';
        }
        
        if(!$this->password) {
            self::$alertas['error'][] = 'Debes ingresar una contraseña';
        }
        return self::$alertas;
    }

    public function validarEmail(){
        if(!$this->email) {
            self::$alertas['error'][] = 'El E-mail es obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword(){
        if(!$this->password) {
            self::$alertas['error'][] = "La contraseña es obligatoria";
        }
        if(strlen($this->password) < 6 ) {
            self::$alertas['error'][] = "La contraseña debe contener al menos 6 caracteres";
        }
        return self::$alertas;
    }

    public function existeUsuario() {
        $query= "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][]= "El usuario ya está registrado";
        }
        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password,PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password) {
        $resultado = password_verify($password,$this->password);
        
        if(!$resultado || !$this->confirmado){
        
            self::$alertas['error'][]= "Contraseña incorrecta ó el Usuario no está confirmado";
        
        }else{
          return true; 
    }

    }
}
