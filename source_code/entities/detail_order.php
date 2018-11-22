<?php
    class detailOrder{
        private $product;
        private $quantityOneProduct;
        private $priceProduct;
        private $totalMoneyProductOrder;
        private $idOrder;


        public function setProduct($product){
            $this->product=$product;
         }
         public function getProduct(){
             return $this->product;
         }
         public function setQuantityOneProduct($quantityOneProduct){
            $this->quantityOneProduct=$quantityOneProduct;
         }
         public function getQuantityOneProduct(){
             return $this->quantityOneProduct;
         }
         public function setPriceProduct($priceProduct){
            $this->priceProduct=$priceProduct;
         }
         public function getPriceProduct(){
             return $this->priceProduct;
         }
         public function setTotalMoneyProductOrder($totalMoneyProductOrder){
            $this->totalMoneyProductOrder=$totalMoneyProductOrder;
         }
         public function getTotalMoneyProductOrder(){
             return $this->totalMoneyProductOrder;
         }
         public function setIdOrder($idOrder){
            $this->idOrder=$idOrder;
         }
         public function getIdOrder(){
             return $this->idOrder;
         }
         
        
         
    }
?>