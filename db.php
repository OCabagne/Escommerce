<?php

class database
{
    private $server = "localhost";
    private $user = "user";
    private $pass = "password";

    private function conectar()
    {  
        $connect = mysqli_connect($this->server, $this->user, $this->pass);
    }
}

?>