<?php
    class Pregunta{
        protected $Enunciado;
        protected $Recurso;
        protected $Id_repuesta;
        protected $Id_tematica;

        protected $Array_Respuestas;

        protected $Id_propio;

        public function __construct($enunciado,$recurso,$id_respuesta,$id_tematica,$array_respuestas)
        {
            $this->Enunciado=$enunciado;
            $this->Recurso=$recurso;
            $this->Id_respuesta=$id_respuesta;
            $this->Id_tematica=$id_tematica;
            $this->Array_Respuestas=$array_respuestas;
            //codigo especial
            //-------------------------
            $fechatotal= new DateTime();
            $HoraArray = (array) $fechatotal;
            $hora=$HoraArray["date"];
            $alter=rand(0,50000);
            $codigoEspecial=md5($hora.$alter);
            //--------------------------
            $this->Id_propio=$codigoEspecial;
        }

        

        public function getEnunciado()
        {
                return $this->Enunciado;
        }

        
        public function getRecurso()
        {
                return $this->Recurso;
        }

        
        public function getId_repuesta()
        {
                return $this->Id_repuesta;
        }

       
        public function getId_tematica()
        {
                return $this->Id_tematica;
        }

       
        public function getArray_Respuestas()
        {
                return $this->Array_Respuestas;
        }

        
        public function setArray_Respuestas($Respuesta)
        {
            if(count($this->Array_Respuestas)<=4)
            {
                $this->Array_Respuestas.push($Respuesta);
                return true;
            }
            else
            {
                return false;    
            }
        }

        /**
         * Get the value of Id_propio
         */ 
        public function getId_propio()
        {
                return $this->Id_propio;
        }
    }










?>