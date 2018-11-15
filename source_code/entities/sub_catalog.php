<?php
    class subCatalog{
        private $subCatalogId;
        private $subCatalogName;
        private $subCatalogDescrible;
        private $catalogId;
        private $status;
        
        public function setSubCatalogId($subCatalogId){
            $this->subCatalogId=$subCatalogId;
         }
         public function getSubCatalogId(){
             return $this->subCatalogId;
         }
         public function setSubCatalogName($subCatalogName){
            $this->subCatalogName=$subCatalogName;
         }
         public function getSubCatalogName(){
             return $this->subCatalogName;
         }
         public function setSubCatalogDescrible($subCatalogDescrible){
            $this->subCatalogDescrible=$subCatalogDescrible;
         }
         public function getSubCatalogDescrible(){
             return $this->subCatalogDescrible;
         }
         public function setCatalogId($catalogId){
            $this->catalogId=$catalogId;
         }
         public function getCatalogId(){
             return $this->catalogId;
         }
         public function setStatus($status){
            $this->status=$status;
         }
         public function getStatus(){
             return $this->status;
         }
         
    }
?>