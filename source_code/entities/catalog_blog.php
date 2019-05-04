<?php
    class catalogBlog{

        private $idCatalog;
        private $nameCatalogBlog;
        private $descriptionCatalogBlog;
        private $sumaryCatalogBlog;

        public function setIDCatalog($idCatalog){
            $this->idCatalog=$idCatalog;
         }
         public function getIDCatalog(){
             return $this->idCatalog;
         }
         public function setNameCatalogBlog($nameCatalogBlog){
            $this->nameCatalogBlog=$nameCatalogBlog;
         }
         public function getNameCatalogBlog(){
             return $this->nameCatalogBlog;
         }
         public function setDescriptionCatalogBlog($descriptionCatalogBlog){
            $this->descriptionCatalogBlog=$descriptionCatalogBlog;
         }
         public function getDescriptionCatalogBlog(){
             return $this->descriptionCatalogBlog;
         }
         public function setSumaryCatalogBlog($sumaryCatalogBlog){
            $this->sumaryCatalogBlog=$sumaryCatalogBlog;
         }
         public function getSumaryCatalogBlog(){
             return $this->sumaryCatalogBlog;
         }
         
         public function __construct(){
        
         }
    }

    
    
?>