<?php
    class Usuario_temporal
    {
        protected $password_temporal;
        protected $id_usuario;
        protected $fecha_expiracion;






        public function __construct($id,$password,$dias)
        {

            

            
            $this->password_temporal=$password;


            $this->id_usuario=$id;

            $fecha_actual=date("Y-m-d");
            $this->fecha_expiracion=date("Y-m-d",strtotime($fecha_actual."+ ${dias} days"));
        }


       







        /**
         * Get the value of password_temporal
         */ 
        public function getPassword_temporal()
        {
                return $this->password_temporal;
        }

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Get the value of fecha_expiracion
         */ 
        public function getFecha_expiracion()
        {
                return $this->fecha_expiracion;
        }
    }




    


    
    

    

    



















?>