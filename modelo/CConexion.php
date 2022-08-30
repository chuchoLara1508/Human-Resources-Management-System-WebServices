<?php 

   class CConexion{

      public $usua="";
      public $host="";
      public $pass="";
      public $base="";

      function CConexion($usu,$hos,$pas,$bas){
         $this->usua=$usu;
         $this->host=$hos;
         $this->pass=$pas;
         $this->base=$bas;
      }
      function conect(){
         if($con=mysqli_connect("localhost","root","")){
            if(mysqli_select_db($con,"recursos_humanos")){
               return $con;
            }
            else{
               die("No hay base de datos");
            }
         }
         else{
            die("No conecta");
         }
      }

   }

?>