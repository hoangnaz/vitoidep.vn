<?php

    class catalogPro
    {
        private $idCatalogProduct;
        private $catalogName;
        private $imageCatalog;
        private $status;
        private $catalogDescible;

        public function setIdCatalogProduct($idCatalogProduct){
            $this->idCatalogProduct=$idCatalogProduct;
         }
         public function getIdCatalogProduct(){
             return $this->idCatalogProduct;
         }
         public function setCatalogName($catalogName){
            $this->catalogName=$catalogName;
         }
         public function getCatalogName(){
             return $this->catalogName;
         }
         public function setImageCatalog($imageCatalog){
            $this->imageCatalog=$imageCatalog;
         }

         public function setCatalogDescible($catalogDescible){
            $this->catalogDescible=$catalogDescible;
         }
         public function getCatalogDescible(){
             return $this->catalogDescible;
         }
         
         public function getImageCatalog(){
             return $this->imageCatalog;
         }
         public function setStatus($status){
            $this->status=$status;
         }
         public function getStatus(){
             return $this->status;
         }
         
        public function __construct(){
        }


    }
?>