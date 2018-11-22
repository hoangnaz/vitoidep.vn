<?php
    class order{
        private $idOrder;
        private $idCustomer;
        private $reciever;
        private $email;
        private $phoneNumber;
        private $addressRecieve;
        private $dateOrder;
        private $totalMoney;
        private $staffInCharge;
        private $statusOrder;

        public function setIdOrder($idOrder){
            $this->idOrder=$idOrder;
         }
         public function getIdOrder(){
             return $this->idOrder;
         }
         public function setIdCustomer($idCustomer){
            $this->idCustomer=$idCustomer;
         }
         public function getIdCustomer(){
             return $this->idCustomer;
         }
         public function setReciever($reciever){
            $this->reciever=$reciever;
         }
         public function getReciever(){
             return $this->reciever;
         }
         public function setEmail($email){
            $this->email=$email;
         }
         public function getEmail(){
             return $this->email;
         }
         public function setPhoneNumber($phoneNumber){
            $this->phoneNumber=$phoneNumber;
         }
         public function getPhoneNumber(){
             return $this->phoneNumber;
         }
         public function setAddressRecieve($addressRecieve){
            $this->addressRecieve=$addressRecieve;
         }
         public function getAddressRecieve(){
             return $this->addressRecieve;
         }
         public function setDateOrder($dateOrder){
            $this->dateOrder=$dateOrder;
         }
         public function getDateOrder(){
             return $this->dateOrder;
         }
         public function setTotalMoney($totalMoney){
            $this->totalMoney=$totalMoney;
         }
         public function getTotalMoney(){
             return $this->totalMoney;
         }
         public function setStaffInCharge($staffInCharge){
            $this->staffInCharge=$staffInCharge;
         }
         public function getStaffInCharge(){
             return $this->staffInCharge;
         }
         public function setStatusOrder($statusOrder){
            $this->statusOrder=$statusOrder;
         }
         public function getStatusOrder(){
             return $this->statusOrder;
         }
        
         
    }

?>