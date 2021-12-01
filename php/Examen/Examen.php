<?php
    class Examen
    {
        protected $Descripcion;
        protected $Duracion;
        protected $N_preguntas;
        protected $Activo;
        protected $Array_Preguntas;

        public function __construct($descripcion,$duracion,$n_preguntas,$activo,$preguntas)
        {
            $this->Id=$id;
            $this->Descripcion=$descripcion;
            $this->Duracion=$duracion;
            $this->N_preguntas=$n_preguntas;
            $this->Activo=$activo;
            $this->Array_Preguntas=$preguntas;
        }

        public function getDescripcion()
        {
            return $this->Descripcion;
        }

        public function getDuracion()
        {
            return $this->Duracion;
        }

        public function getN_preguntas()
        {
            return $this->N_preguntas;
        }

        public function getActivo()
        {
            return $this->Activo;
        }

        public function getPreguntas()
        {
            return $this->Preguntas;
        }

        public function setPreguntas($pregunta)
        {
            if(count($this->Preguntas)<=$this->N_preguntas)
            {
                $this->Preguntas.push($pregunta);
                return true;
            }
            else 
            {
                return false;    
            }
        }









    }






















?>