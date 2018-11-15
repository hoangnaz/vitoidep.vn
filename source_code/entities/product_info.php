<?php

    class productInfo 
    {
        private $idProduct;
		private $nameProduct;
		private $imageProduct;
		private $describleProduct;
		private $quantityInventory;
		private $promotionProduct;
		private $priceProduct;
		private $unit;
		private $pointPromotion;
		private $producerPublisher;
		private $catalogProduct;
		private $statusProduct;

		public function setIdProduct($idProduct){
			$this->idProduct=$idProduct;
		 }
		 public function getIdProduct(){
			 return $this->idProduct;
		 }
		 public function setNameProduct($nameProduct){
			$this->nameProduct=$nameProduct;
		 }
		 public function getNameProduct(){
			 return $this->nameProduct;
		 }
		 public function setImageProduct($imageProduct){
			$this->imageProduct=$imageProduct;
		 }
		 public function getImageProduct(){
			 return $this->imageProduct;
		 }
		 public function setDescribleProduct($describleProduct){
			$this->describleProduct=$describleProduct;
		 }
		 public function getDescribleProduct(){
			 return $this->describleProduct;
		 }
		 public function setQuantityInventory($quantityInventory){
			$this->quantityInventory=$quantityInventory;
		 }
		 public function getQuantityInventory(){
			 return $this->quantityInventory;
		 }
		 public function setPromotionProduct($promotionProduct){
			$this->promotionProduct=$promotionProduct;
		 }
		 public function getPromotionProduct(){
			 return $this->promotionProduct;
		 }
		 public function setPriceProduct($priceProduct){
			$this->priceProduct=$priceProduct;
		 }
		 public function getPriceProduct(){
			 return $this->priceProduct;
		 }
		 public function setUnit($unit){
			$this->unit=$unit;
		 }
		 public function getUnit(){
			 return $this->unit;
		 }
		 public function setPointPromotion($pointPromotion){
			$this->pointPromotion=$pointPromotion;
		 }
		 public function getPointPromotion(){
			 return $this->pointPromotion;
		 }
		 public function setProducerPublisher($producerPublisher){
			$this->producerPublisher=$producerPublisher;
		 }
		 public function getProducerPublisher(){
			 return $this->producerPublisher;
		 }
		 public function setCatalogProduct($catalogProduct){
			$this->catalogProduct=$catalogProduct;
		 }
		 public function getCatalogProduct(){
			 return $this->catalogProduct;
		 }
		 public function setStatusProduct($statusProduct){
			$this->statusProduct=$statusProduct;
		 }
		 public function getStatusProduct(){
			 return $this->statusProduct;
		 }
		 

    }
?>