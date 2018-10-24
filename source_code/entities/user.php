<?php
    class user {
        protected $id;
        protected $fullname;
        protected $account;
        protected $password;
        protected $email;
        protected $phoneNumber;
        protected $sex;
        protected $DOB;
        protected $address;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function getFullname(){
            return $this->fullname;
        }
        public function setFullname($fullname){
            $this->fullname=$fullname;
        }
        public function getAccount(){
            return $this->account;
        }
        public function setAccount($account){
            $this->account=$account;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password=$password;
        }
        public function getEmail(){
            return $this->email;
        } 
        public function setEmail($email){
            $this->email=$email;
        }
        public function getPhonenumber(){
            return $this->phoneNumber;
        }
        public function setPhonenumber($phonenumber){
            $this->phoneNumber=$phoneNumber;
        }
        public function getSex(){
            return $this->sex;
        }
        public function setSex($sex){
            $this->sex=$sex;
        }
        public function getDOB(){
            return $this->DOB;
        }
        public function setDOB($DOB){
            $this->DOB= $DOB;
        }
        public function getAddress(){
            return $this->address;
        }
        public function setAddress($Address){
            $this->address= $Address;
        }

        
    }
?>