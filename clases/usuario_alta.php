<?php
    class Usuario{
        protected $Email;
        protected $Nombre;
        protected $Ap1;
        protected $Ap2;
        protected $Password;
        protected $Fecha_nac;
        protected $Rol;
        protected $Recurso;
        protected $Activo;

        public function __construct($Email,$Nombre,$Ap1,$Ap2,$Password,$Fecha_nac,$Rol,$Recurso,$Activo)
        {
            $this->Email=$Email;
            $this->Nombre=$Nombre;
            $this->Ap1=$Ap1;
            $this->Ap2=$Ap2;
            $this->Password=$Password;
            $this->Fecha_nac=$Fecha_nac;
            $this->Rol=$Rol;
            $this->Recurso=$Recurso;
            $this->Activo=$Activo;
        }



        public function getEmail()
        {
            return $this->Email;
        }

        public function getNombre()
        {
            return $this->Nombre;
        }

        public function getAp1()
        {
            return $this->Ap1;
        }

        public function getAp2()
        {
            return $this->Ap2;
        }

        public function getPassword()
        {
            return $this->Password;
        }

        public function getFecha()
        {
            return $this->Fecha_nac;
        }

        public function getRol()
        {
            return $this->Rol;
        }

        public function getRecurso()
        {
            return $this->Recurso;
        }

        public function getActivo()
        {
            return $this->Activo;
        }






    }
?>