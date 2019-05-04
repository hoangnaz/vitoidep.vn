<?php
    class blogPost{
        private $idBlog;
        private $vietNamTitle;
        private $blogName;
        private $blogCatalog;
        private $imageBlog;
        private $contentSumary;
        private $contentFull;
        private $dateCreate;
        private $dateUpdate;
        private $numberView;
        private $createUser;
        private $status;
        public function setIdBlog($idBlog){
            $this->idBlog=$idBlog;
        }
        public function getIdBlog(){
            return $this->idBlog;
        }
        public function setVietNamTitle($vietNamTitle){
            $this->vietNamTitle=$vietNamTitle;
        }
        public function getVietNamTitle(){
            return $this->vietNamTitle;
        }
        public function setBlogName($blogName){
            $this->blogName=$blogName;
        }
        public function getBlogName(){
            return $this->blogName;
        }
        public function setBlogCatalog($blogCatalog){
            $this->blogCatalog=$blogCatalog;
        }
        public function getBlogCatalog(){
            return $this->blogCatalog;
        }
        public function setImageBlog($imageBlog){
            $this->imageBlog=$imageBlog;
        }
        public function getImageBlog(){
            return $this->imageBlog;
        }
        public function setContenSumary($contentSumary){
            $this->contentSumary=$contentSumary;
        }
        public function getContenSumary(){
            return $this->contentSumary;
        }
        public function setContentFull($contentFull){
            $this->contentFull=$contentFull;
        }
        public function getContentFull(){
            return $this->contentFull;
        }
        public function setDateCreate($dateCreate){
            $this->dateCreate=$dateCreate;
        }
        public function getDateCreate(){
            return $this->dateCreate;
        }
        public function setDateUpdate($dateUpdate){
            $this->dateUpdate=$dateUpdate;
        }
        public function getDateUpdate(){
            return $this->dateUpdate;
        }
        public function setNumberView($numberView){
            $this->numberView=$numberView;
        }
        public function getNumberView(){
            return $this->numberView;
        }
        public function setCreateUser($createUser){
            $this->createUser=$createUser;
        }
        public function getCreateUser(){
            return $this->createUser;
        }
        public function setStatus($status){
            $this->status=$status;
        }
        public function getStatus(){
            return $this->status;
        }
        
    }
?>