<?php

class database{
    // paramentros que le voy a enviar al objeto pdo
    private $PDOlocal;
    private $user = 'admin';
    private $password = "admin";
    private $server = "mysql:host=localhost;dbname=empresa_web";
    // le ponemos la sig cadena: host, base de datos

    function conectarDB()
    // vamos a instanciar PDO
    {
        try{
        $this->PDOlocal = new PDO ($this->server, $this->user, $this->password);
        }
        catch (PDOException $e)
        // excepciones del PDO
        {
            echo $e->getMessage();
        }
    }

    function desconectarDB()
    {
        try{
            $this->PDOlocal = null;
            }
            catch (PDOException $e)
            // excepciones del PDO
            {
                echo $e->getMessage();
            }
    }

    function seleccionar($consulta)
    {
        try
        {
            $resultado = $this->PDOlocal->query($consulta);
            // tengo el objeto PDO que me va a regresar query
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
            // EN FILA TENGO UN ARREGLO C
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    function ejecuta($consulta){
      try{
        $this ->PDOlocal->query($consulta);
      }
      catch (PDOException $e){
        echo $e->getMessage();
      }
    }
    function verifica($usuario, $contra)
    {
        try{
            $pase = false;
            $query = "SELECT * FROM usuario WHERE user = '$usuario'";
            $resultado = $this->PDOlocal->query($query);

            while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($contra, $fila["password"])){
                    $pase = true;
                }
            }
        
            session_start();
            if($pase){
                $_SESSION["usuario"] = $usuario;
                echo "<div class='alert alert-success'>";
                echo "<h2 align='center'>Bienvenido</h2></div>";
                header("refresh:2; ../index.php");
                exit();
            }
            else{
                echo "<div class='alert alert-danger'>";
                echo "<h2 align='center'>Incorrecto</h2></div>";
                header("refresh:2; ../views/iniciar_sesion.php");
                exit();
            }
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function cerrarSesion(){
        session_start();
        session_destroy();
        header("Location: ../index.php");
    }

}

?>