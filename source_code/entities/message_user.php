<?php
    class messageUser{
        private $idMessage;
        private $contentMessage;
        private $date;
        private $idUserMassage;

        public function __construct (){

        }
        public function setIdMessage($idMessage){
            $this->idMessage=$idMessage;
         }
         public function getIdMessage(){
             return $this->idMessage;
         }
         public function setContentMessage($contentMessage){
            $this->contentMessage=$contentMessage;
         }
         public function getContentMessage(){
             return $this->contentMessage;
         }
         public function setDate($date){
            $this->date=$date;
         }
         public function getDate(){
             return $this->date;
         }
         public function setIdUserMassage($idUserMassage){
            $this->idUserMassage=$idUserMassage;
         }
         public function getIdUserMassage(){
             return $this->idUserMassage;
         }
         
         
        
         
    }

?>